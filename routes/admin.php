<?php
use Illuminate\Support\Facades\Route;

Route::resources([
    'pm-task' => PmTaskController::class,
]);

Route::resources([
    'pm-meeting' => PmMeetingController::class,
]);

Route::resources([
    'pm-schedule' => PmScheduleController::class,
]);
