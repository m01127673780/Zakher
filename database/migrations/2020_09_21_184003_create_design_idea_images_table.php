<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignIdeaImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_idea_images', function (Blueprint $table) {
            $table->id();
            $table->string('image')->default('not-found.jpg');
            $table->bigInteger('design_idea_id')->unsigned();
            $table->foreign('design_idea_id')->references('id')->on('design_ideas')->onDelete('cascade');
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
        Schema::dropIfExists('design_idea_images');
    }
}
