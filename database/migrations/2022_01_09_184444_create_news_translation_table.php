<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_translation', function (Blueprint $table) {
            $table->id('news_translation_id');
            $table->string('news_translation_title');
            $table->string('news_translation_content');
            $table->string('news_translation_alias');
            $table->unsignedBigInteger('news_id');
            $table->string('locale')->index();

            $table->unique(['news_id','locale']);
            $table->foreign('news_id')
                ->references('news_id')->on('news')
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
        Schema::dropIfExists('news_translation');
    }
}
