<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->string('name')->index();
            $table->string('finance_type');
            $table->string('phone_school');
            $table->string('name_hm');
            $table->string('phone_hm');
            $table->string('edu_district');
            $table->string('sub_district');
            $table->string('level_type');
            $table->string('level_name');
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
        Schema::drop('schools');
    }
}
