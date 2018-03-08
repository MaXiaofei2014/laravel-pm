<?php
namespace Lifeibest\LaravelPm\Admin\Http\Controllers;

use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use Lifeibest\LaravelPm\Models\PmtaskModel;

class PmTaskController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Tasks');
            $content->description('list');

            // 面包屑导航
            $content->breadcrumb(
                ['text' => 'tasks', 'url' => '/pm-task'],
                ['text' => 'detail']
            );
            $content->body($this->grid());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(PmtaskModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            //$grid->model()->with('systemconfigType')->orderBy('id', 'DESC');

            // $grid->column('systemconfig_type_id', '配置类型')->display(function ($systemconfig_type_id) {
            //     return systemconfigType::find($systemconfig_type_id)->name;
            // });

            $grid->task_name()->sortable();
            $grid->created_at()->sortable();
            $grid->updated_at()->sortable();

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                if ($actions->getKey() == 1) {
                    $actions->disableDelete();
                }
            });
            // 禁止批量删除
            // $grid->tools(function (Grid\Tools $tools) {
            //     $tools->batch(function (Grid\Tools\BatchActions $actions) {
            //         $actions->disableDelete();
            //     });
            // });

            $grid->actions(function ($actions) {
                $actions->disableDelete();
            });

            $grid->filter(function ($filter) {
                $filter->disableIdFilter();

            });
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            // 面包屑导航
            $content->breadcrumb(
                ['text' => 'tasks', 'url' => '/pm-task'],
                ['text' => 'edit']
            );
            $content->header('task');
            $content->description('edit');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {

        return Admin::content(function (Content $content) {
            // 面包屑导航
            $content->breadcrumb(
                ['text' => 'task', 'url' => '/pm-task'],
                ['text' => 'create']
            );

            $content->header('task');
            $content->description('create');

            $content->body($this->form());
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(PmtaskModel::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('task_name')->rules('required');
            $form->textarea('desc');
            $form->radio('task_status')->options(PmtaskModel::$task_status_list)->default(1);
            $form->radio('priority')->options(PmtaskModel::$priority_list)->default('D');

            $form->datetimeRange('start_at', 'end_at', 'Start at - End at');

            $form->display('finish_at', 'finish_at', '2019-09-09 11:11:11');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }

}
