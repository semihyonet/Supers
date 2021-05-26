<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Place extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_active');
            $table->char('latitude', 20);
            $table->char('longitude', 20);
            $table->text('description')->nullable();
            $table->enum('type', ['clean','plant','build']);
            $table->bigInteger('area'); // Square meter!
            $table->enum("area_type", ['beach', 'forrest','city', 'lake', 'field','street']);
            $table->integer("goal_money", false, true);
            $table->char('currency', 5);
            $table->integer('user_id');

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('places');
    }
}
