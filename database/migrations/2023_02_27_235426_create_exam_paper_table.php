<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamPaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_paper', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paper_type')->comment('试卷类型');
            $table->integer('grade_level')->comment('年级');
            $table->integer('score')->comment('总分');
            $table->integer('question_count')->comment('题目数量');
            $table->integer('suggest_time')->nullable()->comment('建议时常');
            $table->dateTime('limit_start_time')->nullable()->comment('开始时间');
            $table->dateTime('limit_end_time')->nullable()->comment('结束时间');
            $table->integer('task_exam_id')->nullable()->comment('任务考试编号');
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
        Schema::dropIfExists('exam_paper');
    }
}
