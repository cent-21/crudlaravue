<?php

use App\Http\Controllers\InstallationController;
use App\Models\User;
use App\Models\Installation;
use Illuminate\Support\Facades\Route;

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



// Route::get('/', function () {
//     return redirect()->route("installations");
// });

Route::get('/init', function() {
    User::factory()->count(100)->create();
    Installation::factory()->count(10)->create();
    echo "User and Installation init";
});

Route::get("", [InstallationController::class, "index"])->name("installations");
