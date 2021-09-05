<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('company');
            $table->string('market_stall');
            $table->string('market_stall_city');
            $table->string('market_stall_month');
            $table->string('stall_market_year');
            $table->string('stall_market_month_end');
            $table->string('stall_market_year_end');
            $table->longText('job_description');
            $table->integer('order_jobs');
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
        Schema::dropIfExists('jobs');
    }
}
