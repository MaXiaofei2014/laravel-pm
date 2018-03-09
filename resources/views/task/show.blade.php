<?php
use Lifeibest\LaravelPm\Models\PmTaskModel;	
?>
@extends('pm::layouts.pm')
@section('title')
Tasks
@endsection
@section('content')
<div class="show">
	<div class="weui-flex">
      <div class="weui-flex__item"><div class="color_blue">
      	{{ PmTaskModel::$priority_list[$task->priority]  }}-{{ $task->id }}-{{ $task->task_name }}
      </div></div>
    </div>
    <div class="weui-flex">
      <div class="weui-flex__item">
        <div class="">
          Status: <span class="task_status task_status_{{$task->task_status}}">{{ PmTaskModel::$task_status_list[$task->task_status] }}</span>
        </div>
      </div>
      <div class="weui-flex__item"><div class="">Start - End: {{ date('m-d',strtotime($task->start_at)) }} - 
                {{ date('m-d',strtotime($task->end_at)) }}</div></div>
    </div>
    <div class="weui-flex">
      <div style="color: #999;">
      	{{ $task->desc }}
      </div>
    </div>
</div>
@endsection
