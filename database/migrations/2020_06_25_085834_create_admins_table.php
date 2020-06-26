<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('admins')) {
            Schema::create('admins', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id')->nullable();
                $table->string('name')->nullable();
                $table->string('name_np')->nullable();
                $table->string('address')->nullable();
                $table->string('tel1')->nullable();
                $table->string('tel2')->nullable();
                $table->string('mobile1')->nullable();
                $table->string('mobile2')->nullable();
                $table->string('email1')->nullable();
                $table->string('email2')->nullable();
                $table->string('favicon')->nullable();
                $table->string('company_head')->nullable();
                $table->string('head_position')->nullable();
                $table->enum('owner_detail',['yes','no'])->nullable();
                $table->string('regd_no')->nullable();
                $table->string('vat_no')->nullable();
                $table->longText('description')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
