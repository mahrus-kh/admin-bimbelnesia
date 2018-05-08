<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_logins', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tutoring_agency_id');
            $table->string('name');
            $table->string('phone',13)->nullable();
            $table->string('address')->nullable();
            $table->string('email',191)->unique()->nullable();
            $table->string('password')->nullable();
            $table->enum('status', ['1','0']);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('tutoring_agency_id')->references('id')->on('tutoring_agencies')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_logins');
    }
}
