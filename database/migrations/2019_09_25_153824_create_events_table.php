<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->boolean('is_free')->default(true);
            $table->boolean('is_limited')->default(false);
            $table->text('subscription_info');
            $table->date('date');

            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('events');
    }
}
