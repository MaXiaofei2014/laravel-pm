<?php
use Illuminate\Support\Facades\Route;

Route::get('/meeting', 'MeetingController@index');

Route::get('/{view?}', 'TaskController@index')->where('view', '(.*)');
