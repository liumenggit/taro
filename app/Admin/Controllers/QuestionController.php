<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Question;
use App\Models\Subject;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class QuestionController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Question(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('subject_id');
            $grid->column('paper_id');
            $grid->column('topic');
            $grid->column('type');
            $grid->column('material');
            $grid->column('difficult');
            $grid->column('is_comment');
            $grid->column('time');
            $grid->column('options');
            $grid->column('correct');
            $grid->column('is_vip');
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
        return Show::make($id, new Question(), function (Show $show) {
            $show->field('id');
            $show->field('subject_id');
            $show->field('paper_id');
            $show->field('topic');
            $show->field('type');
            $show->field('material');
            $show->field('difficult');
            $show->field('is_comment');
            $show->field('time');
            $show->field('options');
            $show->field('correct');
            $show->field('is_vip');
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
        return Form::make(new Question(), function (Form $form) {

            $SubjectCate = $this->getSubjectCate();
            $SubjectCate = $this->getSubjectCate();
            $form->display('id');
            $form->select('subject_id')
                ->options($SubjectCate)
                ->default(1)
                ->load('city', '/api/city');
            $form->text('paper_id');
            $form->text('topic');
            $form->radio('type')
                ->when([1, 2, 3, 4, 5], function (Form $form) {
                    // 值为1和4时显示文本框
                    // $form->keyValue('options');
                    $form->table('options', function ($table) {
                        $table->text('选项');
                        $table->switch('是否答案');
                    })->saving(function ($v) {
                        return json_encode($v);
                    });
                })
                ->when(5, function (Form $form) {
                    // 值为1和4时显示文本框
                    $form->editor('material');
                })->options([
                    1 => '单选',
                    2 => '多选',
                    3 => '填空',
                    4 => '问答',
                    5 => '材料'
                ])->default(2);
            $form->radio('difficult')->options([
                1 => '初级',
                2 => '中级',
                3 => '高级',
            ])->default(2);
            $form->switch('is_comment');
            $form->number('time')->help('答题限制秒数,填写0不限制');

            $form->hidden('correct');
            $form->switch('is_vip');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }

    protected function getSubjectCate()
    {
        return Subject::all()->keyBy('id')->map(function ($item, $key) {
            return $item->name;
        });
    }
}
