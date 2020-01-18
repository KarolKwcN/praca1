<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->mediumText('image1')->nullable();
            $table->mediumText('description1')->nullable();
            $table->mediumText('image2')->nullable();
            $table->mediumText('description2')->nullable();
            $table->mediumText('image3')->nullable();
            $table->mediumText('description3')->nullable();
            $table->mediumText('image4')->nullable();
            $table->mediumText('description4')->nullable();
            $table->mediumText('image5')->nullable();
            $table->mediumText('description5')->nullable();
            $table->mediumText('image6')->nullable();
            $table->mediumText('description6')->nullable();
            $table->mediumText('image7')->nullable();
            $table->mediumText('description7')->nullable();
            $table->mediumText('image8')->nullable();
            $table->mediumText('description8')->nullable();
            $table->mediumText('image9')->nullable();
            $table->mediumText('description9')->nullable();
            $table->mediumText('image10')->nullable();
            $table->mediumText('description10')->nullable();
            $table->integer('repair_id');
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
        Schema::dropIfExists('steps');
    }
}
