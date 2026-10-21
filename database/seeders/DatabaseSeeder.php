<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\DeliveryZone;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\OrderItem;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $json = file_get_contents(base_path('database/data/demo.json'));
        $data = json_decode($json, true);

        foreach($data['categories'] as $categoie) {
            Category::updateOrCreate(
                ['id' => $categoie['id']],
                [
                    'name' => $categoie['name'],
                    'color' => $categoie['color'],
                    'image' => $categoie['image'],
                ]
            );
        }

        foreach($data['products'] as $product) {
            Product::updateOrCreate(
                ['id' => (int) $product['id']],
                [
                    'name' => $product['name'],
                    'categorie_id' => $product['categoryId'],
                    'price' => $product['price'],
                    'sale_price' => $product['salePrice'],
                    'stock' => $product['stock'],
                    'unit' => $product['unit'],
                    'origin' => $product['origin'],
                    'description' => $product['description'],
                    'image' => $product['image'],
                    'active' => $product['active'],
                    'featured' => $product['featured']
                ]
            );
        }
    
    }
}
