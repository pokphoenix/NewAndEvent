<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dim_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_number');
            $table->string('password', 20);
            $table->string('name', 255)->nullable();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('nick_name', 255);
            $table->text('image')->nullable();
            $table->integer('day_id')->nullable();
            $table->integer('month_id')->nullable();
            $table->integer('year_id')->nullable();
            $table->integer('gender');
            $table->string('email', 255);
            $table->string('telephone', 255);
            $table->enum('is_block', ['block', 'unblock']);
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('twitter_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dim_users');
    }
}
