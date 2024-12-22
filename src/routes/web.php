<?php

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {

    Session::id();

    Cache::remember('test', now()->addDay(), fn()=>true);

    User::all();

    return view('welcome');
});
