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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->json('thumb');
            $table->json('photos');
            $table->string('title');
            $table->string('purpose');
            $table->string('property_type');
            $table->string('residential');
            $table->string('bhk_type');
            $table->decimal('plot_area', 8, 2);
            $table->decimal('built_up_area', 8, 2);
            $table->string('facing')->nullable();
            $table->integer('total_floor');
            $table->decimal('sprice', 10, 2);
            $table->decimal('cprice', 10, 2);
            $table->decimal('fprice', 10, 2);
            $table->string('furniture_type');
            $table->boolean('parking');
            $table->integer('bathroom');
            $table->integer('balcony');
            $table->boolean('gated_security');
            $table->boolean('water_supply');
            $table->boolean('power_backup');
            $table->json('amenities');
            $table->string('locality');
            $table->string('landmark');
            $table->string('city');
            $table->boolean('is_featuredproperty');
            $table->boolean('is_premiumtag');
            $table->boolean('is_Sold');
            $table->boolean('is_Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
