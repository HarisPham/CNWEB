<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComputerController;
use App\Http\Controllers\IssueController;

Route::get('/', function () {
    return redirect('/issues');  
});
// Route để hiển thị danh sách vấn đề
Route::get('/issues', [IssueController::class, 'index'])->name('issues.index');

Route::resource('issues', IssueController::class);


