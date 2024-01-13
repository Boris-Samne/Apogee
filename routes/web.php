<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Prof\ProfController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;



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

Route::get('/', function () {
    return view('portail');
});

Route::get('/apogee', [HomeController::class, 'portail'])->name('portail');
Route::get('/pdf', [PdfController::class, 'generatePdf'])->name('pdf');
Route::view('/pdfT', 'pdf.template',['title'=>'Boris', 'content'=>'samne pengdwende Boris']);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){
  
    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.user.login')->name('login');
          Route::view('/register','dashboard.user.register')->name('register');
          Route::post('/create',[UserController::class,'create'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function(){
        Route::get('/releve/{user}',  [UserController::class,'releve'])->name('releve');
          Route::view('/home','dashboard.user.home')->name('home');
          Route::post('/logout',[UserController::class,'logout'])->name('logout');
          Route::get('/add-new',[UserController::class,'add'])->name('add');
          Route::get('/result{user}',[UserController::class,'result'])->name('result');
          Route::get('/docs/{doc}',[UserController::class,'docs'])->name('docs');
    });

});
Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::match(['get', 'post'], '/classement', [AdminController::class, 'classement'])->name('classement');
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::view('/filieres','dashboard.admin.filieres')->name('filieres');
        Route::view('/matieres','dashboard.admin.matieres')->name('matieres');
        Route::view('/semestres','dashboard.admin.semestres')->name('semestres');
        Route::post('/insertFilier', [AdminController::class,'insertFilier'])->name('insertFilier');
        Route::post('/insertSemestre', [AdminController::class,'insertSemestre'])->name('insertSemestre');
        Route::post('/insertMatiere', [AdminController::class,'insertMatiere'])->name('insertMatiere');
        Route::get('/editF/{id}',  [AdminController::class,'editFiliere'])->name('editFiliere');
        Route::get('/editM/{id}',  [AdminController::class,'editMatiere'])->name('editMatiere');
        Route::get('/editS/{id}',  [AdminController::class,'editSemestre'])->name('editSemestre');
        Route::put('/updateFiliere/{id}', [AdminController::class,'updateFiliere'])->name('updateFiliere');
        Route::put('/updateMatiere/{id}', [AdminController::class,'updateMatiere'])->name('updateMatiere');
        Route::put('/updateSemestre/{id}', [AdminController::class,'updateSemestre'])->name('updateSemestre');
        Route::get('/deleteFiliere', [AdminController::class,'deleteFiliere'])->name('deleteFiliere');
        Route::get('/deleteMatiere', [AdminController::class,'deleteMatiere'])->name('deleteMatiere');
        Route::get('/deleteSemestre', [AdminController::class,'deleteSemestre'])->name('deleteSemestre');
        Route::view('/addFilier','dashboard.admin.addFilier')->name('addFilier');
        Route::view('/addMatiere','dashboard.admin.addMatiere')->name('addMatiere');
        Route::view('/addSemestre','dashboard.admin.addSemestre')->name('addSemestre');
        Route::get('/etudiantesPreins', [AdminController::class,'etudiantesPreins'])->name('etudiantesPreins');
        Route::get('/profsPreins', [AdminController::class,'profsPreins'])->name('profsPreins');
        Route::get('/validationUser/{id}',[AdminController::class,'validationUser'])->name('validationUser');
        Route::get('/validationProf/{id}',[AdminController::class,'validationProf'])->name('validationProf');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});


Route::get('/chooseClasse/{id}', [ProfController::class, 'chooseClasse'])->name('chooseClasse');
Route::post('/RegisterMark/{id}', [ProfController::class, 'RegisterMark'])->name('RegisterMark');

Route::prefix('prof')->name('prof.')->group(function(){
       
    Route::middleware(['guest:prof','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.prof.login')->name('login');
          Route::view('/register','dashboard.prof.register')->name('register');
          Route::post('/create',[ProfController::class,'create'])->name('create');
          Route::get('/home',[ProfController::class,'home'])->name('home');
          Route::post('/check',[ProfController::class,'check'])->name('check');
    });

    Route::middleware(['auth:prof','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.prof.home')->name('home');
        Route::post('/logout',[ProfController::class,'logout'])->name('logout');
        Route::get('/add-new',[ProfController::class,'add'])->name('add');

    });

});