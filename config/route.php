<?php

use app\controller\AuthController;
use app\controller\IndexController;
use Webman\Route;

Route::disableDefaultRoute();

Route::get('/', [IndexController::class, 'json']);
Route::post('/auth/index', [AuthController::class, 'index']);
