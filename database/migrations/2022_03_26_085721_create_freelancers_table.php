<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('telephone');
            $table->string('address');
            $table->string('city');
            $table->integer('rate');
            $table->json('language');
            $table->string('image')->nullable();
            $table->text('description');
            $table->foreignId('branch_id')->constrained('branches');
            $table->foreignId('sub_branch_id')->constrained('sub_branches');
            $table->boolean('isVerified')->default(0);
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('freelancers');
    }
}