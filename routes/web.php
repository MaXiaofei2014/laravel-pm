<?php
use Illuminate\Support\Facades\Route;

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

Route::get('/calendar/time', 'ScheduleController@time');

Route::resources([
    'calendar' => CalendarController::class,
]);

// Route::get('schedule-api', function () {
//     return PmScheduleResource::collection(PmScheduleModel::paginate());
// });
