<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('institution');
            $table->string('institution_name');
            $table->string('institution_name_city');
            $table->string('study_date_start_month');
            $table->string('study_date_start_year');
            $table->string('study_date_end_month');
            $table->string('study_date_end_year');
            $table->string('study_description');
            $table->integer('order_studiesandcertifications');
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
        Schema::dropIfExists('studies');
    }
}
