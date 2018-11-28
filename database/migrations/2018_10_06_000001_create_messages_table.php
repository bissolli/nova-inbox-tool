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
            $table->unsignedInteger('thread_id');
            $table->unsignedInteger('sender_id');
            $table->string('sender_type');
            $table->text('body');
            $table->timestamp('seen_by_member_at')->nullable()->nullable();
            $table->timestamp('seen_by_admin_at')->nullable()->nullable();
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
