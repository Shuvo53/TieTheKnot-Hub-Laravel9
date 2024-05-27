<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\frontendController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\frontend\FrontController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CartController as ControllersCartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\frontend\contactComplains;
use Illuminate\support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResidentialProjectController;

use App\Http\Controllers\CommercialProjectController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\UserProjectController;

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

Route::get('/', [FrontController::class ,  'mainpage']);
Route::get('/category',[FrontController::class ,  'category']);
Route::get('view-category/{slug}',[FrontController::class ,  'viewCategory']);
Route::get('view-category/{cate_slug}/{prod_slug}',[FrontController::class ,  'productView']);
Route::get('view-product/{prod_slug}',[FrontController::class ,  'eachProdView']);

Route::get('/success', [CartController::class, 'success'])->name('success');




//  Auth::routes();

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::GET('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Add other routes that require authentication here
});




//projectController
// routes/web.php






// // Residential Project Routes
// Route::get('residential_projects', [ResidentialProjectController::class, 'index'])->name('residential_projects.index');
// Route::get('residential_projects/create', [ResidentialProjectController::class, 'create'])->name('residential_projects.create');
// Route::post('residential_projects', [ResidentialProjectController::class, 'store'])->name('residential_projects.store');
// Route::get('residential_projects/{id}/edit', [ResidentialProjectController::class, 'edit'])->name('residential_projects.edit');
// Route::put('residential_projects/{id}', [ResidentialProjectController::class, 'update'])->name('residential_projects.update');
// Route::delete('residential_projects/{id}', [ResidentialProjectController::class, 'destroy'])->name('residential_projects.destroy');

// // Commercial Project Routes
// Route::get('commercial_projects', [CommercialProjectController::class, 'index'])->name('commercial_projects.index');
// Route::get('commercial_projects/create', [CommercialProjectController::class, 'create'])->name('commercial_projects.create');
// Route::post('commercial_projects', [CommercialProjectController::class, 'store'])->name('commercial_projects.store');
// Route::get('commercial_projects/{id}/edit', [CommercialProjectController::class, 'edit'])->name('commercial_projects.edit');
// Route::put('commercial_projects/{id}', [CommercialProjectController::class, 'update'])->name('commercial_projects.update');
// Route::delete('commercial_projects/{id}', [CommercialProjectController::class, 'destroy'])->name('commercial_projects.destroy');




Route::middleware(['auth.session'])->group(function () {
    Route::get('/home', function () {
        return view('layouts.customer');
    });
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeOrder']);
    Route::get('my-order', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'viewOrder']);
    Route::get('contact',[contactComplains::class ,  'index']);
    Route::post('sendMessage',[contactComplains::class ,  'submitForm']);
    Route::view('about' , 'frontend.About');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
// routes/web.php



Route::get('/projects/residential', [UserProjectController::class, 'showResidential'])->name('frontend.projects.residential');
Route::get('/projects/commercial', [UserProjectController::class, 'showCommercial'])->name('frontend.projects.commercial');
Route::get('/projects/index', [UserProjectController::class, 'index'])->name('frontend.projects.index');

});





Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::patch('/update-cart', [CartController::class, 'update'])->name('update_cart');
Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');




// Route::middleware(['auth' ])->group(function () {
//     Route::get('checkout', [CheckoutController::class , 'index']);
//     Route::post('place-order',[CheckoutController::class , 'placeOrder']);
//     Route::get('my-order',[UserController::class , 'index']);
//     Route::get('view-order/{id}',[UserController::class , 'viewOrder']);
// });



// Admin DashBoard Routes
Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/', function () {
        return view('Admin.dashboard');
     });
});



Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard','App\Http\Controllers\Admin\frontendController@index');

    // Categories Routes

    // Route::get('/categories','App\Http\Controllers\Admin\CategoriesController@index');
    // Route::get('/add-category','App\Http\Controllers\Admin\CategoriesController@add');
    // Route::post('insert-category' , 'App\Http\Controllers\Admin\CategoriesController@insert');
    // Route::get('edit-category/{id}',[CategoriesController::class , 'edit']);
    // Route::put('update-category/{id}',[CategoriesController::class , 'update']);
    // Route::get('delete-category/{id}',[CategoriesController::class , 'delete']);


    // // Product Routes
    // Route::get('/products','App\Http\Controllers\Admin\ProductController@index');
    // Route::get('/add-product','App\Http\Controllers\Admin\ProductController@add');
    // Route::post('insert-product' , 'App\Http\Controllers\Admin\ProductController@insert');
    // Route::get('edit-product/{id}',[ProductController::class, 'edit']);
    // Route::put('update-product/{id}',[ProductController::class , 'update']);
    // Route::get('delete-product/{id}',[ProductController::class , 'delete']);
    // Route::put('update-order/{id}',[UserController::class , 'updateOrder']);


    // Route::get('orders',[OrderController::class, 'index']);
    // Route::get('admin/view-order/{id}',[OrderController::class, 'view']);
    // Route::put('update-order/{id}',[OrderController::class , 'updateOrder']);
    // Route::get('order-history',[OrderController::class , 'orderHistory']);

    Route::get('users',[DashboardController::class, 'users']);
    Route::get('view-user/{id}',[DashboardController::class, 'viewUser']);
    Route::get('/admin/projects', [ProjectController::class, 'index'])->name('projects.index');


    Route::get('message',[contactComplains::class, 'viewcomplains']);




    // Residential Projects
    Route::get('/admin/residential/index', [ResidentialProjectController::class, 'index'])->name('residential_projects.index');
    Route::get('/admin/residential/create', [ResidentialProjectController::class, 'create'])->name('residential_projects.create');
    Route::post('/admin/residential', [ResidentialProjectController::class, 'store'])->name('residential_projects.store');
    Route::get('/admin/residential/{id}/edit', [ResidentialProjectController::class, 'edit'])->name('residential_projects.edit');
    Route::put('/admin/residential/{id}', [ResidentialProjectController::class, 'update'])->name('residential_projects.update');
    Route::delete('/admin/residential/{id}', [ResidentialProjectController::class, 'destroy'])->name('residential_projects.destroy');

    // Commercial Projects
    Route::get('/admin/commercial/index', [CommercialProjectController::class, 'index'])->name('commercial_projects.index');
    Route::get('/admin/commercial/create', [CommercialProjectController::class, 'create'])->name('commercial_projects.create');
    Route::post('/admin/commercial', [CommercialProjectController::class, 'store'])->name('commercial_projects.store');
    Route::get('/admin/commercial/{id}/edit', [CommercialProjectController::class, 'edit'])->name('commercial_projects.edit');
    Route::put('/admin/commercial/{id}', [CommercialProjectController::class, 'update'])->name('commercial_projects.update');
    Route::delete('/admin/commercial/{id}', [CommercialProjectController::class, 'destroy'])->name('commercial_projects.destroy');

    // All Projects
    Route::get('/admin/project', [ProjectController::class, 'index'])->name('project.index');

    //Team



    Route::get('/admin/team/index', [TeamMemberController::class, 'index'])->name('team_members.index');
    Route::get('/admin/team/create', [TeamMemberController::class, 'create'])->name('team_members.create');
    Route::post('/admin/team', [TeamMemberController::class, 'store'])->name('team_members.store');
    Route::get('/admin/team/{id}/edit', [TeamMemberController::class, 'edit'])->name('team_members.edit');
    Route::put('/admin/team/{id}', [TeamMemberController::class, 'update'])->name('team_members.update');
    Route::delete('/admin/team/{id}', [TeamMemberController::class, 'destroy'])->name('team_members.destroy');



});



