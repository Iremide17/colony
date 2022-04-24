<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->double('price');
            $table->double('discount')->nullable();
            $table->integer('area')->nullable();
            $table->string('built');
            $table->string('bedroom')->nullable();
            $table->string('bathroom')->nullable();
            $table->enum('purpose', ['for-rent', 'for-sale'])->default('for-rent');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('image')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('video')->nullable();
            $table->enum('rentFrequent', ['daily', 'weekly', 'monthly', 'yearly'])->default('daily');
            $table->text('description');
            $table->boolean('isFurnished')->default(0);
            $table->boolean('isFenced')->default(0);
            $table->boolean('isWified')->default(0);
            $table->boolean('isParked')->default(0);
            $table->boolean('isAirConditioned')->default(0);
            $table->boolean('isSwimmed')->default(0);
            $table->boolean('isTiled')->default(0);
            $table->boolean('isTapped')->default(0);
            $table->boolean('isAvailable')->default(0);
            $table->boolean('isVerified')->default(0);
            $table->foreignId('property_category_id')->constrained('property_categories')->onDelete('cascade');
            $table->foreignId('property_type_id')->constrained('property_types')->onDelete('cascade');
            $table->foreignId('agent_id')->constrained('agents')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}