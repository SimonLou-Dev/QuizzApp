<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('answer_options', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('answer_id');
            $table->uuid('linked_option');
            $table->mediumText('content')->nullable();
            $table->integer('point')->default(0);
            $table->boolean('selected')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('answer_options');
    }
};
