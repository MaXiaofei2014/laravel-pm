<?php
use Lifeibest\LaravelPm\Models\PmMeetingModel;	
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
          参会人员: {{ $meeting->participants }}
        </div>
    </div>
    </div>

    <div class="weui-flex">
    <div class="weui-flex__item">
      <div class="">
          开始 - 截止: {{ date('m-d H:i',strtotime($meeting->start_at)) }} - 
                {{ date('m-d H:i',strtotime($meeting->end_at)) }}
        </div>
    </div>
    </div>

    <article class="weui-article" style="padding-left: 0;padding-right: 0;">
        <section>
{!! nl2br($meeting->desc) !!}
</section>

    </article>


</div>
@endsection
