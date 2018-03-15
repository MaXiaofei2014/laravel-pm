<?php

namespace Lifeibest\LaravelPm\Models;

use Illuminate\Database\Eloquent\Model;

class PmCalendarModel extends Model
{
    protected $table = 'pm_calendar';

    //状态1、进行中  2、过期
    public static $calendar_status_list = [
        1 => '进行中',
        2 => '过期',
    ];

    //状态1、显示  2、隐藏
    public static $show_status_list = [
        1 => '显示',
        2 => '隐藏',
    ];

    public function pmSchedule()
    {
        return $this->hasOne('Lifeibest\LaravelPm\Models\PmScheduleModel', 'id', 'schedule_id');
    }

}
