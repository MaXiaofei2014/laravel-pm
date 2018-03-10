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

    // https://laravel-china.org/docs/laravel/5.5/eloquent-mutators
    // 修改器 字段 desc
    public function setDescAttribute($value = '')
    {
        if (!$value) {
            $value = '';
        }
        $this->attributes['desc'] = $value;
    }

}
