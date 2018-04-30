<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truckers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('truckr_id')->index();
            $table->string('license_plate')->index()->unique();
            $table->string('tracker_id')->nullable();
            $table->string('make')->index();
            $table->string('model')->index();
            $table->string('type');
            $table->string('capacity');
            $table->unsignedSmallInteger('owner_id')->index();
            $table->foreign('owner_id')->references('id')->on('drivers')->onDelete('cascade');
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
        Schema::dropIfExists('truckers');
    }
}
