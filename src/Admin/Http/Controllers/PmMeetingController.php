<?php
namespace Lifeibest\LaravelPm\Admin\Http\Controllers;

use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use Lifeibest\LaravelPm\Models\PmMeetingModel;

class PmMeetingController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Meetings');
            $content->description('list');

            // 面包屑导航
            $content->breadcrumb(
                ['text' => 'Meetings', 'url' => '/pm-meeting'],
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
        return Admin::grid(PmMeetingModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->model()->orderBy('id', 'desc');

            // $grid->column('systemconfig_type_id', '配置类型')->display(function ($systemconfig_type_id) {
            //     return systemconfigType::find($systemconfig_type_id)->name;
            // });

            $grid->meeting_theme()->sortable();
            $grid->column('meeting_type')->display(function ($meeting_type) {
                return PmMeetingModel::$meeting_type_list[$meeting_type];
            })->sortable();

            $grid->start_at()->sortable();
            $grid->end_at()->sortable();

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
                $filter->like('meeting_theme');
                $filter->equal('meeting_type')->radio(PmMeetingModel::$meeting_type_list);
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
                ['text' => 'Meetings', 'url' => '/pm-meeting'],
                ['text' => 'edit']
            );
            $content->header('Meeting');
            $content->description('edit');

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
                ['text' => 'Meetings', 'url' => '/pm-meeting'],
                ['text' => 'create']
            );

            $content->header('Meeting');
            $content->description('create');

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
        return Admin::form(PmMeetingModel::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('meeting_theme')->rules('required');
            $form->textarea('desc');
            $form->radio('meeting_type')->options(PmMeetingModel::$meeting_type_list)->default(9);

            $form->datetimeRange('start_at', 'end_at', 'Start at - End at');

            //$form->display('finish_at');
            $form->display('created_at');
            $form->display('updated_at');

            $form->disableReset();
        });
    }

}
