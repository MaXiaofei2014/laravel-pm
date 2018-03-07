<?php
use Illuminate\Support\Facades\Route;

Route::get('/{view?}', 'TaskController@index')->where('view', '(.*)');
