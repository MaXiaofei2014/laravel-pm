<?php
namespace Lifeibest\LaravelPm\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Lifeibest\LaravelPm\Models\PmScheduleModel;

class ScheduleController extends BaseController
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
        $pmScheduleModel = new PmScheduleModel();
        $schedule_list = $pmScheduleModel->all();
        return view('pm::schedule/index', [
            'schedule_list' => $schedule_list,
        ]);
    }

    public function show($id)
    {
        $schedule = PmScheduleModel::find($id);
        return view('pm::schedule/show', [
            'schedule' => $schedule,
        ]);

    }

}
