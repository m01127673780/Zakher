<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignDepTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_dep_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('design_dep_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name')->nullable();

            $table->unique(['design_dep_id', 'locale']);
            $table->foreign('design_dep_id')->references('id')->on('design_deps')->onDelete('cascade');
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
        Schema::dropIfExists('design_dep_translations');
    }
}
