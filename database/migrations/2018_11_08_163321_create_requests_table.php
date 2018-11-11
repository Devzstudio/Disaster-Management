<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('location');
            $table->string('district');
            $table->integer('reqOthers')->default(0);

            $table->string('other')->nullable();
            $table->string('rescue')->nullable();
            $table->string('water')->nullable();
            $table->string('food')->nullable();
            $table->string('clothing')->nullable();
            $table->string('medicine')->nullable();
            $table->string('kitchen')->nullable();
            $table->string('toiletries')->nullable();


            $table->integer('status')->default(0);
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
        Schema::dropIfExists('requests');
    }
}
