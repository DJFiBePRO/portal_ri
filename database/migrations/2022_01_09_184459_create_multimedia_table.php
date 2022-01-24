<?php

use App\culturalManagement;
use App\culturalManagementTypes;
use App\gallery;
use App\multimediaType;
use App\news;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultimediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimedia', function (Blueprint $table) {
            $table->id('multimedia_id');
            $table->string('multimedia_name', 100);
            $table->string('multimedia_url')->nullable();

            $table->unsignedBigInteger('multimedia_news')->nullable();
            $table->unsignedBigInteger('multimedia_gallery')->nullable();
            $table->unsignedBigInteger('multimedia_cultural_management_types')->nullable();
            $table->unsignedBigInteger('multimedia_type');

            $table->timestamp('multimedia_create')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('multimedia_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('multimedia_news')->references('news_id')->on('news')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('multimedia_type')->references('multimedia_type_id')->on('multimedia_type')->onDelete('cascade');
            $table->foreign('multimedia_gallery')->references('gallery_id')->on('gallery')->onDelete('cascade');
            $table->foreign('multimedia_cultural_management_types')->references('cultural_management_types_id')->on('cultural_management_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multimedia');
    }
}
