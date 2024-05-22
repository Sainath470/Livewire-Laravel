<?php

use App\Livewire\AddCar;
use App\Livewire\CarList;
use App\Livewire\EditCar;
use App\Livewire\TestPage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/testing', TestPage::class);
Route::get('/cars', CarList::class);
Route::get('/', CarList::class);

Route::get('/add/new', AddCar::class);
Route::get('/edit/car/{id}', EditCar::class);