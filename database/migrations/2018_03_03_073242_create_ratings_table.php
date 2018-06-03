<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('data_user_id');
            $table->unsignedInteger('tutoring_agency_id');
            $table->float('rating','2','1');
            $table->string('comment');
            $table->timestamps();

            $table->foreign('data_user_id')->references('id')->on('data_users')->onDelete('CASCADE');
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
        Schema::dropIfExists('ratings');
    }
}
