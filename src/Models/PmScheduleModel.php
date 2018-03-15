<?php

namespace Lifeibest\LaravelPm\Models;

use Illuminate\Database\Eloquent\Model;

class PmScheduleModel extends Model
{
    protected $table = 'pm_schedule';

    //状态1、进行中  2、完成  3、取消
    public static $schedule_status_list = [
        1 => '进行中',
        2 => '完成',
        3 => '取消',
    ];

    //1、会议 2、面试 3、会客 4、生活
    public static $schedule_type_list = [
        1 => '会议',
        2 => '面试',
        3 => '会客',
        4 => '生活',
        5 => '运动',
    ];

    //重复1天 2周 3月 4季度 5年 9不重复
    public static $repeat_list = [
        1 => '天',
        2 => '周',
        3 => '月',
        4 => '季度',
        5 => '年',
        9 => '不重复',
    ];

    //重复5分钟前 、15分钟前 、30分钟前 、1小时前（60） 2小时前（120）、1天前（1440）
    public static $remind_time_list = [
        5 => '5分钟前',
        15 => '15分钟前',
        30 => '30分钟前',
        60 => '1小时前',
        120 => '2小时前',
        1 => '1天前',
    ];

    // https://laravel-china.org/docs/laravel/5.5/eloquent-mutators
    // 修改器 字段 desc
    public function setDescAttribute($value = '')
    {
        if (!$value) {
            $value = '';
        }
        $this->attributes['desc'] = $value;
    }

    public function repeatTime()
    {
        $time = [];
        $repeat = $this->repeat;
        $start_at = $this->start_at;
        $end_at = $this->end_at;
        $time[] = ['start_at' => $start_at, 'end_at' => $end_at];
        //重复1天 2周 3月 4季度 5年 9不重复
        if ($repeat == '1') {
            # code...
        } elseif ($repeat == '2') {
            for ($i = 1; $i <= 52; $i++) {
                $start_at = date('Y-m-d H:i:s', strtotime($start_at . " +1 week"));
                $end_at = date('Y-m-d H:i:s', strtotime($end_at . " +1 week"));
                $time[] = ['start_at' => $start_at, 'end_at' => $end_at];
            }

        } elseif ($repeat == '3') {
            for ($i = 1; $i <= 12; $i++) {
                $start_at = date('Y-m-d H:i:s', strtotime($start_at . " +1 month"));
                $end_at = date('Y-m-d H:i:s', strtotime($end_at . " +1 month"));
                $time[] = ['start_at' => $start_at, 'end_at' => $end_at];
            }
        } elseif ($repeat == '4') {
            for ($i = 1; $i <= 4; $i++) {
                $start_at = date('Y-m-d H:i:s', strtotime($start_at . " +3 month"));
                $end_at = date('Y-m-d H:i:s', strtotime($end_at . " +3 month"));
                $time[] = ['start_at' => $start_at, 'end_at' => $end_at];
            }
        } elseif ($repeat == '5') {
            for ($i = 1; $i <= 1; $i++) {
                $start_at = date('Y-m-d H:i:s', strtotime($start_at . " +1 year"));
                $end_at = date('Y-m-d H:i:s', strtotime($end_at . " +1 year"));
                $time[] = ['start_at' => $start_at, 'end_at' => $end_at];
            }
        } else {

        }
        return $time;
    }

}
