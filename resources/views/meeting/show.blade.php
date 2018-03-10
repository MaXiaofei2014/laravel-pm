<?php
use Lifeibest\LaravelPm\Models\PmMeetingModel;	
?>
@extends('pm::layouts.pm')
@section('title')
Tasks
@endsection
@section('content')
<div class="show">
	  <div class="weui-flex">
    <div class="weui-flex__item">
      <div class="color_blue">
      	{{ $meeting->id }}-{{ $meeting->meeting_theme }}
      </div>
    </div>
    </div>

    <div class="weui-flex">
    <div class="weui-flex__item">
      <div class="">
          Type: <span class="meeting_type">{{ PmMeetingModel::$meeting_type_list[$meeting->meeting_type] }}</span>
        </div>
    </div>
    </div>

    <div class="weui-flex">
    <div class="weui-flex__item">
      <div class="">
          Start - End: {{ date('m-d H:i',strtotime($meeting->start_at)) }} - 
                {{ date('m-d H:i',strtotime($meeting->end_at)) }}
        </div>
    </div>
    </div>

    <div class="weui-flex">
      <div style="color: #999;">
      	{{ $meeting->desc }}
      </div>
    </div>
</div>
@endsection
