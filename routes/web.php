<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentDB;
Route::get('/', function () {
    return view('pages.index');
});
Route::view('/contact','pages.contact');
Route::view('/home','pages.index');
Route::get('/ayaport', [StudentDB::class, 'index'])->name('student.index');
Route::get('student/create', [StudentDB::class, 'create'])->name('student.create');
Route::post('student', [StudentDB::class, 'save'])->name('student.save');
Route::get('student/{student}/updatePage', [StudentDB::class, 'updatePage'])->name('student.updatePage');
Route::put('student/{student}/update', [StudentDB::class, 'update'])->name('student.update');
Route::delete('student/{student}', [StudentDB::class, 'destroy'])->name('student.destroy');


