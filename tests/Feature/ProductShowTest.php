<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_detail_page_loads_correctly(): void
    {
        $category = Category::factory()->create(['slug' => 'test-category']);
        $product = Product::factory()->create([
            'category_id' => $category->id,
            'title' => 'The Vintage Rose',
            'slug' => 'the-vintage-rose',
            'short_description' => 'A beautiful cake.',
        ]);

        $response = $this->get(route('product.show', $product));

        $response->assertStatus(200);
        $response->assertSee('The Vintage Rose');
        $response->assertSee('A beautiful cake.');
        $response->assertSee($category->name);
    }

    public function test_it_displays_related_products(): void
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);
        $related = Product::factory()->create(['category_id' => $category->id, 'title' => 'Related Cake']);

        $response = $this->get(route('product.show', $product));

        $response->assertSee('Related Cake');
        $response->assertSee('You May Also Love');
    }
}
