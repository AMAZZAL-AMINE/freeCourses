<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //product title
            $table->string('slug', 191)->unique(); //slug url
            $table->text('desc'); //desciption
            $table->string('created_by'); //auth who create this cours
            $table->string('url'); //url from google drive
            $table->string('img'); //cours image
            $table->bigInteger('category_id')->unsigned(); //category cours
            $table->timestamps(); //created at & updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cours');
    }
}
