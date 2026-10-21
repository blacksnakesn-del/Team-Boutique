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
        $json = file_get_contents(base_path('db.json'));
        $data = json_decode($json, 512, JSON_THROW_ON_ERROR);
        
        $this->importCategories($data['categories'] ?? []);
        $this->importProducts($data['products'] ?? []);
        $this->importDeliveryZones($data['deliveryZones'] ?? []);
        $this->importPromotions($data['promotions'] ?? []);
        $this->importOrders($data['orders'] ?? []);
        
        $this->command->info('Import Terminer');
        $this->command->info('Categories :' . Category::count());
        $this->command->info('Products :' . Product::count());
        $this->command->info('Zone :' . DeliveryZone::count());
        $this->command->info('Order :' . Order::count());
        $this->command->info('Promotion :' . Promotion::count());


    }

    private function importCategories(array $categories): void
    {
        foreach($categories as $cat) {
            Category::updateOrCreate(
                ['id' => (int) $cat['id']],
                [
                    'name' => $cat['name'],
                    'color' => $cat['color'],
                    'image' => $cat['image']
                ]
            );
        }

    }

    private function importProducts(array $products) : void {
        foreach($products as $prod){
            Product::updateOrCreate(
                ['id'=> (int)$prod['id']],
                [
                    'name'=>$prod['name'],
                    'categorie_id'=>(int)$prod['categoryId'],
                    'price'=>(int)$prod['price'],
                    'sale_price'=>$prod['salePrice'] !== null ? (int)$prod['salePrice'] : null,
                    'stock' =>(int)$prod['stock'],
                    'unit'=>$prod['unit'],
                    'origin'=>$prod['origin'],
                    'description'=>$prod['description'],
                    'image' =>$prod['image'],
                    'active' => (bool) $prod['active'],
                    'featured' => (bool)$prod['featured'],

                ]
            );
        }
    }

    private function importDeliveryZones(array $zones) : void 
    {
        foreach($zones as $zone)
            {
                DeliveryZone::updateOrCreate(
                    ['id' =>(int)$zone['id']],
                    [
                        'name'=>$zone['name'],
                        'fee' =>(int)$zone['fee'],
                    ]
                );
            }
    }

    private function importPromotions(array $promos) : void 
    {
        foreach($promos as $promo)
            {
                Promotion::updateOrCreate(
                    ['id' =>(int)$promo['id']],
                    [
                        'code'=>$promo['code'],
                        'percentage' =>(int)$promo['percentage'],
                        'active' => (bool)$promo['active'],
                        'expires_at' => $promo['expiresAt'] ?
                         \Carbon\Carbon::parse($promo['expiresAt']) : null,
                    ]
                );
            }
    }

    private function importOrders(array $orders): void
    {
        foreach ($orders as $order) {
            $created = Order::updateOrCreate(
                ['reference' => $order['reference']],  // ← clé unique
                [
                    'checkout_token' => Str::uuid()->toString(),
                    'delivery_zone_id' => (int) $order['customer']['zoneId'],
                    'customer_full_name' => $order['customer']['fullName'],
                    'customer_phone' => $order['customer']['phone'],
                    'zone_name' => $order['customer']['zoneName'],
                    'address' => $order['customer']['address'],
                    'fulfillmentMode' => $order['fulfillmentMode'],
                    'note' => $order['note'] ?? null,
                    'sub_total' => (int) $order['subtotal'],
                    'discount_percentage' => (int) ($order['discount']['percentage'] ?? 0),
                    'discount_amount' => (int) ($order['discount']['amount'] ?? 0),
                    'total' => (int) $order['total'],
                    'statut' => strtolower($order['status']),
                    'stock_applied' => (bool) $order['stockApplied'],
                    'stock_restored' => (bool) $order['stockRestored'],
                ]
            );

            $created->items()->delete();

            // Insérer les nouveaux items
            foreach ($order['items'] as $item) {
                OrderItem::create([
                    'order_id' => $created->id,
                    'product_id' => (int) $item['productId'],
                    'name' => $item['name'],
                    'unit' => $item['unit'],
                    'unit_price' => (int) $item['unitPrice'],
                    'quantity' => (int) $item['quantity'],
                    'line_total' => (int) $item['lineTotal'],
                ]);
            }
        }
    }

    
}
