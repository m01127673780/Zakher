<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title_ar');
            $table->string('site_title_en');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp');
            $table->text('address_ar');
            $table->text('address_en');
            $table->text('job_times_ar');
            $table->text('job_times_en');
            $table->text('facebook')->nullable()->default('#');
            $table->text('twitter')->nullable()->default('#');
            $table->text('instagram')->nullable()->default('#');
            $table->text('youtube')->nullable()->default('#');
            $table->text('map');
            $table->text('description');
            $table->text('keywords');
            $table->string('logo')->default('logo.png');
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
        Schema::dropIfExists('settings');
    }
}
