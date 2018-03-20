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
        $task_list = $pmTaskModel
            ->orderBy('task_status', 'asc')
            ->orderBy('end_at', 'asc')
            ->get();
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
