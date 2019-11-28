<?php

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

Route::get('/', [ 'as' => 'login', 'uses' => 'LoginController@getLogin']);
Route::get('/login',['as'=>'login','uses'=>'LoginController@getLogin']);

Route::post('/login', [ 'as' => 'login', 'uses' => 'LoginController@postLogin']);


    Route::get('dashboard/noPermission',function(){
        return view('noPermission');
    });

Route::group(['middleware'=>['authen']],function(){
    Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@dashboard']);
    Route::get('/logout','LoginController@getLogout');
    });


    Route::group(['middleware'=>['authen','roles'],
    'roles' => ['Admin']],function(){

    ///MANAGE STUDENT FOR ADMIN!!!///////
    Route::get('/manage/student/',['as'=>'getStudent','uses'=>
            'StudentController@getStudent']);
    Route::get('/manage/student/create',['as'=>'createStudent','uses'=>
        'StudentController@createStudent']);
    Route::get('/findSectionName',['as'=>'findSectionName','uses'=>
        'StudentController@findSectionName']);
    Route::post('/manage/student/store',['as'=>'storeStudent','uses'=>
        'StudentController@storeStudent']);
    Route::get('/manage/student/{student}',['as'=>'studentProfile','uses'=>
        'StudentController@studentProfile']);
    Route::get('/manage/student/{student}/edit',['as'=>'studentEdit','uses'=>
        'StudentController@studentEdit']);
    Route::patch('/manage/student/{student}',['as'=>'studentUpdate','uses'=>
        'StudentController@studentUpdate']);
    Route::delete('/manage/student/{student}',['as'=>'deleteStudent','uses'=>
        'StudentController@deleteStudent']);


    ////MANAGE TEACHER FOR ADMIN
    Route::get('/manage/teacher/',['as'=>'getTeacher','uses'=>
            'TeacherController@getTeacher']);
    Route::get('/manage/teacher/create',['as'=>'createTeacher','uses'=>
            'TeacherController@createTeacher']);
    Route::post('/manage/teacher/store',['as'=>'storeTeacher','uses'=>
            'TeacherController@storeTeacher']);
    Route::get('/manage/teacher/{teacher}',['as'=>'showTeacher','uses'=>
            'TeacherController@showTeacher']);
    Route::get('/manage/teacher/{teacher}/edit',['as'=>'editTeacher','uses'=>
            'TeacherController@editTeacher']);
    Route::patch('/manage/teacher/{teacher}',['as'=>'updateTeacher','uses'=>
            'TeacherController@updateTeacher']);
    Route::DELETE('/manage/teacher/{teacher}',['as'=>'deleteTeacher','uses'=>
             'TeacherController@deleteTeacher']);

    ///// Manage Class for Admins
    Route::get('/manage/class/',['as'=>'getClass','uses'=>
            'ClassController@getClass']);
    Route::get('/manage/class/create',['as'=>'createClass','uses'=>
            'ClassController@createClass']);
    Route::post('/manage/class/store',['as'=>'storeClass','uses'=>
            'ClassController@storeClass']);
    Route::get('/manage/class/{iclass}/edit',['as'=>'editClass','uses'=>
            'ClassController@editClass']);
    Route::patch('/manage/class/{iclass}',['as'=>'updateClass','uses'=>
            'ClassController@updateClass']);
    Route::delete('/manage/class/{iclass}',['as'=>'deleteClass','uses'=>
            'ClassController@deleteClass']);

    //// Manage Section by Admin
    Route::get('/manage/section',['as'=>'getSection','uses'=>
            'SectionController@getSection']);
    Route::get('/manage/section/create',['as'=>'createSection','uses'=>
            'SectionController@createSection']);
    Route::post('/manage/section/store',['as'=>'storeSection','uses'=>
            'SectionController@storeSection']);
    Route::get('/manage/section/{section}/edit',['as'=>'editSection','uses'=>
            'SectionController@editSection']);
    Route::patch('/manage/section/{section}',['as'=>'updateSection','uses'=>
            'SectionController@updateSection']);
    Route::delete('/manage/section/{section}',['as'=>'deleteSection','uses'=>
            'SectionController@deleteSection']);

    //// Manage Subject by Admin
    Route::get('/manage/subject',['as'=>'getSubject','uses'=>
            'SubjectController@getSubject']);
    Route::get('/manage/subject/create',['as'=>'createSubject','uses'=>
            'SubjectController@createSubject']);
    Route::post('/manage/subject/store',['as'=>'storeSubject','uses'=>
            'SubjectController@storeSubject']);
    Route::get('/manage/subject/{subject}/edit',['as'=>'editSubject','uses'=>
            'SubjectController@editSubject']);
    Route::patch('/manage/subject/{subject}',['as'=>'updateSubject','uses'=>
            'SubjectController@updateSubject']);
    Route::delete('/manage/subject/{subject}',['as'=>'deleteSubject','uses'=>
            'SubjectController@deleteSubject']);


    ///// timeTable manage by admin//////
    Route::get('/manage/timetable',['as'=>'getTimeTable','uses'=>
            'TimeTableController@getTimeTable']);
    Route::get('/manage/timetable/create',['as'=>'createTimeTable','uses'=>
            'TimeTableController@createTimeTable']);
//    Route::post('/manage/timetable/store',['as'=>'storeTimeTable','uses'=>
//            'TimeTableController@storeTimeTable'])->name('TimeTable.store');
    Route::post('/manage/timetable/store', 'TimeTableController@storeTimeTable')->name('TimeTable.Store');

    Route::get('/manage/timetable/show-timetable',['as'=>'show-timetable','uses'=>
            'TimeTableController@showtimetable']);

        Route::get('/findSection',['as'=>'findSection','uses'=>
            'TimeTableController@findSection']);

        Route::get('/findTimetable',['as'=>'findTimetable','uses'=>
            'TimeTableController@findTimetable']);

    });
