<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('rooms')) {
            Schema::create('rooms', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id')->nullable();
                $table->string('accommodation_id')->nullable();
                $table->string('room_no')->nullable();
                $table->string('floor_id')->nullable();
                $table->string('rate')->nullable();
                $table->enum('rate_type',['Rupees','Dollor'])->nullable();
                $table->longText('details')->nullable();
                $table->string('image')->nullable();
                $table->enum('room_status',['CheckedIn','CheckedOut','Booked'])->default('CheckedOut');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
