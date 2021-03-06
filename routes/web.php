<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'TimeSheetsController@showTimeSheets');
Route::get('/timesheets', 'TimeSheetsController@showTimeSheets');
Route::post('/getJsonData', 'TimeSheetsController@getJsonData');
Route::post('/getCalendarDate', 'TimeSheetsController@getCalendarDate');
Route::post('/getDataToSave', 'TimeSheetsController@getDataToSave');
Route::post('/addNewRecord', 'TimeSheetsController@addNewRecord');
Route::post('/deleteRecord', 'TimeSheetsController@deleteRecord');


//Route::get('/projects', 'ProjectController@showProjects')->middleware('plan:3'); // for checking user plan

Route::get('/projects', 'ProjectController@showProjects');
Route::get('/projects/add', 'ProjectController@addProject')->middleware('user_limit:projects');
Route::post('/projects/saveProject', 'ProjectController@saveProject');

Route::get('/projects/editProject/{id}', 'ProjectController@editProject');
Route::post('/projects/saveEditProject', 'ProjectController@saveEditProject');


Route::get('/admin/showUsers', 'Admin\AddNewUserController@showUsers');
Route::get('/admin/addUser', 'Admin\AddNewUserController@addUser')->middleware('user_limit:users');
Route::post('/admin/saveUser', 'Admin\AddNewUserController@saveUser');

Route::get('/admin/editUser/{id}', 'Admin\AddNewUserController@editUser');
Route::post('/admin/saveEditUser', 'Admin\AddNewUserController@saveEditUser');


Route::get('/admin/showDepartments', 'Admin\DepartmentController@showDepartments');
Route::get('/admin/addDepartments', 'Admin\DepartmentController@addDepartments');
Route::post('/admin/saveDepartments', 'Admin\DepartmentController@saveDepartments');

Route::get('/admin/editDepartment/{id}', 'Admin\DepartmentController@editDepartment');
Route::post('/admin/saveEditDepartment', 'Admin\DepartmentController@saveEditDepartment');

Route::get('/admin/showCategories', 'Admin\CategoryController@showCategories');
Route::get('/admin/addCategories', 'Admin\CategoryController@addCategories')->middleware('user_limit:categories');
Route::post('/admin/saveCategories', 'Admin\CategoryController@saveCategories');

Route::get('/admin/editCategory/{id}', 'Admin\CategoryController@editCategory');
Route::post('/admin/saveEditCategory', 'Admin\CategoryController@saveEditCategory');

Route::get('/admin/showClients', 'Admin\CustomerController@showClients');
Route::get('/admin/addClient', 'Admin\CustomerController@addClient')->middleware('user_limit:clients');
Route::post('/admin/saveClient', 'Admin\CustomerController@saveClient');

Route::get('/admin/editClient/{id}', 'Admin\CustomerController@editClient');
Route::post('/admin/saveEditClient', 'Admin\CustomerController@saveEditClient');


Route::get('/reports', 'Reports\ReportController@showReport');
Route::post('/showReportResult/{response_type}/{time_type}', 'Reports\ReportController@showReportResult');

Route::get('/admin/settings', 'Admin\CompanyController@showSettings');
Route::post('/admin/uploadLogo', 'Admin\CompanyController@uploadLogo');
Route::post('/admin/updateCompany', 'Admin\CompanyController@updateCompany');

Route::get('profile', 'Admin\AddNewUserController@profileInfo');
Route::post('updateProfile', 'Admin\AddNewUserController@updateProfile');


Route::post('/uploadUserPhoto', 'Admin\AddNewUserController@uploadUserPhoto');

Route::get('/ajaxGetUsers/{status}', 'Admin\AddNewUserController@ajaxGetUsers');
Route::get('/ajaxGetClients/{status}', 'Admin\CustomerController@ajaxGetClients');
Route::get('/ajaxGetProjects/{status}', 'ProjectController@ajaxGetProjects');

Route::get('/ajaxGetCity/{code}', 'Admin\AddNewUserController@ajaxGetCity');

Route::post('/ajaxSendEmail', 'SendMailController@sendMail');

Route::get('/invoice', 'Admin\InvoiceController@index');
Route::post('/ajaxGetProjects/{customer_id}', 'Admin\InvoiceController@ajaxGetProjects');
Route::post('/ajaxGetInvoice', 'Admin\InvoiceController@ajaxGetInvoice');
Route::post('/ajaxCreateInvoice', 'Admin\InvoiceController@ajaxCreateInvoice');

Route::get('/plan', function (){
    return view('plan.index');
});