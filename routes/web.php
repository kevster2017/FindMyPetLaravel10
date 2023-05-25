<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MissingController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\FoundController;
use App\Http\Controllers\ReunitedController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PrivateMessageController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\PMReplyController;
use App\Http\Controllers\MsgReplyController;
use App\Http\Controllers\SocialShareController;
use App\Http\Controllers\PostController;

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
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/missing/dogs', [MissingController::class, 'missingDogsIndex']);
Route::get('/missing/cats', [MissingController::class, 'missingCatsIndex']);
Route::get('/missing/otherPets', [MissingController::class, 'missingPetsIndex']);
Route::get('/missing/myMissing', [MissingController::class, 'myMissingIndex'])->name('myMissing');

Route::get('/found/cats', [FoundController::class, 'foundCatsIndex']);
Route::get('/found/dogs', [FoundController::class, 'foundDogsIndex']);
Route::get('/found/otherPets', [FoundController::class, 'foundPetsIndex']);
Route::get('/found/myFound', [FoundController::class, 'myFoundIndex'])->name('myFound');

Route::get('/reunited/cats', [ReunitedController::class, 'reunitedCatsIndex']);
Route::get('/reunited/dogs', [ReunitedController::class, 'reunitedDogsIndex']);
Route::get('/reunited/otherPets', [ReunitedController::class, 'reunitedPetsIndex']);

/*

//Route::get('/reports/found', [ReportController::class, 'foundIndex']);




//Route::get('/missing', [ReportController::class, 'missingIndex']);




Route::get('/reunited', [ReportController::class, 'reunitedIndex']);
*/

Route::get('/home', [HomeController::class, 'index'])->name('home');

/* Routes to resource controllers */

Route::resource('/users', UserController::class)->middleware('auth');
Route::resource('/messages', MessagesController::class)->middleware('auth');
Route::resource('/missing', MissingController::class);
Route::resource('/found', FoundController::class);
Route::resource('/reunited', ReunitedController::class);
Route::resource('/contactUs', ContactUsController::class);
Route::resource('/privateMessage', PrivateMessageController::class)->middleware('auth');
Route::resource('/PMReply', PMReplyController::class)->middleware('auth');
Route::resource('/MsgReply', MsgReplyController::class)->middleware('auth');

Route::get('/viewStatistics', [StatisticsController::class, 'stats']);

Route::get('/Register', function () {
    return view('Register');
});

Route::get('/petEmergencies', function () {
    return view('petEmergencies');
})->name('petEmergencies');

Route::get('social-share', [SocialShareController::class, 'index']);

Route::controller(PostController::class)->group(function () {
    Route::get('posts', 'index');
    Route::post('posts', 'store')->name('posts.store');
});


Route::get('/petEmergencies', function () {
    return view('petEmergencies');
})->name('petEmergencies');
Route::get('/petEmergencies/preparingForEmergencies', function () {
    return view('emergencies.preparing');
})->name('petEmergencies.preparing');

Route::get('/petEmergencies/biteWounds', function () {
    return view('emergencies.bites');
})->name('petEmergencies.bites');

Route::get('/petEmergencies/bleeding', function () {
    return view('emergencies.bleeding');
})->name('petEmergencies.bleeding');

Route::get('/petEmergencies/brokenBones', function () {
    return view('emergencies.brokenBones');
})->name('petEmergencies.brokenBones');

Route::get('/petEmergencies/choking', function () {
    return view('emergencies.choking');
})->name('petEmergencies.choking');

Route::get('/petEmergencies/heatstroke', function () {
    return view('emergencies.heatstroke');
})->name('petEmergencies.heatstroke');

Route::get('/petEmergencies/hypothermia', function () {
    return view('emergencies.hypothermia');
})->name('petEmergencies.hypothermia');

Route::get('/petEmergencies/moving', function () {
    return view('emergencies.moving');
})->name('petEmergencies.moving');

Route::get('/petEmergencies/poisonsToxins', function () {
    return view('emergencies.poisonsToxins');
})->name('petEmergencies.poisonsToxins');

Route::get('/petEmergencies/rtas', function () {
    return view('emergencies.rtas');
})->name('petEmergencies.rtas');

Route::get('/petEmergencies/seizures', function () {
    return view('emergencies.seizures');
})->name('petEmergencies.seizures');
