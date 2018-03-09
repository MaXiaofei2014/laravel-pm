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
      	{{ PmTaskModel::$priority_list[$task->priority]  }} - 
      	{{ $task->task_name }}
      </div></div>
    </div>
    <div class="weui-flex">
      <div class="weui-flex__item"><div class="">{{ PmTaskModel::$task_status_list[$task->task_status]  }}</div></div>
      <div class="weui-flex__item"><div class="">{{ PmTaskModel::$priority_list[$task->priority]  }}</div></div>
    </div>
    <div class="weui-flex">
      <div>
      	{{ $task->desc }}
      </div>
    </div>
</div>
@endsection
