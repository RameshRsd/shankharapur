<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('room_checks')) {
            Schema::create('room_checks', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id')->nullable();
                $table->bigInteger('guest_id')->nullable();
                $table->bigInteger('room_id')->nullable();
                $table->string('checked_in_date')->nullable();
                $table->string('checked_in_time')->nullable();
                $table->string('checked_out_date')->nullable();
                $table->string('checked_out_time')->nullable();
                $table->string('numbers')->nullable();
                $table->string('rate')->nullable();
                $table->enum('rate_type',['Rupees','Dollor'])->nullable();
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
        Schema::dropIfExists('room_checks');
    }
}
