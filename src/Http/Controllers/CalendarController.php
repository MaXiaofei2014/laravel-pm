<?php
namespace Lifeibest\LaravelPm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Lifeibest\LaravelPm\Http\Resources\PmScheduleCollection;
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
        $calendar_list = $pmCalendarModel
            ->where('start_at', '>=', date('Y-m-d 00:00:00', time()))
            ->where('start_at', '<', date('Y-m-d 00:00:00', time() + 24 * 3600))
            ->orderBy('start_at', 'asc')
            ->get();
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
        $time_type = $request->input('time_type');
        if ($time_type == '今天') {
            $data = $pmCalendarModel
                ->where('start_at', '>=', date('Y-m-d 00:00:00', time()))
                ->where('start_at', '<', date('Y-m-d 00:00:00', time() + 24 * 3600))
                ->orderBy('start_at', 'asc')
                ->get();
        }
        if ($time_type == '周') {
            $data = $pmCalendarModel
                ->where('start_at', '>=', date('Y-m-d 00:00:00', time()))
                ->where('start_at', '<', date('Y-m-d 00:00:00', time() + 7 * 24 * 3600))
                ->orderBy('start_at', 'asc')
                ->get();
        }
        if ($time_type == '月') {
            $data = $pmCalendarModel
                ->where('start_at', '>=', date('Y-m-d 00:00:00', time()))
                ->where('start_at', '<', date('Y-m-d H:i:s', strtotime(time() . " +1 month")))
                ->orderBy('start_at', 'asc')
                ->get();
        }

        return new PmScheduleCollection($data);

        // if (function_exists('Debugbar')) {
        //     \Debugbar::disable();
        // }

    }
}
