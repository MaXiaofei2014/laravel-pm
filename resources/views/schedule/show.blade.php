<?php
use Lifeibest\LaravelPm\Models\PmScheduleModel;	
?>
@extends('pm::layouts.pm')
@section('title')
会议
@endsection
@section('content')
<div class="show">
	  <div class="weui-flex">
    <div class="weui-flex__item">
      <div class="color_blue">
      	{{ $schedule->id }}-{{ $schedule->schedule }}
      </div>
    </div>
    </div>

    <div class="weui-flex">
    <div class="weui-flex__item">
      <div class="">
          类型: <span class="meeting_type">{{ PmScheduleModel::$schedule_type_list[$schedule->schedule_type] }}</span>
        </div>
    </div>
    </div>

    <div class="weui-flex">
    <div class="weui-flex__item">
      <div class="">
          开始 - 截止: {{ date('m-d H:i',strtotime($schedule->start_at)) }} - 
                {{ date('m-d H:i',strtotime($schedule->end_at)) }}
        </div>
    </div>
    </div>

    <article class="weui-article" style="padding-left: 0;padding-right: 0;">
        <section>
{!! nl2br($schedule->desc) !!}
</section>

    </article>


</div>
@endsection
