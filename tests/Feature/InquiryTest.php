<?php

namespace Tests\Feature;

use App\Mail\InquiryAcknowledgement;
use App\Models\Inquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class InquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_submit_inquiry_with_image()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('cake.jpg');

        $response = $this->post(route('inquiry.store'), [
            'name' => 'John Doe',
            'phone' => '123456789',
            'event_date' => now()->addDays(14)->format('Y-m-d'),
            'product_interest' => 'Custom Cake',
            'message' => 'I want a beautiful cake.',
            'image' => $file,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('inquiries', [
            'name' => 'John Doe',
            'message' => 'I want a beautiful cake.',
        ]);

        $inquiry = Inquiry::first();
        $this->assertCount(1, $inquiry->getMedia('picture'));
    }

    public function test_cannot_submit_inquiry_with_invalid_image_type()
    {
        $file = UploadedFile::fake()->create('document.pdf', 100);

        $response = $this->post(route('inquiry.store'), [
            'name' => 'John Doe',
            'message' => 'I want a beautiful cake.',
            'image' => $file,
        ]);

        $response->assertSessionHasErrors('image');
        $this->assertDatabaseCount('inquiries', 0);
    }

    public function test_cannot_submit_inquiry_with_large_image()
    {
        // 11MB image
        $file = UploadedFile::fake()->image('large.jpg')->size(11000);

        $response = $this->post(route('inquiry.store'), [
            'name' => 'John Doe',
            'message' => 'I want a beautiful cake.',
            'image' => $file,
        ]);

        $response->assertSessionHasErrors('image');
        $this->assertDatabaseCount('inquiries', 0);
    }

    public function test_sends_acknowledgement_email_if_email_provided()
    {
        Mail::fake();

        $this->post(route('inquiry.store'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'I want a cake.',
        ]);

        Mail::assertSent(InquiryAcknowledgement::class, function ($mail) {
            return $mail->hasTo('john@example.com');
        });
    }

    public function test_handles_email_failure_gracefully()
    {
        Mail::shouldReceive('to->send')
            ->andThrow(new \Exception('Mail server down'));

        $response = $this->post(route('inquiry.store'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'I want a cake.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('inquiries', ['name' => 'John Doe']);
    }
}
