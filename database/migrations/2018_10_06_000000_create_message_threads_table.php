<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('novainbox.tables.message_threads'), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sender_id');
            $table->string('sender_type');
            $table->unsignedInteger('sender_id');
            $table->string('sender_type');
            $table->string('subject');
            $table->longText('body');
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
        Schema::dropIfExists(config('novainbox.tables.message_threads'));
    }
}
