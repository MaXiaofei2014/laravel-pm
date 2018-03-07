<?php
namespace Lifeibest\LaravelPm\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

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
        return view('pm::app');
    }

}
