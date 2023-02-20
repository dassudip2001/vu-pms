<?php

use App\Http\Controllers\BudgetHead\BudgetHeadController;
use App\Http\Controllers\FundingAgencies\FundingAgenciesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ProfileController,
    MailSettingController,
};
use App\Http\Controllers\department\DepartmentController;
use App\Http\Controllers\createUser\CreateUserController;

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
});


// Route::get('/test-mail', function () {

//     $message = "Testing mail";

//     \Mail::raw('Hi, welcome!', function ($message) {
//         $message->to('sudip5428@gmail.com')
//             ->subject('Testing mail');
//     });

//     dd('sent');
// });


Route::get('/dashboard', function () {
    return view('front.dashboard');
})->middleware(['front'])->name('dashboard');


require __DIR__ . '/front_auth.php';

// Admin routes
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('admin.dashboard');

require __DIR__ . '/auth.php';




Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')
    ->group(function () {
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('users', 'UserController');
        Route::resource('posts', 'PostController');
        Route::get('/department', [DepartmentController::class, 'index'])->name('index');
        Route::post('/department', [DepartmentController::class, 'create'])->name('create');
        Route::get('/department/edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
        Route::put('/department/edit/{id}', [DepartmentController::class, 'update'])->name('update');
        Route::get('/department/delete/{id}', [DepartmentController::class, 'destroy'])->name('destroy');
        Route::get('/createuser', [CreateUserController::class, 'index'])->name('usercreate.index');
        Route::post('/createuser', [CreateUserController::class, 'create'])->name('usercreate.create');
        Route::get('/createuser/edit/{id}', [CreateUserController::class, 'edit'])->name('usercreate.edit');
        Route::put('/createuser/edit/{id}', [CreateUserController::class, 'update'])->name('usercreate.update');
        Route::get('/createuser/delete/{id}', [CreateUserController::class, 'destroy'])->name('usercreate.destroy');
        //    Budget Head
        Route::get('/budget', [BudgetHeadController::class, 'index'])->name('budget.index');
        Route::post('/budget', [BudgetHeadController::class, 'create'])->name('budget.create');
        Route::get('/budget/edit/{id}', [BudgetHeadController::class, 'edit'])->name('budget.edit');
        Route::put('/budget/edit/{id}', [BudgetHeadController::class, 'update'])->name('budget.update');
        Route::get('/budget/delete/{id}', [BudgetHeadController::class, 'destroy'])->name('budget.destroy');
        //   funding agency
        Route::get('/funding',[FundingAgenciesController::class,'index'])->name('funding.index');
        Route::post('/funding',[FundingAgenciesController::class,'create'])->name('funding.create');
        Route::get('/funding/edit/{id}',[FundingAgenciesController::class,'edit'])->name('funding.edit');
        Route::put('/funding/edit/{id}',[FundingAgenciesController::class,'update'])->name('funding.update');
        Route::get('/funding/delete/{id}',[FundingAgenciesController::class,'destroy'])->name('funding.destroy');
        // download pdf
        Route::get('/funding/download',[FundingAgenciesController::class,'pdf']);
        // at a time one pdf
        Route::get('/funding/pdfForm/{id}',[FundingAgenciesController::class,'pdfForm']);
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile-update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/mail', [MailSettingController::class, 'index'])->name('mail.index');
        Route::put('/mail-update/{mailsetting}', [MailSettingController::class, 'update'])->name('mail.update');
    });
