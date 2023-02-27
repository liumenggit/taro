<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->comment('科目id');
            $table->integer('paper_id')->comment('试卷id');
            $table->string('topic')->default('')->comment('题目');
            $table->integer('type')->comment('类型');
            $table->integer('material')->nullable()->comment('资料id');
            $table->integer('difficult')->comment('难度');
            $table->boolean('is_comment')->nullable()->comment('评论开关');
            $table->integer('time')->nullable()->comment('限时');
            $table->json('options')->comment('选项');
            $table->json('correct')->comment('答案');
            $table->boolean('is_vip')->nullable()->comment('VIP题目');
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
        Schema::dropIfExists('question');
    }
}
