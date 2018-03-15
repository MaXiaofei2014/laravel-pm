<?php
namespace Lifeibest\LaravelPm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Lifeibest\LaravelPm\Http\Resources\PmScheduleCollection;
use Lifeibest\LaravelPm\Http\Resources\PmScheduleResource;
use Lifeibest\LaravelPm\Models\PmCalendarModel;

class CalendarController extends BaseController
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
        $pmCalendarModel = new PmCalendarModel();
        $calendar_list = $pmCalendarModel->all();
        return view('pm::calendar/index', [
            'calendar_list' => $calendar_list,
        ]);
    }

    public function show($id)
    {
        $calendar = PmCalendarModel::find($id);
        return view('pm::calendar/show', [
            'calendar' => $calendar,
        ]);

    }

    public function time(Request $request)
    {
        $data = PmCalendarModel::all();

        return new PmScheduleCollection($data);

        return new PmScheduleResource(PmCalendarModel::find(1));

        if (function_exists('Debugbar')) {
            \Debugbar::disable();
        }
        echo $time_type = $request->input('time_type');

    }
}
