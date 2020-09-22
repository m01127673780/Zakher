<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignDepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_deps', function (Blueprint $table) {
            $table->id(); 
            $table->string('image')->default('not-found.jpg');
            $table->boolean('status')->default(true);
            $table->bigInteger('parent')->unsigned()->nullable();
            $table->foreign('parent')->references('id')->on('design_deps')->onDelete('cascade');
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
        Schema::dropIfExists('design_deps');
    }
}
