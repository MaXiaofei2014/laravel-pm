<?php
use Lifeibest\LaravelPm\Models\PmScheduleModel;
?>
@extends('pm::layouts.pm')
@section('title')
Tasks
@endsection
@section('content')


        <div class="weui-cells__title color_blue" style="margin-bottom: 15px;"><i class="weui-icon-success">行程
          <span style="font-size: 15px">( {{count($schedule_list)}} )</span>
        </i>

        </div>
        <div class="weui-cells">
          <div class="weui-cell weui-cell_access" href="">
            <div class="weui-cell__bd">
              <p>行程</p>
            </div>


            <div class="weui-cell__bd">
              <p>类型</p>
            </div>

         
            <div class="weui-cell__ft">
              开始
            </div>
          </div>

@foreach ($schedule_list as $schedule)
          <a class="weui-cell weui-cell_access" href="/pm/schedule/{{ $schedule->id }}">
            <div class="weui-cell__bd">
              <p>{{ $schedule->id }}-{{ $schedule->schedule }}
              </p>
            </div>
   

            <div class="weui-cell__bd">
              <span class="meeting_type">{{ PmScheduleModel::$schedule_type_list[$schedule->schedule_type] }}</span>
            </div>

            <div class="weui-cell__ft">{{ date('m-d H:i',strtotime($schedule->start_at)) }}</div>
          </a>
@endforeach
          
        </div>
      </div>
@endsection
