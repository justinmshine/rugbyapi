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
        Schema::create('scan', function (Blueprint $table) {
            $table->id();
            $table->string('bar_code');
            $table->string('qr_code');
            $table->bigInteger('shirt_id')->unsigned()->index()->nullable();
            $table->foreign('shirt_id')->references('id')->on('shirts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scan');
    }
};
