<?php

use App\Http\Controllers\BudgetHead\BudgetHeadController;
use App\Http\Controllers\FundingAgencies\FundingAgenciesController;
use App\Http\Controllers\ProjectDetail\ProjectDetailController;
use App\Http\Controllers\InvoiceUpload\InvoiceUploadController;
use App\Http\Controllers\ReleseFund\ReleseFundController;
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
        Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
        Route::post('/department', [DepartmentController::class, 'create'])->name('create');
        Route::get('/department/edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
        Route::put('/department/edit/{id}', [DepartmentController::class, 'update'])->name('update');
        Route::get('/department/delete/{id}', [DepartmentController::class, 'destroy'])->name('destroy');
        // download pdf
        Route::get('/department/download', [DepartmentController::class, 'pdf']);
        // at a time one pdf
        Route::get('/department/pdfForm/{id}', [DepartmentController::class, 'pdfForm']);
        Route::get('/createuser', [CreateUserController::class, 'index'])->name('usercreate.index');
        Route::post('/createuser', [CreateUserController::class, 'create'])->name('usercreate.create');
        Route::get('/createuser/edit/{id}', [CreateUserController::class, 'edit'])->name('usercreate.edit');
        Route::put('/createuser/edit/{id}', [CreateUserController::class, 'update'])->name('usercreate.update');
        Route::get('/createuser/delete/{id}', [CreateUserController::class, 'destroy'])->name('usercreate.destroy');
        // download pdf
        Route::get('/createuser/download', [CreateUserController::class, 'pdf']);
        // at a time one pdf
        Route::get('/createuser/pdfForm/{id}', [CreateUserController::class, 'pdfForm']);
        //    Budget Head
        Route::get('/budget', [BudgetHeadController::class, 'index'])->name('budget.index');
        Route::post('/budget', [BudgetHeadController::class, 'create'])->name('budget.create');
        Route::get('/budget/edit/{id}', [BudgetHeadController::class, 'edit'])->name('budget.edit');
        Route::put('/budget/edit/{id}', [BudgetHeadController::class, 'update'])->name('budget.update');
        Route::get('/budget/delete/{id}', [BudgetHeadController::class, 'destroy'])->name('budget.destroy');
        // download pdf
        Route::get('/budget/download', [BudgetHeadController::class, 'pdf']);
        // at a time one pdf
        Route::get('/budget/pdfForm/{id}', [BudgetHeadController::class, 'pdfForm']);
        //   funding agency
        Route::get('/funding', [FundingAgenciesController::class, 'index'])->name('funding.index');
        Route::post('/funding', [FundingAgenciesController::class, 'create'])->name('funding.create');
        Route::get('/funding/edit/{id}', [FundingAgenciesController::class, 'edit'])->name('funding.edit');
        Route::put('/funding/edit/{id}', [FundingAgenciesController::class, 'update'])->name('funding.update');
        Route::get('/funding/delete/{id}', [FundingAgenciesController::class, 'destroy'])->name('funding.destroy');
        // download pdf
        Route::get('/funding/download', [FundingAgenciesController::class, 'pdf']);
        // at a time one pdf
        Route::get('/funding/pdfForm/{id}', [FundingAgenciesController::class, 'pdfForm']);
        // Project Details
        Route::get('/projectdetail', [ProjectDetailController::class, 'index'])->name('projectdetail.index');
        Route::post('/projectdetail', [ProjectDetailController::class, 'create'])->name('projectdetail.create');
        Route::get('/projectdetail/edit/{id}', [ProjectDetailController::class, 'edit'])->name('projectdetail.edit');
        Route::put('/projectdetail/edit/{id}', [ProjectDetailController::class, 'update'])->name('projectdetail.update');
        Route::get('/projectdetail/delete/{id}', [ProjectDetailController::class, 'destroy'])->name('projectdetail.destroy');
        // download pdf
        Route::get('/projectdetail/download', [ProjectDetailController::class, 'pdf']);
        // at a time one pdf
        Route::get('/projectdetail/pdfForm/{id}', [ProjectDetailController::class, 'pdfForm']);
        //  show all details for projects details page
        Route::get('/projectdetails/showall/{id}', [ProjectDetailController::class, 'showall'])->name('projectdetails.showall');


        // invoice upload

        Route::get('/invoiceuoload', [InvoiceUploadController::class, 'index'])->name('invoiceuoload.index');
        Route::post('/invoiceuoload', [InvoiceUploadController::class, 'create'])->name('invoiceuoload.create');
        Route::get('/download/{file}', [InvoiceUploadController::class, 'download']);
        Route::get('/view/{id}', [InvoiceUploadController::class, 'view']);
        Route::get('invoiceuoload/delete/{id}', [InvoiceUploadController::class, 'destroy']);

        Route::get('/invoiceuoload/edit/{id}', [InvoiceUploadController::class, 'edit'])->name('invoiceuoload.edit');
        Route::put('/invoiceuoload/edit/{id}', [InvoiceUploadController::class, 'update'])->name('invoiceuoload.update');

        //fund relies
        Route::get('/relesefund', [ReleseFundController::class, 'index'])->name('relesefund.index');
        Route::post('/relesefund', [ReleseFundController::class, 'create'])->name('relesefund.create');
        Route::get('/relesefund/edit/{id}', [ReleseFundController::class, 'edit'])->name('relesefund.edit');
        Route::put('/relesefund/edit/{id}', [ReleseFundController::class, 'update'])->name('relesefund.update');
        Route::get('/relesefund/delete/{id}', [ReleseFundController::class, 'destroy'])->name('relesefund.destroy');
        // all pdf
        Route::get('/relesefund/download', [ReleseFundController::class, 'pdf']);
        // at a time one pdf
        Route::get('/relesefund/pdfForm/{id}', [ReleseFundController::class, 'pdfForm']);
        //   search Relese fund 
        //  search
        Route::get('/relesefund/showall/{id}', [ReleseFundController::class, 'showall'])->name('relesefund.showall');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile-update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/mail', [MailSettingController::class, 'index'])->name('mail.index');
        Route::put('/mail-update/{mailsetting}', [MailSettingController::class, 'update'])->name('mail.update');
    });
