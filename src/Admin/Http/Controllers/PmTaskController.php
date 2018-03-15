<?php
namespace Lifeibest\LaravelPm\Admin\Http\Controllers;

use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use Lifeibest\LaravelPm\Models\PmCalendarModel;
use Lifeibest\LaravelPm\Models\PmTaskModel;

class PmTaskController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('任务');
            $content->description('列表');

            // 面包屑导航
            $content->breadcrumb(
                ['text' => '任务', 'url' => '/pm-task'],
                ['text' => '详情']
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
        return Admin::grid(PmTaskModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->model()->orderBy('id', 'desc');

            // $grid->column('systemconfig_type_id', '配置类型')->display(function ($systemconfig_type_id) {
            //     return systemconfigType::find($systemconfig_type_id)->name;
            // });

            $grid->task_name('任务')->sortable();
            $grid->column('task_status', '状态')->display(function ($task_status) {
                return PmTaskModel::$task_status_list[$task_status];
            });

            $grid->priority('优先级')->sortable();
            $grid->start_at('开始')->sortable();
            $grid->end_at('结束')->sortable();

            // $grid->created_at()->sortable();
            // $grid->updated_at()->sortable();

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
                //$actions->disableDelete();
            });

            $grid->filter(function ($filter) {
                //$filter->disableIdFilter();
                $filter->like('task_name');
                $filter->equal('task_status')->radio(PmTaskModel::$task_status_list);
            });
            $grid->filter(function ($filter) {
                //$filter->disableIdFilter();
                $filter->equal('priority')->radio(PmTaskModel::$priority_list);
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
                ['text' => '任务', 'url' => '/pm-task'],
                ['text' => '编辑']
            );
            $content->header('任务');
            $content->description('编辑');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * //参考 https://laravel-china.org/articles/5513/laravel-admin-development-notes
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $result = $this->form()->update($id);

        //更新日历
        $pmCalendarModel = new PmCalendarModel();
        $pmCalendarModel->createCalendarByTask($id);

        // 界面的跳转逻辑
        admin_toastr('success', 'success');
        return $result;
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
                ['text' => '任务', 'url' => '/pm-task'],
                ['text' => '创建']
            );

            $content->header('任务');
            $content->description('创建');

            $content->body($this->form());
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return $this->form()->store();
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(PmTaskModel::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('task_name', '任务')->rules('required');
            $form->textarea('desc', '描述');
            $form->radio('task_status', '状态')->options(PmTaskModel::$task_status_list)->default(1);
            $form->radio('priority', '优先级')->options(PmTaskModel::$priority_list)->default('D');

            $form->datetimeRange('start_at', 'end_at', '开始 - 结束');

            //$form->display('finish_at');
            $form->display('created_at');
            $form->display('updated_at');

            $form->disableReset();
        });
    }

}
