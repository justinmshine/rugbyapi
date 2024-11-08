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
        Schema::create('size_stock', function (Blueprint $table) {
            $table->id();
            $table->integer('stock');
            $table->bigInteger('shirt_id')->unsigned()->index()->nullable();
            $table->foreign('shirt_id')->references('id')->on('shirts')->onDelete('cascade');
            $table->bigInteger('size_id')->unsigned()->index()->nullable();
            $table->foreign('size_id')->references('id')->on('dimensions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('size_stock');
    }
};
