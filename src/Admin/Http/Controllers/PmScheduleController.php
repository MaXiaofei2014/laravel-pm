<?php
namespace Lifeibest\LaravelPm\Admin\Http\Controllers;

use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use Lifeibest\LaravelPm\Models\PmScheduleModel;

class PmScheduleController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('行程');
            $content->description('列表');

            // 面包屑导航
            $content->breadcrumb(
                ['text' => '行程', 'url' => '/pm-schedule'],
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
        return Admin::grid(PmScheduleModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->model()->orderBy('id', 'desc');

            // $grid->column('systemconfig_type_id', '配置类型')->display(function ($systemconfig_type_id) {
            //     return systemconfigType::find($systemconfig_type_id)->name;
            // });

            $grid->schedule('行程')->sortable();
            $grid->column('schedule_type', '类别')->display(function ($schedule_type) {
                return PmScheduleModel::$schedule_type_list[$schedule_type];
            })->sortable();

            $grid->start_at()->sortable();
            $grid->end_at()->sortable();

            $grid->column('repeat', '重复')->display(function ($repeat) {
                return PmScheduleModel::$repeat_list[$repeat];
            })->sortable();

            $grid->column('remind_time', '提醒时间')->display(function ($remind_time) {
                return PmScheduleModel::$remind_time_list[$remind_time];
            })->sortable();

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
                $filter->like('schedule', '行程');
                $filter->equal('schedule_type', '类别')->radio(PmScheduleModel::$schedule_type_list);
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
                ['text' => '行程', 'url' => '/pm-schedule'],
                ['text' => '编辑']
            );
            $content->header('行程');
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
                ['text' => '行程', 'url' => '/pm-schedule'],
                ['text' => '创建']
            );

            $content->header('行程');
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
        return Admin::form(PmScheduleModel::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('schedule', '行程')->rules('required');

            $form->textarea('desc', '描述');

            $form->radio('schedule_type', '类别')->options(PmScheduleModel::$schedule_type_list)->default(1);

            $form->datetimeRange('start_at', 'end_at', 'Start at - End at');

            $form->radio('repeat', '重复')->options(PmScheduleModel::$repeat_list)->default(9);

            $form->radio('remind_time', '提醒时间')->options(PmScheduleModel::$remind_time_list)->default(5);

            //$form->display('finish_at');
            $form->display('created_at');
            $form->display('updated_at');

            $form->disableReset();
        });
    }

}
