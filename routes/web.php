<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsletterController;

/*
|--------------------------------------------------------------------------
| PÚBLICO
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/blog', [HomeController::class, 'blog']);

Route::get('/post/{slug}', [HomeController::class, 'show']);

/*
|--------------------------------------------------------------------------
| NEWSLETTER
|--------------------------------------------------------------------------
*/

Route::post('/newsletter/store', [NewsletterController::class, 'store']);

/*
|--------------------------------------------------------------------------
| COMENTÁRIOS E LIKES
|--------------------------------------------------------------------------
*/

Route::post('/post-comment/{id}', [HomeController::class, 'comment']);

Route::post('/post-like/{id}', [HomeController::class, 'like']);

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        return view('dashboard');

    })->middleware(['verified'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | POSTS
    |--------------------------------------------------------------------------
    */

    Route::get('/create-post', [HomeController::class, 'create']);

    Route::post('/store-post', [HomeController::class, 'store']);

    Route::delete('/delete-post/{id}', [HomeController::class, 'delete']);

    /*
    |--------------------------------------------------------------------------
    | COMMENTS
    |--------------------------------------------------------------------------
    */

    Route::get('/comments', [HomeController::class, 'comments']);

    Route::patch('/comment/approve/{id}', [HomeController::class, 'approveComment']);

    Route::delete('/comment/delete/{id}', [HomeController::class, 'deleteComment']);

    /*
    |--------------------------------------------------------------------------
    | BANNERS
    |--------------------------------------------------------------------------
    */

    Route::get('/banners', [BannerController::class, 'index']);

    Route::get('/create-banner', [BannerController::class, 'create']);

    Route::post('/store-banner', [BannerController::class, 'store']);

    Route::get('/banner/{id}', [BannerController::class, 'show']);

    Route::get('/banner/edit/{id}', [BannerController::class, 'edit']);

    Route::put('/banner/update/{id}', [BannerController::class, 'update']);

    Route::patch('/banner/toggle/{id}', [BannerController::class, 'toggle']);

    Route::delete('/banner/delete/{id}', [BannerController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | ABOUT
    |--------------------------------------------------------------------------
    */

    Route::get('/about', [AboutController::class, 'index']);

    Route::post('/about/store', [AboutController::class, 'store']);

    Route::get('/about/{id}', [AboutController::class, 'show']);

    Route::get('/about/edit/{id}', [AboutController::class, 'edit']);

    Route::put('/about/update/{id}', [AboutController::class, 'update']);

    Route::patch('/about/toggle/{id}', [AboutController::class, 'toggle']);

    Route::delete('/about/delete/{id}', [AboutController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | TEAM
    |--------------------------------------------------------------------------
    */

    Route::get('/team', [TeamMemberController::class, 'index']);

    Route::post('/team/store', [TeamMemberController::class, 'store']);

    Route::patch('/team/toggle/{id}', [TeamMemberController::class, 'toggle']);

    Route::delete('/team/delete/{id}', [TeamMemberController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';