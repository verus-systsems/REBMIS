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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('answers','AnswerController');
    Route::resource('districts','DistrictController');
    Route::resource('grades','GradeController');
    Route::resource('guardians','GuardianController');
    Route::resource('provinces','ProvinceController');
    Route::resource('quizzes','QuizController');
    Route::resource('results','ResultController');
    Route::resource('schools','SchoolController');
    Route::resource('sectors','SectorController');
    Route::resource('standards','StandardController');
    Route::resource('semesters','SemesterController');
    Route::resource('students','StudentController');
    Route::resource('subjects','SubjectController');
    Route::resource('teachers','TeacherController');
    Route::resource('topics','TopicController');
    Route::resource('units','UnitController');
    Route::resource('questions','QuestionController');
    Route::resource('questiondatabanks','QuestiondatabankController');
    Route::resource('studyfields','StudyfieldController');
    Route::resource('skills','SkillController');
    Route::resource('actionplans','ActionplanController');
    Route::resource('faqs','FaqController');
    Route::resource('contents','ContentController');
    Route::resource('videos','VideoController');
    Route::resource('documentcategories','DocumentcategoryController');
    Route::resource('documents','DocumentController');

    Route::get('resources/index', ['uses'=>'ResourceController@index', 'as'=> 'resources.index']);

    Route::get('resources/searchresources', ['uses'=>'ResourceController@searchresources', 'as'=> 'resources.searchresources']);

    Route::get('resources/view/{grade_id}/{subject_id}/{unit_id}/{question_id}', ['uses'=>'ResourceController@view', 'as'=> 'resources.view']);

    Route::get('resources/downloadquestion/{question_id}', ['uses'=>'ResourceController@downloadquestion', 'as'=> 'resources.downloadquestion']);

    Route::get('resources/downloads/{grade_id}/{subject_id}/{unit_id}', ['uses'=>'ResourceController@downloads', 'as'=> 'resources.downloads']);


    Route::get('reports/index', ['uses'=>'ReportController@index', 'as'=> 'reports.index']);

    Route::post('reports/searchstudentresults', ['uses'=>'ReportController@searchstudentresults', 'as'=> 'reports.searchstudentresults']);

    Route::post('reports/studentresults', ['uses'=>'ReportController@studentresults', 'as'=> 'reports.studentresults']);

    Route::get('reports/classroomsearch', ['uses'=>'ReportController@classroomsearch', 'as'=> 'reports.classroomsearch']);

    Route::post('reports/searchclassroom', ['uses'=>'ReportController@searchclassroom', 'as'=> 'reports.searchclassroom']);

    Route::post('reports/searchclassroomunit', ['uses'=>'ReportController@searchclassroomunit', 'as'=> 'reports.searchclassroomunit']);

    Route::get('sectors/getsectors/{district_id}', 'SectorController@getsectors')->name('sectors.getsectors');

    Route::get('sectors/getschools/{sector_id}', 'SectorController@getschools')->name('sectors.getschools');

    Route::get('sectors/districtsectors/{districtID}', 'SectorController@districtsectors')->name('sectors.districtsectors');

    Route::get('sectors/sectorschools/{sectorID}', 'SectorController@sectorschools')->name('sectors.sectorschools');


    Route::get('questions/getsubjects/{grade_id}', 'QuestionController@getsubjects')->name('questions.getsubjects');
    Route::get('questions/getunits/{subject_id}', 'QuestionController@getunits')->name('questions.getunits');
    Route::get('questions/gettopics/{unit_id}', 'QuestionController@gettopics')->name('questions.gettopics');
    Route::get('questions/getskills/{unit_id}', 'QuestionController@getskills')->name('questions.getskills');

    Route::get('actionplans/getsubjects/{grade_id}', 'ActionplanController@getsubjects')->name('actionplans.getsubjects');
    Route::get('actionplans/getunits/{subject_id}', 'ActionplanController@getunits')->name('actionplans.getunits');

    Route::post('questiondatabanks/export', ['uses'=>'QuestiondatabankController@export', 'as'=> 'questiondatabanks.export']);
});

