<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('novainbox.tables.threads'), function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('owner_id');
            $table->string('owner_type');

            $table->unsignedInteger('member_id');

            $table->timestamp('closed_at')->nullable();
            $table->unsignedInteger('closed_by_id')->nullable();
            $table->string('closed_by_type')->nullable();

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
        Schema::dropIfExists(config('novainbox.tables.threads'));
    }
}
