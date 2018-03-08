<?php
use Illuminate\Support\Facades\Route;

Route::resources([
    'pm-task' => PmTaskController::class,
]);
