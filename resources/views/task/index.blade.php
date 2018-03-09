<?php
use Lifeibest\LaravelPm\Models\PmTaskModel;
?>
@extends('pm::layouts.pm')
@section('title')
Tasks
@endsection
@section('content')


        <div class="weui-cells__title color_blue"><i class="weui-icon-success">Tasks
          <span style="font-size: 15px">( {{count($task_list)}} )</span>
        </i>

        </div>
        <div class="weui-cells">
          <div class="weui-cell weui-cell_access" href="">
            <div class="weui-cell__hd">
              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            </div>
            <div class="weui-cell__bd">
              <p>Task name</p>
            </div>

            <div class="weui-cell__bd">
              <p>Status</p>
            </div>

            <div class="weui-cell__bd">
              <p>End</p>
            </div>         
            <div class="weui-cell__ft">
              
            </div>
          </div>

@foreach ($task_list as $task)
          <a class="weui-cell weui-cell_access" href="/pm/task/{{ $task->id }}">
            <div class="weui-cell__hd">
              <div class="priority {{$task->priority}}_label">
                {{ PmTaskModel::$priority_list[$task->priority]  }}
              </div>
            </div>
            <div class="weui-cell__bd">
              <p>-{{ $task->id }}-{{ $task->task_name }}
              </p>
            </div>

            <div class="weui-cell__bd">
              <span class="task_status task_status_{{$task->task_status}}">{{ PmTaskModel::$task_status_list[$task->task_status] }}</span>
            </div>

            <div class="weui-cell__bd">

              <p>
                {{ date('m-d',strtotime($task->end_at)) }}</p>
            </div>
            <div class="weui-cell__ft"></div>
          </a>
@endforeach
          
        </div>
      </div>
@endsection
