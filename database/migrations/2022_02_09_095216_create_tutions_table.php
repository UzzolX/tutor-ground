<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('teacher_id');
            $table->string('title');
            $table->text('description');
            $table->string('slug');
            $table->string('medium');
            $table->integer('category_id');
            $table->string('class');
            $table->string('address');
            $table->string('type');
            $table->string('number_of_student');
            $table->string('group');
            $table->string('gender');
            $table->string('salary');
            $table->date('last_date');
            $table->integer('status');
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
        Schema::dropIfExists('tutions');
    }
}
