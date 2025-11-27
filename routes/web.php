<?php

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeTypeController;
use App\Http\Controllers\HomeTypeDetailController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ConsultingController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/gioi-thieu', function () {
    return view('about');
});

Route::get('/lien-he', [ContactController::class, 'index'])->name('contact');
Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store');

// Route::get('/phpinfo', function () {
//     phpinfo();
// });

Route::get('/error/unsupported-image', function () {
    return view('errors.unsupported_image');
})->name('error.unsupported_image');

// Services
Route::prefix('dich-vu')->name('services.')->group(function () {
    Route::get('/{slug}', [ServiceController::class, 'userShow'])->name('detail');
});

// House Models
Route::prefix('mau-nha')->name('models.')->group(function () {
    Route::get('/{slug}', [HomeTypeController::class, 'userShow'])->name('detail');
});

// Projects
Route::prefix('du-an')->name('projects.')->group(function () {
    Route::get('/', [HomeTypeDetailController::class, 'userIndex'])->name('index');
    Route::get('/{slug}', [HomeTypeDetailController::class, 'userShow'])->name('detail');
});


// News
Route::prefix('tin-tuc')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'userIndex'])->name('index');
    Route::get('/{slug}', [NewsController::class, 'userShow'])->name('detail');
});

// Consulting
Route::prefix('tu-van')->name('consulting.')->group(function () {
    Route::get('/', [ConsultingController::class, 'userIndex'])->name('index');
    Route::get('/{slug}', [ConsultingController::class, 'userShow'])->name('detail');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('messages/{id}', [App\Http\Controllers\Voyager\MessagesController::class, 'show'])->name('voyager.messages.show');
    Route::post('messages/reply', [App\Http\Controllers\Voyager\MessagesController::class, 'reply'])->name('voyager.messages.reply');
});
