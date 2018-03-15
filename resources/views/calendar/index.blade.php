<?php
use Lifeibest\LaravelPm\Models\PmScheduleModel;
?>
@extends('pm::layouts.pm')
@section('title')
Tasks
@endsection
@section('content')


        <div class="weui-cells__title color_blue" style="margin-bottom: 15px;"><i class="weui-icon-success">行程
          <span style="font-size: 15px">( {{count($calendar_list)}} )</span>
        </i>

        </div>
        <div class="weui-cells">

      <div class="weui-cell">
        <div class="weui-cell__hd"><label for="name" class="weui-label">周期</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" id="time_type" type="text" value="今天">
        </div>
      </div>

          <div class="weui-cell weui-cell_access" href="">
            <div class="weui-cell__bd">
              <p>行程</p>
            </div>

         
            <div class="weui-cell__ft">
              开始
                    

            </div>
          </div>

@foreach ($calendar_list as $calendar)
          <a class="weui-cell weui-cell_access" href="/pm/calendar/{{ $calendar->id }}">
            <div class="weui-cell__bd">
              <p>{{ $calendar->id }}-{{ $calendar->calendar_title }}
              </p>
            </div>


            <div class="weui-cell__ft">{{ date('m-d H:i',strtotime($calendar->start_at)) }}</div>
          </a>
@endforeach
          
        </div>
      </div>
@endsection


