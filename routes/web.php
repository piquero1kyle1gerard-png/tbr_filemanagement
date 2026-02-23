<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyCalculatorController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RequestLogin;
use App\Http\Controllers\gradeController;
use App\Http\Controllers\StudentController;


Route::get('/ddd', function () {
    return view('welcome');
});

Route::get('/mypage', function () {
    return view('laravel');
})->name('homepage');

Route::get('/page1', function () {
    return view('page1');
})->name('jander');

//

Route::get('/index', function () {
    return view("mypages.index");
})->name('home');

Route::get('/gallery', function () {
    return view("mypages.gallery");
})->name('gallery');

Route::get('/contact', function () {
    return view("mypages.contact");
})->name('contact');
//

Route::get('/calculator', function () {
    return view("laravel.calculator");
})->name('calculator');
//
//middleware

Route::get('/loginForm', function(){
    return view('middlewaredemo.login');
})->name('login_page');

Route::post('loginForm',function (){
})->middleware('login.middleware');

Route::get('/dashboard', function(){
    return view('middlewaredemo.dashboard');
})->name('dashboard');

Route::middleware([RequestLogin::class])->group(function(){
    Route::post('/loginform');
});

Route::get('/', function () {
    return view("ACTIVITYY.LOGIN");
})->name('LOGIN');

Route::get('/RESETPASS', function () {
    return view("ACTIVITYY.RESETPASS");
})->name('RESETPASS');

Route::get('/SIGNUP', function () {
    return view("ACTIVITYY.SIGNUP");
})->name('register-form');







//ADMIN SIDE
Route::middleware(['auth'])->group(function()
{
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function(){

        Route::controller(gradeController::class)->group(function()
        {
            Route::get('/Dashboarding','index')->name('Dashboarding');
            //grade
            Route::post('/add_grade','add_grade')->name('add_grade');
            Route::put('/update_grade/{id}','update_grade')->name('update_grade');
            Route::delete('/delete_grade/{id}','delete_grade')->name('delete_grade');
            //Student
            Route::post('/add_Student','add_Student')->name('add_Student');
        });
        Route::controller(StudentController::class)->group(function()
        {
            //Student
            Route::post('/add_Student','add_Student')->name('add_Student');
        });


    });

    Route::middleware(['role:teacher'])->prefix('teacher')->name('teacher.')->group(function(){

        Route::controller(gradeController::class)->group(function()
        {
            Route::get('/Dashboarding','index')->name('Dashboarding');
            //grade
            Route::post('/add_grade','add_grade')->name('add_grade');
            Route::put('/update_grade2/{id}','update_grade2')->name('update_grade2');

            //Student
            Route::post('/add_Student','add_Student')->name('add_Student');
        });
        Route::controller(StudentController::class)->group(function()
        {
            //Student
            Route::post('/add_Student','add_Student')->name('add_Student');
        });


    });

    Route::middleware(['role:student'])->prefix('student')->name('student.')->group(function(){

        Route::controller(gradeController::class)->group(function()
        {
            Route::get('/Dashboarding','index')->name('Dashboarding');
            //grade
            Route::post('/add_grade','add_grade')->name('add_grade');
            Route::put('/update_grade/{id}','update_grade')->name('update_grade');
            Route::delete('/delete_grade/{id}','delete_grade')->name('delete_grade');
            //Student
            Route::post('/add_Student','add_Student')->name('add_Student');
        });
        Route::controller(StudentController::class)->group(function()
        {
            //Student
            Route::post('/add_Student','add_Student')->name('add_Student');
        });


    });



});

Route::middleware(['auth'])->group(function()
{
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function(){

        Route::controller(StudentController::class)->group(function()
        {
            Route::get('/grade7', 'grade7')->name('grade7');
            Route::get('/grade8', 'grade8')->name('grade8');
            Route::get('/grade9', 'grade9')->name('grade9');
            Route::get('/grade10', 'grade10')->name('grade10');
            Route::get('/grade11', 'grade11')->name('grade11');
            Route::get('/grade12', 'grade12')->name('grade12');


            Route::post('/add_Student','add_Student')->name('add_Student');
            Route::put('/update_Student/{id}','update_Student')->name('update_Student');
            Route::delete('/delete_Student/{id}','delete_Student')->name('delete_Student');


        });



    });

    Route::middleware(['role:teacher'])->prefix('teacher')->name('teacher.')->group(function(){

        Route::controller(StudentController::class)->group(function()
        {
            Route::get('/grade7', 'grade7')->name('grade7');
            Route::get('/grade8', 'grade8')->name('grade8');
            Route::get('/grade9', 'grade9')->name('grade9');
            Route::get('/grade10', 'grade10')->name('grade10');
            Route::get('/grade11', 'grade11')->name('grade11');
            Route::get('/grade12', 'grade12')->name('grade12');


            Route::post('/add_Student','add_Student')->name('add_Student');
            Route::put('/update_Student/{id}','update_Student')->name('update_Student');
            Route::delete('/delete_Student/{id}','delete_Student')->name('delete_Student');


        });



    });

    Route::middleware(['role:student'])->prefix('student')->name('student.')->group(function(){

        Route::controller(StudentController::class)->group(function()
        {
            Route::get('/grade7', 'grade7')->name('grade7');
            Route::get('/grade8', 'grade8')->name('grade8');
            Route::get('/grade9', 'grade9')->name('grade9');
            Route::get('/grade10', 'grade10')->name('grade10');
            Route::get('/grade11', 'grade11')->name('grade11');
            Route::get('/grade12', 'grade12')->name('grade12');


            Route::post('/add_Student','add_Student')->name('add_Student');
            Route::put('/update_Student/{id}','update_Student')->name('update_Student');
            Route::delete('/delete_Student/{id}','delete_Student')->name('delete_Student');


        });



    });



});































// Route::get('new-calculator',[MyCalculatorController::class,'showCalculator'])->name('show');
// Route::post('new-calculator',[MyCalculatorController::class,'calculateSum'])->name('showCalculate');

// Route::controller(MyCalculatorController::class)->group(function(){
//     route::get('new-calculator','showCalculator')->name('show');
//     route::post('new-calculator','calculateSum')->name('showCalculate');
// });

// Route::controller(MyCalculatorController::class)->group(function(){
//     route::get('new-calculator','showCalculator');
//     route::post('new-calculator','calculateSum');
// });



// Route::controller(MyCalculatorController::class)->group(function(){
//     route::get('new-calculator','showCalculator')->name('show');
//     route::post('new-calculator','calculateSum')->name('showCalculate');
// });

// Route::controller(MyCalculatorController::class)->prefix('admin')->group(function(){
//     route::get('new-calculator','showCalculator')->name('show');
//     route::post('new-calculator','calculateSum')->name('showCalculate');
// });

Route::prefix('admin')->group(function(){
    Route::controller(MyCalculatorController::class)->group(function(){
        route::get('new-calculator','showCalculator')->name('show');
        route::post('new-calculator','calculateSum')->name('showCalculate');
    });
});

Route::resource('jandergwapo',PhotoController::class);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__.'/auth.php';
