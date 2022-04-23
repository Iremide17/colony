<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id');
            $table->string('checkin');
            $table->string('checkout');
            $table->integer('adults')->nullable();
            $table->integer('children')->nullable();
            $table->integer('days');
            $table->boolean('logistic')->default(1);
            $table->boolean('cleaning')->default(1);
            $table->integer('total');
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->boolean('isAccepted')->default(0);
            $table->boolean('paymentStatus')->default(0);
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
        Schema::dropIfExists('bookings');
    }
}