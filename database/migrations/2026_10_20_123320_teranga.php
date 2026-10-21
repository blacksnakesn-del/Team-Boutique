<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color', 20);
            $table->string('image', 2048);
            $table->timestamps();
        });

        Schema::create('products', function(Blueprint $table) {
            $table->id();
            $table->foreignId('categorie_id')->constrained('categories')->restrictOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('origin')->nullable();
            $table->string('unit')->nullable();
            $table->string('image', 2048);
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('sale_price')->nullable();
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('version')->default(1);
            $table->boolean('active')->default(true);
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });

        Schema::create('delivery_zones', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('fee')->default(0);
            $table->timestamps();
        });

        Schema::create('promotions', function(Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->unsignedTinyInteger('percentage');
            $table->boolean('active')->default(true);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });

        Schema::create('orders', function(Blueprint $table){
            $table->id();
            $table->string('reference', 50)->unique();
            $table->uuid('checkout_token')->unique();
            $table->foreignId('delivery_zone_id')->nullable()->constrained('delivery_zones')->nullOnDelete();
            $table->string('customer_full_name');
            $table->string('customer_phone', 30);
            $table->string('zone_name');
            $table->text('address')->nullable();
            $table->string('fulfillmentMode', 20);
            $table->text('note')->nullable();
            $table->unsignedBigInteger('sub_total');
            $table->unsignedBigInteger('discount_percentage')->default(0);
            $table->unsignedBigInteger('discount_amount')->default(0);
            $table->unsignedBigInteger('total');
            $table->string('statut',30)->default('EN ATTENTE');
            $table->boolean('stock_applied')->default(false);
            $table->boolean('stock_restored')->default(false);
            $table->timestamp('canceled_at')->nullable();
            $table->timestamps();
            $table->index(['statut','created_at'],'order_statut_index');
            
        });

        Schema::create('order_items', function(Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->string('name');
            $table->string('unit', 100);
            $table->unsignedBigInteger('unit_price');
            $table->unsignedInteger('quantity');
            $table->unsignedBigInteger('line_total');
            $table->timestamps();
            $table->unique(['order_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('promotions');
        Schema::dropIfExists('users');
        Schema::dropIfExists('delivery_zones');
    }
};
