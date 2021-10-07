<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileImage;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Multipic;

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

    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $images = Multipic::all();
    $sliders = DB::table('sliders')->get();
    return view('home',compact('sliders', 'brands', 'abouts', 'images'));
})->name('home');

// Route::get('/contact', 'ContactController@index');

// Route::get('/contact-ssddsVSFT-xhmys-atjrtn', [ContactController::class, 'index'])->name('con');

// Category Controller

Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'EditCat']);

Route::post('/category/update/{id}', [CategoryController::class, 'UpdateCat']);

Route::get('softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);

Route::get('category/restore/{id}', [CategoryController::class, 'Restore']);

Route::get('pdelete/category/{id}', [CategoryController::class, 'PDelete']);


// Brand Route

Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');

Route::post('/brand/add', [BrandController::class, 'AddBrand'])->name('store.brand');

Route::get('/brand/edit/{id}', [BrandController::class, 'EditBrand']);

Route::post('/brand/update/{id}', [BrandController::class, 'UpdateBrand']);

Route::get('/brand/delete/{id}', [BrandController::class, 'DeleteBrand']);


// Multi Image

Route::get('/multi/image', [BrandController::class, 'MultiPic'])->name('multi.image');

Route::post('/multi/add', [BrandController::class, 'StoreImage'])->name('store.image');


// EMail

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Auth

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    // $users = User::all();

    // Query Builder

    //   $users = DB::table('users')->get();

    return view('admin.dashboard.index');
})->name('dashboard');

// Log Out

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

// Slider Route

Route::get('/home/slider', [HomeController::class, 'Slider'])->name('home.slider');

Route::get('/home/newslider', [HomeController::class, 'NewSlider'])->name('new.slider');

Route::post('/home/addslider', [HomeController::class, 'AddSlider'])->name('add.slider');

Route::get('/slider/edit/{id}', [HomeController::class, 'EditSlider']);

Route::post('/slider/update/{id}', [HomeController::class, 'UpdateSlider']);

Route::get('/slider/delete/{id}', [HomeController::class, 'DeleteSlider']);


// About Route

Route::get('/home/about', [AboutController::class, 'About'])->name('home.about');

Route::get('/about/home', [AboutController::class, 'AboutPage'])->name('about');

Route::get('/home/newabout', [AboutController::class, 'New_About'])->name('new.about');

Route::post('/home/addabout', [AboutController::class, 'AddAbout'])->name('add.about');

Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);

Route::post('/about/update/{id}', [AboutController::class, 'UpdateAbout']);

Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);

// Portfolio

Route::get('/portfolio', [AboutController::class, 'Portfolio'])->name('portfolio');

// Contact

Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');

Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');

Route::get('/admin/newcontact', [ContactController::class, 'NewContact'])->name('new.contact');

Route::post('/admin/addcontact', [ContactController::class, 'AddContact'])->name('add.contact');

Route::get('/contact/edit/{id}', [ContactController::class, 'EditContact']);

Route::post('/contact/update/{id}', [ContactController::class, 'UpdateContact']);

Route::get('/contact/delete/{id}', [ContactController::class, 'DeleteContact']);

Route::post('/contact/form', [ContactController::class, 'ContactForm'])->name('contact.form');

Route::get('/admin/contactmessage', [ContactController::class, 'AdminContactMessage'])->name('admin.contactmessage');

Route::get('/contactmessage/delete/{id}', [ContactController::class, 'DeleteMessage']);

// User Profile Changes

Route::get('/user/password', [ChangePass::class, 'ChangePassword'])->name('change.password');

Route::post('/password/update', [ChangePass::class, 'UpdatePassword'])->name('pass.update');

Route::get('/user/profile', [ChangePass::class, 'ProfileUpdate'])->name('profile.update');

Route::post('/user/profile/update', [ChangePass::class, 'UpdateUserProfile'])->name('update.profile');

Route::post('/user/profile/picture', [ChangePass::class, 'UpdateUserPicture'])->name('update.picture');

// Teams

Route::get('/team', [HomeController::class, 'Team'])->name('team');

// Testimonials

Route::get('/testimonials', [HomeController::class, 'Testimonies'])->name('testimonials');


// Services

Route::get('/services', [HomeController::class, 'Service'])->name('services');
