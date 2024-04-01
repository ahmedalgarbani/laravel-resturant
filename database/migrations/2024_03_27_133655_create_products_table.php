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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('thumb_image');
            $table->string('name');
            $table->string('slug');
            $table->string('sku');
            $table->string('short_description',5000);
            $table->string('long_description',3000);
            $table->double('price');
            $table->double('offer_price')->default(0);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->boolean('show_at_home');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
