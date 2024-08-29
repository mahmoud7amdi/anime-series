<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\EpisodesController ;
use App\Http\Controllers\Backend\ShowController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\EpisodeController;
use App\Http\Controllers\Frontend\FollowController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\showDetailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
//     return view('index');
// });
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...

        Route::get('/home',[HomeController::class,'index'])->name('home');
        Route::get('/show/details/{id}',[showDetailsController::class,'showDetails'])->name('show.details');
        Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


        Route::get('auth/google',[SocialiteController::class,'GoogleLogin'])->name('google.login');
        Route::get('auth/google/callback',[SocialiteController::class,'GoogleCallback']);
        Route::any('/shows/search', [UserController::class,'search'])->name('show.search');
Route::middleware('auth')->group(function () {
    Route::post('/comment', [CommentController::class, 'store'])->name('store.comment');
    Route::post('/shows/follow/{id}', [FollowController::class, 'follow'])->name('shows.follow');
    Route::post('/shows/unfollow/{id}', [FollowController::class, 'unfollow'])->name('shows.unfollow');
    Route::get('/shows/anmieWhatching/{show_id}/{episode_name}', [EpisodeController::class,'anmieWatching'])->name('anmie.watch');
    Route::get('/category/{id}', [FrontendCategoryController::class,'category'])->name('category');
    Route::get('/user/followd-shows', [UserController::class,'followShows'])->name('follow.shows');


    Route::controller(UserController::class)->group(function (){

        Route::get('user/account/page','UserAccount')->name('user.account.page');
        // Route::get('user/change/password','UserChangPassword')->name('user.change.password');
        // Route::get('user/order/page','UserOrderPage')->name('user.order.page');
        // Route::get('user/order_details/{order_id}','UserOrderDetails') ;
        // Route::get('user/invoice_download/{order_id}','UserOrderInvoice') ;
        // Route::post('return/order/{order_id}','ReturnOrder')->name('return.order');
        // Route::get('return/order/Page','ReturnOrderPage')->name('return.order.page');
        // Route::get('user/track/order','UserTrackOrder')->name('user.track.order');
        // Route::post('order/tracking','OrderTracking')->name('order.tracking');

    });

});

Route::middleware(['auth','role:admin'])->group(function (){
    Route::get('admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
    Route::get('admin/change/password',[AdminController::class,'AdminChangePassword'])->name('admin.change.password');
    Route::post('admin/update/password',[AdminController::class,'AdminUpdatePassword'])->name('update.password');


    Route::controller(CategoryController::class)->group(function (){
        Route::get('all/categories','index')->name('all.categories');
        Route::get('add/category','create')->name('add.category');
        Route::post('store/category','store')->name('store.category');
        Route::get('edit/category/{id}','edit')->name('edit.category');
        Route::put('update/category','update')->name('update.category');
        Route::get('delete/category/{id}','destroy')->name('destroy.category');
    });

    Route::controller(ShowController::class)->group(function (){
        Route::get('all/show','index')->name('all.show');
        Route::get('add/show','create')->name('add.show');
        Route::post('store/show','store')->name('store.show');
        Route::get('edit/show/{id}','edit')->name('edit.show');
        Route::put('update/show','update')->name('update.show');
        Route::get('delete/show/{id}','destroy')->name('destroy.show');
    });
    Route::controller(EpisodesController::class)->group(function (){
        Route::get('all/episodes','index')->name('all.episodes');
        Route::get('add/episode','create')->name('add.episode');
        Route::post('store/episode','store')->name('store.episode');
        Route::get('edit/episode/{id}','edit')->name('edit.episode');
        Route::put('update/episode/{id}','update')->name('update.episode');
        Route::get('delete/episode/{id}','destroy')->name('destroy.episode');
    });

 });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




    });



require __DIR__.'/auth.php';
