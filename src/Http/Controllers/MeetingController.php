<?php
namespace Lifeibest\LaravelPm\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Lifeibest\LaravelPm\Models\PmMeetingModel;

class MeetingController extends BaseController
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
        $pmMeetingModel = new PmMeetingModel();
        $meeting_list = $pmMeetingModel->all();
        return view('pm::meeting/index', [
            'meeting_list' => $meeting_list,
        ]);
    }

    public function show($id)
    {
        $meeting = PmMeetingModel::find($id);
        return view('pm::meeting/show', [
            'meeting' => $meeting,
        ]);

    }
}
