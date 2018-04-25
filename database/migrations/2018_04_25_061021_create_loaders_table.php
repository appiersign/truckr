<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('truckr_id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->string('business_name')->index();
            $table->string('category')->index()->default('individual');
            $table->string('position')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('loaders');
    }
}
