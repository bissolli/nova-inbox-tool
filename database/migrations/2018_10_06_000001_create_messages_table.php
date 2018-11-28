<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('novainbox.tables.messages'), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('message_thread_id');
            $table->unsignedInteger('sender_id');
            $table->string('sender_type');
            $table->text('body');
            $table->timestamp('seen_at')->nullable();
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
        Schema::dropIfExists(config('novainbox.tables.messages'));
    }
}
