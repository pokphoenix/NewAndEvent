<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNewsAndEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dim_news_events', function($table)
        {
            DB::query("ALTER TABLE `dim_news_events` CHANGE COLUMN `start_date` `start_date`  TIMESTAMP NOT NULL;");
            DB::query("ALTER TABLE `dim_news_events` CHANGE COLUMN `end_date` `end_date` TIMESTAMP NOT NULL ;");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
