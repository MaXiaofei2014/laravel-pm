<?php
use Lifeibest\LaravelPm\Models\PmMeetingModel;
?>
@extends('pm::layouts.pm')
@section('title')
Tasks
@endsection
@section('content')


        <div class="weui-cells__title color_blue" style="margin-bottom: 15px;"><i class="weui-icon-success">会议
          <span style="font-size: 15px">( {{count($meeting_list)}} )</span>
        </i>

        </div>
        <div class="weui-cells">
          <div class="weui-cell weui-cell_access" href="">
            <div class="weui-cell__bd">
              <p>主题</p>
            </div>


            <div class="weui-cell__bd">
              <p>类型</p>
            </div>

         
            <div class="weui-cell__ft">
              开始
            </div>
          </div>

@foreach ($meeting_list as $meeting)
          <a class="weui-cell weui-cell_access" href="/pm/meeting/{{ $meeting->id }}">
            <div class="weui-cell__bd">
              <p>{{ $meeting->id }}-{{ $meeting->meeting_theme }}
              </p>
            </div>
   

            <div class="weui-cell__bd">
              <span class="meeting_type">{{ PmMeetingModel::$meeting_type_list[$meeting->meeting_type] }}</span>
            </div>

            <div class="weui-cell__ft">{{ date('m-d H:i',strtotime($meeting->start_at)) }}</div>
          </a>
@endforeach
          
        </div>
      </div>
@endsection
