<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('room_books')) {
            Schema::create('room_books', function (Blueprint $table) {
                $table->id();
                $table->enum('type',['internal','external'])->nullable();
                $table->bigInteger('room_id')->nullable();
                $table->bigInteger('guest_id')->nullable();
                $table->string('full_name')->nullable();
                $table->string('mobile')->nullable();
                $table->string('check_in_date')->nullable();
                $table->string('check_out_date')->nullable();
                $table->string('child_numbers')->nullable();
                $table->string('adult_numbers')->nullable();
                $table->string('number_of_room')->nullable();
                $table->enum('status',['pending','approved','rejected'])->nullable();
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
        Schema::dropIfExists('room_books');
    }
}
