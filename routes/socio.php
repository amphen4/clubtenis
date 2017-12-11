<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('socio')->user();

    //dd($users);

    return view('socio.home');
})->name('home');

