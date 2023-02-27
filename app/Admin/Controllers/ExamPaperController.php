<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ExamPaper;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ExamPaperController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ExamPaper(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('paper_type');
            $grid->column('grade_level');
            $grid->column('score');
            $grid->column('question_count');
            $grid->column('suggest_time');
            $grid->column('limit_start_time');
            $grid->column('limit_end_time');
            $grid->column('task_exam_id');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new ExamPaper(), function (Show $show) {
            $show->field('id');
            $show->field('paper_type');
            $show->field('grade_level');
            $show->field('score');
            $show->field('question_count');
            $show->field('suggest_time');
            $show->field('limit_start_time');
            $show->field('limit_end_time');
            $show->field('task_exam_id');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new ExamPaper(), function (Form $form) {
            $form->display('id');
            $form->text('paper_type');
            $form->text('grade_level');
            $form->text('score');
            $form->text('question_count');
            $form->text('suggest_time');
            $form->text('limit_start_time');
            $form->text('limit_end_time');
            $form->text('task_exam_id');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
