<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutoringAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutoring_agencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->string('slug',191)->unique();
            $table->string('tutoring_agency');
            $table->string('logo_image')->nullable();
            $table->string('address')->nullable();
            $table->string('tags')->nullable();
            $table->string('description', 500)->nullable();
            $table->enum('verified', ['1','0']);
            $table->string('rating',3)->nullable();
            $table->integer('total_views')->nullable();
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
        Schema::dropIfExists('tutoring_agencies');
    }
}
