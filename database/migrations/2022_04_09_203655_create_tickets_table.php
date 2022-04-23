<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('priority_id')->constrained('priorities');
            $table->foreignId('booking_id')->constrained('bookings');
            $table->foreignId('status_id')->constrained('statuses');
            $table->string('ticket_id', 10)->unique();
            $table->string('title', 30);
            $table->text('message');
            $table->morphs('ticketable');
            // $table->foreignId('assigned_to_user_id')->constrained('users');
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
        Schema::dropIfExists('tickets');
    }
}
