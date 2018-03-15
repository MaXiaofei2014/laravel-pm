<?php
use Lifeibest\LaravelPm\Models\PmCalendarModel;	
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
      	{{ $calendar->id }}-{{ $calendar->pmSchedule->schedule }}
      </div>
    </div>
    </div>

    <div class="weui-flex">
    <div class="weui-flex__item">
      <div class="">
          类型: <span class="meeting_type">{{ PmCalendarModel::$calendar_status_list[$calendar->calendar_status] }}</span>
        </div>
    </div>
    </div>

    <div class="weui-flex">
    <div class="weui-flex__item">
      <div class="">
          开始 - 截止: {{ date('m-d H:i',strtotime($calendar->start_at)) }} - 
                {{ date('m-d H:i',strtotime($calendar->end_at)) }}
        </div>
    </div>
    </div>




</div>
@endsection
