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

    /**
     * 获得与用户关联的电话记录。
     */
    public function systemconfigType()
    {
        return $this->hasOne(SystemconfigType::class, 'id', 'systemconfig_type_id');
    }
}
