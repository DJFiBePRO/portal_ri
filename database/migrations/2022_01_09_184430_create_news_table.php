<?php

use App\managementArea;
use App\newsType;
use App\newsStatus;
use App\user;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id('news_id');
            $table->unsignedBigInteger('news_status_id');
            $table->unsignedBigInteger('news_type_id');
            $table->unsignedBigInteger('management_area_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('news_status_id')
                ->references('news_status_id')->on('news_status')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('news_type_id')
                ->references('news_type_id')->on('news_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('management_area_id')
                ->references('management_area_id')->on('management_area')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('user_id')->on('user')
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
        Schema::dropIfExists('news');
    }
}
