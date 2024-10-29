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
        Schema::create('shirts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('category');
            $table->double('price');
            $table->integer('percent_discount');
            $table->integer('rating');
            $table->integer('stock');
            $table->string('sku');
            $table->string('warranty');
            $table->string('shipping');
            $table->string('availability');
            $table->string('return_policy');
            $table->integer('min_order_quantity');
            $table->string('thumbnail');
            $table->bigInteger('country_id')->unsigned()->index();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->bigInteger('dimensions_id')->unsigned()->index();
            $table->foreign('dimensions_id')->references('id')->on('dimensions')->onDelete('cascade');
            $table->bigInteger('review_id')->unsigned()->index();
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
            $table->bigInteger('scan_id')->unsigned()->index();
            $table->foreign('scan_id')->references('id')->on('scan')->onDelete('cascade');
            $table->bigInteger('image_id')->unsigned()->index();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shirts');
    }
};
