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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('rating');
            $table->string('comment');
            $table->timestamp('added_at', precision: 0);
            $table->string('reviewer_name');
            $table->string('reviewer_email');
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
        Schema::dropIfExists('reviews');
    }
};
