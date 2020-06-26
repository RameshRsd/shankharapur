<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('guests')) {
            Schema::create('guests', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id')->nullable();
                $table->string('first_name')->nullable();
                $table->string('middle_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('father_name')->nullable();
                $table->bigInteger('country_id')->nullable();
                $table->bigInteger('state_id')->nullable();
                $table->bigInteger('district_id')->nullable();
                $table->bigInteger('city_id')->nullable();
                $table->string('tole')->nullable();
                $table->string('ward_no')->nullable();
                $table->string('mobile1')->nullable();
                $table->string('mobile2')->nullable();
                $table->string('id_no')->nullable();
                $table->enum('id_type', ['Pan-Card', 'Citizenship', 'Passport', 'Driving', 'Voter-Card', 'Vehicle-No'])->nullable();
                $table->string('facebook_link')->nullable();
                $table->string('twitter_link')->nullable();
                $table->string('instagram_link')->nullable();
                $table->string('photo')->nullable();
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
        Schema::dropIfExists('guests');
    }
}
