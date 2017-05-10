<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_center')->index();
            $table->integer('programme_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('rp')->unsigned();
            $table->integer('participants')->unsigned();
            $table->date('from_dt');
            $table->date('to_dt');
            
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
        Schema::drop('registrations');
    }
}
