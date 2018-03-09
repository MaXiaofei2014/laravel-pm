<?php
use Lifeibest\LaravelPm\Models\PmTaskModel;
?>
@extends('pm::layouts.pm')
@section('title')
Tasks
@endsection
@section('content')


        <div class="weui-cells__title color_blue">Tasks</div>
        <div class="weui-cells">
@foreach ($task_list as $task)
          <a class="weui-cell weui-cell_access" href="/pm/task/{{ $task->id }}">
            <div class="weui-cell__hd">
              <div class="priority {{$task->priority}}_label">
                {{ PmTaskModel::$priority_list[$task->priority]  }}
              </div>
            </div>
            <div class="weui-cell__bd">
              <p>{{ $task->task_name }}
                <span class="" style="float: right;margin-right: 10px;">
                  
                  <i class="weui-icon-info"></i>
                  <i class="weui-icon-download"></i>
                  <i class="weui-icon-success"></i>
                  <i class="weui-icon-waiting"></i>
                  <i class="weui-icon-warn"></i>
                  {{ PmTaskModel::$task_status_list[$task->task_status]  }}
                </span>
              </p>
            </div>

            <div class="weui-cell__bd">

              <p>{{ $task->start_at }} - {{ $task->end_at }}</p>
            </div>
            <div class="weui-cell__ft">{{ PmTaskModel::$priority_list[$task->priority]  }}</div>
          </a>
@endforeach
          
        </div>
      </div>
@endsection
