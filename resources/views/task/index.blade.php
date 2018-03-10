<?php
use Lifeibest\LaravelPm\Models\PmTaskModel;
?>
@extends('pm::layouts.pm')
@section('title')
Tasks
@endsection
@section('content')


        <div class="weui-cells__title color_blue" style="margin-bottom: 15px;"><i class="weui-icon-success">任务
          <span style="font-size: 15px">( {{count($task_list)}} )</span>
        </i>

        </div>
        <div class="weui-cells">
          <div class="weui-cell weui-cell_access" href="">
            <div class="weui-cell__hd">
              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            </div>
            <div class="weui-cell__bd">
              <p>名称</p>
            </div>

            <div class="weui-cell__bd">
              <p>状态</p>
            </div>

         
            <div class="weui-cell__ft">
              截止
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

            <div class="weui-cell__ft">{{ date('m-d',strtotime($task->end_at)) }}</div>
          </a>
@endforeach
          
        </div>
      </div>
@endsection
