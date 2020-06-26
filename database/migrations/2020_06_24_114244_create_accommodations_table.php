<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('accommodations')) {
            Schema::create('accommodations', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id')->nullable();
                $table->string('name')->nullable();
                $table->string('slug')->nullable();
                $table->string('rate')->nullable();
                $table->enum('rate_type',['Rupees','Dollor'])->nullable();
                $table->longText('details')->nullable();
                $table->string('image')->nullable();
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
        Schema::dropIfExists('accommodations');
    }
}
