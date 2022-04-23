<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings');
            $table->foreignId('branch_id')->constrained('branches');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('freelancer_id')->constrained('freelancers');
            $table->string('approved_at')->nullable();
            $table->string('completed_at')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('cancel')->default(0);
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
        Schema::dropIfExists('jobs');
    }
}