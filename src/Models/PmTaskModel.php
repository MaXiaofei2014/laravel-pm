<?php

namespace Lifeibest\LaravelPm\Models;

use Illuminate\Database\Eloquent\Model;

class PmtaskModel extends Model
{
    protected $table = 'pm_task';

    //1、Not start 2、Processing 3、Finish 4、Delay 5、Hang up
    public static $task_status_list = [
        1 => 'Not start',
        2 => 'Processing',
        3 => 'Finish',
        4 => 'Delay',
        5 => 'Hang up',
    ];

    public static $priority_list = [
        'S' => 'S',
        'A' => 'A',
        'B' => 'B',
        'C' => 'C',
        'D' => 'D',
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
