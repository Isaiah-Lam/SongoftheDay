<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}  

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $songs = json_decode(json_encode(DB::select("select * from songs join links on (id = songid) order by id")), true);
    return view('index', ['songs' => $songs]);
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/suggestions', function () {
    $suggestions = json_decode(json_encode(DB::select("select * from suggestions order by id")), true);
    return view('suggestions', ['suggestions' => $suggestions]);
});

Route::get('/logout', function () {
    $_SESSION['admin'] = false;
    return redirect('/');
});