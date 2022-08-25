<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('topic_tries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('topic_id');
            $table->foreignUuid('user_id');
            $table->integer('note');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('topic_tries');
    }
};
