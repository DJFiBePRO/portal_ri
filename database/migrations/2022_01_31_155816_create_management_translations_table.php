<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management_translations', function (Blueprint $table) {
            $table->id('management_translation_id');
            $table->string('mission_translation');
            $table->string('vission_translation');
            $table->string('objective_translation');
            $table->string('function_translation');
            $table->string('about_translation');
            $table->unsignedBigInteger('management_id');
            $table->string('locale')->index();

            $table->unique(['management_id','locale']);
            $table->foreign('management_id')
                ->references('management_area_id')->on('management_area')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('management_translations');
    }
}
