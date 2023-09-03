<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassAssignmentController;
use App\Http\Controllers\LearningController;
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
Route::middleware(['auth.login'])->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::get('/manage-users', [AuthController::class, 'ManageUsers'])->name('ManageUsers');
    Route::get('/user-profile/{user_id}', [AuthController::class, 'UserProfile'])->name('UserProfile');
    Route::get('/new-user', [AuthController::class, 'NewUser'])->name('NewUser');

    Route::post('/save-new-user', [AuthController::class, 'NewUserAction']);
    Route::post('/edit-user/{user_id}', [AuthController::class, 'EditUserAction']);
    Route::post('/delete-user/{user_id}', [AuthController::class, 'DeleteUserAction']);


    Route::get('/forum-detail/{forum_id}', [HomeController::class, 'ForumDetail'])->name('ForumDetail');
    Route::post('/save-forum-detail/{forum_id}', [HomeController::class, 'SaveForumDetailAction']);
    Route::post('/delete-forum/{forum_id}', [HomeController::class, 'DeleteForumAction']);

    Route::get('/new-forum', [HomeController::class, 'NewForum'])->name('NewForum');
    Route::get('/edit-forum/{forum_id}', [HomeController::class, 'EditForum'])->name('EditForum');
    Route::post('/save-new-forum', [HomeController::class, 'NewForumAction']);
    Route::post('/edit-forum/{forum_id}', [HomeController::class, 'EditForumAction']);

    Route::get('/learning-classes/{source}', [LearningController::class, 'LearningClasses'])->name('LearningClasses');
    Route::get('/manage-classes', [LearningController::class, 'ManageClasses'])->name('ManageClasses');
    Route::get('/new-class', [LearningController::class, 'NewClass'])->name('NewClass');
    Route::get('/edit-class/{class_code}', [LearningController::class, 'EditClass'])->name('EditClass');

    Route::post('/save-new-class', [LearningController::class, 'SaveNewClassAction']);
    Route::post('/delete-class/{class_code}', [LearningController::class, 'DeleteClassAction']);
    Route::post('/save-edit-class/{class_code}', [LearningController::class, 'SaveEditClassAction']);

    Route::get('/learning-materials/{class_code}', [LearningController::class, 'LearningMaterials'])->name('LearningMaterials');
    Route::get('/learning-materials-detail/{material_id}', [LearningController::class, 'LearningMaterialsDetail'])->name('learningMaterialsDetail');
    Route::post('/delete-learning-material/{material_id}', [LearningController::class, 'DeleteMaterialAction']);
    Route::post('/save-learning-material/{material_id}', [LearningController::class, 'SaveMaterialAction']);

    Route::get('/class-assignments/{class_code}/{type}', [ClassAssignmentController::class, 'ClassAssignmentsResult'])->name('ClassAssignmentsResult');
    Route::get('/class-assignments/{class_code}', [ClassAssignmentController::class, 'ClassAssignments'])->name('ClassAssignments');
    Route::get('/class-assignments-detail/{class_code}/{assignment_id}', [ClassAssignmentController::class, 'ClassAssignmentsDetail'])->name('ClassAssignmentsDetail');
    Route::get('/class-assignments-result/{class_code}/{assignment_id}', [ClassAssignmentController::class, 'ClassAssignmentsResultDetail'])->name('ClassAssignmentsResultDetail');
    Route::get('/export-assignment-result/{assignment_id}', [ClassAssignmentController::class, 'ExportResultAction']);

    Route::post('/save-class-assignment/{class_code}/{assignment_id}', [ClassAssignmentController::class, 'SaveClassAssignmentAction']);
    Route::post('/delete-class-assignment/{class_code}/{assignment_id}', [ClassAssignmentController::class, 'DeleteClassAssignmentAction']);

    Route::get('/upload-class-assignments/{class_code}/{assignment_id}', [ClassAssignmentController::class, 'UploadClassAssignments'])->name('UploadClassAssignments');
    Route::post('/upload-class-assignments/{class_code}/{assignment_id}', [ClassAssignmentController::class, 'UploadClassAssignmentsAction']);

    Route::get('/class-exercises/{class_code}/{type}', [ClassAssignmentController::class, 'ClassExercisesResult'])->name('ClassExercisesResult');
    Route::get('/class-exercises/{class_code}', [ClassAssignmentController::class, 'ClassExercises'])->name('ClassExercises');


    Route::post('/save-class-assignment-result/{class_code}/{assignment_id}/{answer_id}', [ClassAssignmentController::class, 'SaveClassAssignmentResultAction']);
});

Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
Route::post('/admin/login', [AuthController::class, 'loginAction']);

Route::get('/logout', [AuthController::class, 'logoutAction'])->name('logout');
