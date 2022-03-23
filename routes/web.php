<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\BrokerPermissionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CybersecurityController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GrcController;
use App\Http\Controllers\InternationalController;
use App\Http\Controllers\KSAController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPermissionController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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


// //////////////////////Language Route //////////////////////////////
// Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('switch.language');


Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('login',[AuthController::class, 'showLogin'])->name('auth.login-show');
    Route::post('login',[AuthController::class, 'login'])->name('auth.login');

});
// Route::get('admin', function () {
//     return view('cms.categories.create');
// });
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::view('/','cms.parent');
    Route::resource('admins', AdminController::class);
    Route::resource('users',UserController::class);

    Route::resource('certificates',CertificateController::class);
    Route::resource('internationals',InternationalController::class);
    Route::resource('cybers',CybersecurityController::class);
    Route::resource('Grces',GrcController::class);
    Route::resource('ksas',KSAController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('answers',AnswerController::class);

    Route::get('getVideo/{id]',['QuestionController@getVideo']);

});

Route::get('/register',[UserController::class, 'create'])->name('user.signin');
Route::post('register',[UserController::class, 'store'])->name('user.register');
Route::get('logout',[UserController::class, 'logout'])->name('user.logout');
Route::post('user/login',[UserController::class, 'login'])->name('user.login');
Route::get('user/login',[UserController::class, 'loginPage'])->name('user.login.page');



Route::get('/',[FrontController::class, 'index'])->name('index');
Route::post('/ratings',[FrontController::class, 'ratings'])->name('ratings');
Route::get('/cybersecurity',[FrontController::class, 'cyberPages'])->name('cyberPages');
Route::get('/cybersecurity/{id}/details',[FrontController::class, 'cyberDetails'])->name('cyberDetails');
Route::post('/addComment',[FrontController::class, 'addComment'])->name('addComment');
Route::get('grc',[FrontController::class, 'grcPages'])->name('grcPages');
Route::get('certificate',[FrontController::class, 'certificate'])->name('certificate');
Route::get('international',[FrontController::class, 'international'])->name('international');
Route::get('ksa',[FrontController::class, 'ksa'])->name('ksa');
Route::post('answer_to',[FrontController::class, 'answer_to'])->name('answer_to');
Route::get('test',function () {
    //
    return now();

});

