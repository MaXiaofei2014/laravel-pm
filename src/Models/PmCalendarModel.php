<?php

namespace Lifeibest\LaravelPm\Models;

use Illuminate\Database\Eloquent\Model;

class PmCalendarModel extends Model
{
    protected $table = 'pm_calendar';

    //1、任务 2行程
    public static $calendar_type_list = [
        1 => '任务',
        2 => '行程',
    ];

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

    public function pmTask()
    {
        return $this->hasOne(PmTaskModel::class, 'id', 'relation_id');
    }

    public function pmSchedule()
    {
        return $this->hasOne(PmScheduleModel::class, 'id', 'relation_id');
    }

    // https://laravel-china.org/docs/laravel/5.5/eloquent-mutators
    // 修改器 字段 desc
    public function getCalendarTitleAttribute()
    {
        $title = '';
        switch ($this->calendar_type) {
            case '1':
                $title = $this->pmTask->task_name;
                break;
            case '2':
                $title = $this->pmSchedule->schedule;
                break;

            default:
                break;
        }
        return $title;
    }

    /**
     * 创建日历
     *
     * @param  [type] $relation_id   [description]
     * @return [type]                [description]
     */
    public function createCalendarByTask($relation_id)
    {
        if (!$relation_id) {
            return false;
        }
        //任务
        $pm_task = PmTaskModel::find($relation_id);
        if (!$pm_task) {
            return false;
        }
        //删除
        $this->where(['relation_id' => $relation_id, 'calendar_type' => 1])->delete();

        $this->where(['relation_id' => $relation_id, 'calendar_type' => 1])->first();
        // print_r($calendar);exit;

        $calendar = new PmCalendarModel;
        $calendar->calendar_type = 1;
        $calendar->relation_id = $relation_id;
        $calendar_status = 1;
        if (strtotime($pm_task->end_at) <= time()) {
            $calendar_status = 2; //过期
        }
        $calendar->calendar_status = $calendar_status;
        $calendar->start_at = $pm_task->start_at;
        $calendar->end_at = $pm_task->end_at;
        $calendar->save();

    }

    /**
     * 创建日历
     *
     * @param  [type] $relation_id   [description]
     * @return [type]                [description]
     */
    public function createCalendarBySchedule($relation_id)
    {
        if (!$relation_id) {
            return false;
        }

        $pm_schedule = PmScheduleModel::find($relation_id);
        if (!$pm_schedule) {
            return false;
        }
        //删除
        $this->where(['relation_id' => $relation_id, 'calendar_type' => 2])->delete();
        $repeat = $pm_schedule->repeat;
        //if ($repeat != 9) {
        $repeatTime = $pm_schedule->repeatTime();
        foreach ($repeatTime as $k => $v) {
            $calendar = new PmCalendarModel;
            $calendar->calendar_type = 2;
            $calendar->relation_id = $relation_id;

            $calendar_status = 1;
            if (strtotime($v['end_at']) <= time()) {
                $calendar_status = 2; //过期
            }
            $calendar->calendar_status = $calendar_status;
            $calendar->start_at = $v['start_at'];
            $calendar->end_at = $v['end_at'];
            $calendar->save();
        }
        //}
    }

}
