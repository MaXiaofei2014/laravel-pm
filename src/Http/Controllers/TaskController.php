<?php
namespace Lifeibest\LaravelPm\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Lifeibest\LaravelPm\Models\PmTaskModel;

class TaskController extends BaseController
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }
    /**
     * Index page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pmTaskModel = new PmTaskModel();
        $task_list = $pmTaskModel->all();
        return view('pm::task/index', [
            'task_list' => $task_list,
        ]);
    }

    public function show($id)
    {
        $task = PmTaskModel::find($id);
        return view('pm::task/show', [
            'task' => $task,
        ]);

    }
}
