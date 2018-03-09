<?php
use Illuminate\Support\Facades\Route;

Route::get('/meeting', 'MeetingController@index');

//Route::get('/{view?}', 'TaskController@index')->where('view', '(.*)');

Route::resources([
    'task' => TaskController::class,
]);

Route::resources([
    'meeting' => MeetingController::class,
]);

Route::resources([
    'schedule' => ScheduleController::class,
]);
