<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductListingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the product listing page loads and shows products.
     */
    public function test_product_listing_page_loads(): void
    {
        $category = Category::create([
            'name' => 'Cakes',
            'slug' => 'cakes',
            'is_active' => true,
        ]);

        $product = Product::create([
            'category_id' => $category->id,
            'title' => 'Chocolate Cake',
            'slug' => 'chocolate-cake',
            'short_description' => 'Delicious chocolate cake',
        ]);

        $response = $this->get(route('category.show'));

        $response->assertStatus(200);
        $response->assertSee('Our Collections');
        $response->assertSee('Chocolate Cake');
    }

    /**
     * Test filtering by category.
     */
    public function test_filtering_by_category(): void
    {
        $category1 = Category::create([
            'name' => 'Cakes',
            'slug' => 'cakes',
            'is_active' => true,
        ]);

        $category2 = Category::create([
            'name' => 'Cupcakes',
            'slug' => 'cupcakes',
            'is_active' => true,
        ]);

        $product1 = Product::create([
            'category_id' => $category1->id,
            'title' => 'Chocolate Cake',
            'slug' => 'chocolate-cake',
        ]);

        $product2 = Product::create([
            'category_id' => $category2->id,
            'title' => 'Vanilla Cupcake',
            'slug' => 'vanilla-cupcake',
        ]);

        $response = $this->get(route('category.show', $category1));

        $response->assertStatus(200);
        $response->assertSee('Chocolate Cake');
        $response->assertDontSee('Vanilla Cupcake');
    }
}
