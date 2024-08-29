<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeachersController; 
use App\Http\Controllers\TeacherDashboardController; 
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AddClassController;
use App\Http\Controllers\PupilsController; 
use App\Http\Controllers\ClassesLessonController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\CreateClassController; 
use App\Http\Controllers\CountViewController;  
use App\Http\Controllers\AssignClassController;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\ClaimedReward; 
use App\Http\Controllers\MathGameController;

use App\Http\Controllers\AuthController;
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
/*Route::get('/', function () {
    return view('login');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/lesson', function () {
    return view('lesson');
});

Route::get('/pupils', function () {
    return view('pupils');
});

Route::get('/activity', function () {
    return view('activity');
});

Route::get('/reward', function () {
    return view('reward');
});

Route::get('/dummy', function () {
    return view('dummy');
});
// Route::get('/student_dashboard', function () {
//     return view('student_dashboard');
// });

Route::get('/pupils_lesson', function () {
    return view('pupils_lesson');
});


Route::get('/admin_register', function () {
    return view('admin_register');
});





Route::controller(AuthController::class)->group(function () {
    Route::get('register','register')->name('register');
    Route::post('register','registerSave')->name('register_save');

    Route::get('/','login')->name('login');
    Route::post('login','loginAction')->name('login_action');

    Route::get('logout','logout')->middleware('auth')->name('logout');

    
});



Route::middleware(['auth', 'admin'])->group(function () {
    // Place admin-only routes here
    Route::get('/add_class/destroy/{id}', [ClassesLessonController::class, 'destroy'])->name('add_class.destroy');

    Route::get('/dashboard', [CountViewController::class, 'dashboard'])->name('dashboard');


    // TeachersController Routes
    Route::get('/teacher_registration', [TeachersController::class, 'index'])->name('teacher_registration');
    Route::get('/teacher_registration/create', [TeachersController::class, 'create'])->name('teacher_registration.create');
    Route::post('/teacher_registration/store', [TeachersController::class, 'store'])->name('teacher_registration.store');
    Route::get('/teacher_registration/show/{id}', [TeachersController::class, 'show'])->name('teacher_registration.show');
    Route::get('/teacher_registration/edit/{id}', [TeachersController::class, 'edit'])->name('teacher_registration.edit');
    Route::put('/teacher_registration/edit/{id}', [TeachersController::class, 'update'])->name('teacher_registration.update');
    Route::delete('/teacher_registration/destroy/{id}', [TeachersController::class, 'destroy'])->name('teacher_registration.destroy');

     // PupilsController Routes
     Route::get('/pupils_registration/index', [PupilsController::class, 'index'])->name('pupils_registration.index');
     Route::get('/pupils_registration/create', [PupilsController::class, 'create'])->name('pupils_registration.create');
     Route::post('/pupils_registration/store', [PupilsController::class, 'store'])->name('pupils_registration.store');
     Route::get('/pupils_registration/show/{id}', [PupilsController::class, 'show'])->name('pupils_registration.show');
     Route::get('/pupils_registration/edit/{id}', [PupilsController::class, 'edit'])->name('pupils_registration.edit');
     Route::put('/pupils_registration/edit/{id}', [PupilsController::class, 'update'])->name('pupils_registration.update');
     Route::delete('/pupils_registration/destroy/{id}', [PupilsController::class, 'destroy'])->name('pupils_registration.destroy');

     // AddClassController Routes
    Route::get('/add_class', [AddClassController::class, 'index'])->name('add_class.index');
    Route::post('/add_class/store', [AddClassController::class, 'store'])->name('add_class.store'); 
    Route::get('/add_class/show/{id}', [AddClassController::class, 'show'])->name('add_class.show');

    // CreateClassController Routes
    Route::get('/create_class/index', [CreateClassController::class, 'index'])->name('create_class.index');
    Route::post('/create_class/store', [CreateClassController::class, 'store'])->name('create_class.store');
    Route::delete('/create_class/delete/{id}', [CreateClassController::class, 'delete'])->name('create_class.delete');

    //assign class
    Route::get('/assign_class/index', [AssignClassController::class, 'index'])->name('assign_class.index');
    Route::post('/assign_class/assign', [AssignClassController::class, 'assign'])->name('assign_class.assign');
    Route::get('/assign_class/pupil', [AssignClassController::class, 'pupil'])->name('assign_class.pupil');
    Route::get('/assign_class/destroy/{id}', [AssignClassController::class, 'destroy'])->name('assign_class.destroy');
    Route::post('/assign_class/addClass', [AssignClassController::class, 'addClass'])->name('assign_class.addClass');
    Route::get('/assign_class/delete/{id}', [AssignClassController::class, 'delete'])->name('assign_class.delete');
    Route::get('/assign_class/viewAssigned', [AssignClassController::class, 'viewAssigned'])->name('assign_class.viewAssignClass');


});


Route::middleware(['auth', 'teacher'])->group(function () {
    // Place teacher-only routes here
    Route::get('/assign_class/myclass', [AssignClassController::class, 'myclass'])->name('assign_class.MyClass');
    Route::get('/assign_class/addLesson/{id}', [AssignClassController::class, 'addLesson'])->name('assign_class.addLesson');
    Route::post('/assign_class/postLesson', [AssignClassController::class, 'postLesson'])->name('assign_class.postLesson');
    Route::get('/assign_class/deleteLesson/{id}', [AssignClassController::class, 'deleteLesson'])->name('assign_class.deleteLesson');
    Route::get('/assign_class/editLesson/{id}', [AssignClassController::class, 'editLesson'])->name('assign_class.editLesson');
    Route::put('/assign_class/updateLesson/{id}', [AssignClassController::class, 'updateLesson'])->name('assign_class.updateLesson');
    Route::get('/assign_class/viewAssignPupils/{class_id}', [AssignClassController::class, 'viewAssignPupils'])->name('assign_class.viewAssignPupils');

    //quiz
    Route::get('/quiz/quizIndex/{class_id}', [QuizController::class, 'index'])->name('quiz.quizIndex'); 
    Route::get('/quiz/create/{quizId}', [QuizQuestionController::class, 'create'])->name('quiz.question_create');
    Route::post('/quiz/store/{quizId}', [QuizQuestionController::class, 'store'])->name('quiz.question_store');
    Route::delete('/quiz/destroy/{questionId}', [QuizQuestionController::class, 'destroy'])->name('quiz.question_destroy');

    Route::get('/quizzes/{id}/edit', [QuizController::class, 'edit'])->name('quiz.quiz_edit');
    Route::put('/quizzes/{id}', [QuizController::class, 'update'])->name('quiz.update');


    
    Route::post('/quiz/store', [QuizController::class, 'store'])->name('quiz.store');
    Route::delete('/quiz/delete/{quizId}', [QuizController::class, 'delete'])->name('quiz.delete');
    Route::get('/quiz/{quizId}/question/{questionId}/edit', [QuizQuestionController::class, 'edit'])->name('quiz.question.edit');
    Route::put('/quiz/{quizId}/question/{questionId}', [QuizQuestionController::class, 'update'])->name('quiz.question.update');


    //rewards
    Route::get('/rewards/claimed-rewards', [RewardController::class, 'claimedRewards'])->name('rewards.claimed');
    Route::get('/rewards/reward', [RewardController::class, 'reward'])->name('rewards.reward');
    Route::get('/rewards/create', [RewardController::class, 'create'])->name('rewards.create');
    Route::post('/rewards/store', [RewardController::class, 'store'])->name('rewards.store');
    Route::get('/rewards/{reward}/edit', [RewardController::class, 'edit'])->name('rewards.edit');
    Route::put('/rewards/{reward}', [RewardController::class, 'update'])->name('rewards.update');
    Route::delete('/rewards/{reward}', [RewardController::class, 'destroy'])->name('rewards.destroy');
});



Route::middleware(['auth', 'pupil'])->group(function () {
    // Place pupil-only routes here
    Route::get('/assign_class/myclassPupils', [AssignClassController::class, 'myclassPupils'])->name('assign_class.myclassPupils');
    Route::get('/assign_class/mylessonPupils/{class_id}', [AssignClassController::class, 'mylessonPupils'])->name('assign_class.mylessonPupils');
    Route::get('/assign_class/viewQuizzes/{class_id}', [AssignClassController::class, 'viewQuizzes'])->name('assign_class.view_quizzes');

    Route::get('/quiz/quizShow/{id}', [QuizController::class, 'show'])->name('quiz.quizShow');
    Route::post('/quiz/quizSubmit/{quizId}', [QuizController::class, 'submit'])->name('quiz.submit');

    Route::get('/rewards/index', [RewardController::class, 'index'])->name('rewards.index');
    Route::post('/rewards/claim/{rewardId}', [RewardController::class, 'claim'])->name('rewards.claim');

    Route::get('/math-game', [MathGameController::class, 'index'])->name('math-game.index');
    Route::post('/math-game/submit', [MathGameController::class, 'submit'])->name('math-game.submit');
    Route::post('/math-game/transfer-points', [MathGameController::class, 'transferGamePointsToPoints'])->name('math-game.transfer-points');

});










//Teachers Dashboard
// Route::get('/teacherDashboard', 'TeacherDashboardController@index')->name('teacherDashboard');


Route::controller(TeachersController::class)->group(function () {
    Route::get('loginT','loginT')->name('loginT');
    Route::post('','loginActionT')->name('login_actionT');
});

Route::get('teacherDashboard', function () {
    return view('teacher_dashboard');
})->name('teacherDashboard');

Route::controller(TeacherDashboardController::class)->prefix('teacher_dashboard')->group(function () {
        Route::get('','index')->name('teacher_dashboard');
        Route::post('store','store')->name('teacher_dashboard.store');
});

Route::controller(ClassController::class)->prefix('teacher_dashboard')->group(function () {
    Route::get('class','class')->name('teacher_dashboard.class');
    Route::post('classStore','classStore')->name('teacher_dashboard.classStore');

    Route::get('pupil','pupil')->name('teacher_dashboard.pupil');
});













Route::middleware('auth')->group(function () {
    Route::get('teacherDashboard', function () {
        return view('teacher_dashboard');
    })->name('teacherDashboard'); 

    //route for teacher dashboard functions

});

// Route::controller(ClassController::class)->prefix('teacher_dashboard')->group(function () {
//         Route::get('class','class')->name('teacher_dashboard.class');
//         Route::post('classStore','classStore')->name('teacher_dashboard.classStore');
    
//         Route::get('pupil','pupil')->name('teacher_dashboard.pupil');
//     });


    // });



//Teachers Dashboard end


// pupil auth login start

Route::middleware('auth')->group(function () {
    Route::get('pupilDashboard', function () {
        return view('student_dashboard');
    })->name('student_dashboard'); 

 

    });

    // Route::get('/student_dashboard', function () {
    //     return view('student_dashboard');
    // });


    //sms routes

    route::get("/sendsms", [SmsController::class,'sendsms']);
    Route::get('/test-sms', [RewardController::class, 'testSmsFunctionality']);



    Route::get("/forget-password", [ForgetPasswordManager::class, "forgetPassword"])->name("forget.password");
    Route::post("/forget-password", [ForgetPasswordManager::class, "forgetPasswordPost"])->name("forget.password.post");
    Route::get("/reset-password/{token}", [ForgetPasswordManager::class, "resetPassword"])->name("reset.password");
    Route::post("/reset-password", [ForgetPasswordManager::class, "resetPasswordPost"])->name("reset.password.post");
