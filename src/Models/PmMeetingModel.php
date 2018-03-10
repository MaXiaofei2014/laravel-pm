<?php

namespace Lifeibest\LaravelPm\Models;

use Illuminate\Database\Eloquent\Model;

class PmMeetingModel extends Model
{
    protected $table = 'pm_meeting';

    //1、Business 2、Manage 3、Private 9、Other
    public static $meeting_type_list = [
        1 => '业务',
        2 => '管理',
        3 => '私人',
        9 => '其它',
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
