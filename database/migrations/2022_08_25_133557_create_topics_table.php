<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('code')->unique();
            $table->mediumText('description')->nullable();
            $table->integer('max_note')->default(0);
            $table->integer('success_rate')->default(100);
            $table->integer('nbr_question')->default(0);
            $table->boolean('random_order')->default(false);
            $table->boolean('display_result')->default(false);
            $table->string('timed')->default('none');
            $table->integer('timer')->default(0);
            $table->dateTime('correction_available')->default(now());
            $table->boolean('can_retry')->default(false);
            $table->boolean('negative_point')->default(false);
            $table->foreignUuid('user_id');
            $table->boolean('public')->default(false);
            $table->boolean('validate')->default(false);
            $table->uuid('validated_by')->nullable();
            $table->dateTime('ended_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('topics');
    }
};
