<?php

/* custom routes generated by CRUD */


Route::group(array('prefix' => 'admin/', 'middleware' => 'admin','as'=>'admin.'), function () {

Route::get('ctContacts', ['as'=> 'ctContacts.index', 'uses' => 'CtContactController@index']);
Route::post('ctContacts', ['as'=> 'ctContacts.store', 'uses' => 'CtContactController@store']);
Route::get('ctContacts/create', ['as'=> 'ctContacts.create', 'uses' => 'CtContactController@create']);
Route::put('ctContacts/{ctContacts}', ['as'=> 'ctContacts.update', 'uses' => 'CtContactController@update']);
Route::patch('ctContacts/{ctContacts}', ['as'=> 'ctContacts.update', 'uses' => 'CtContactController@update']);
Route::get('ctContacts/{id}/delete', array('as' => 'ctContacts.delete', 'uses' => 'CtContactController@getDelete'));
Route::get('ctContacts/{id}/confirm-delete', array('as' => 'ctContacts.confirm-delete', 'uses' => 'CtContactController@getModalDelete'));
Route::get('ctContacts/{ctContacts}', ['as'=> 'ctContacts.show', 'uses' => 'CtContactController@show']);
Route::get('ctContacts/{ctContacts}/edit', ['as'=> 'ctContacts.edit', 'uses' => 'CtContactController@edit']);

});


Route::group(array('prefix' => 'admin/', 'middleware' => 'admin','as'=>'admin.'), function () {

Route::get('ctStudents', ['as'=> 'ctStudents.index', 'uses' => 'CtStudentController@index']);
Route::post('ctStudents', ['as'=> 'ctStudents.store', 'uses' => 'CtStudentController@store']);
Route::get('ctStudents/create', ['as'=> 'ctStudents.create', 'uses' => 'CtStudentController@create']);
Route::put('ctStudents/{ctStudents}', ['as'=> 'ctStudents.update', 'uses' => 'CtStudentController@update']);
Route::patch('ctStudents/{ctStudents}', ['as'=> 'ctStudents.update', 'uses' => 'CtStudentController@update']);
Route::get('ctStudents/{id}/delete', array('as' => 'ctStudents.delete', 'uses' => 'CtStudentController@getDelete'));
Route::get('ctStudents/{id}/confirm-delete', array('as' => 'ctStudents.confirm-delete', 'uses' => 'CtStudentController@getModalDelete'));
Route::get('ctStudents/{ctStudents}', ['as'=> 'ctStudents.show', 'uses' => 'CtStudentController@show']);
Route::get('ctStudents/{ctStudents}/edit', ['as'=> 'ctStudents.edit', 'uses' => 'CtStudentController@edit']);

});


Route::group(array('prefix' => 'admin/', 'middleware' => 'admin','as'=>'admin.'), function () {

Route::get('ctFaculties', ['as'=> 'ctFaculties.index', 'uses' => 'CtFacultyController@index']);
Route::post('ctFaculties', ['as'=> 'ctFaculties.store', 'uses' => 'CtFacultyController@store']);
Route::get('ctFaculties/create', ['as'=> 'ctFaculties.create', 'uses' => 'CtFacultyController@create']);
Route::put('ctFaculties/{ctFaculties}', ['as'=> 'ctFaculties.update', 'uses' => 'CtFacultyController@update']);
Route::patch('ctFaculties/{ctFaculties}', ['as'=> 'ctFaculties.update', 'uses' => 'CtFacultyController@update']);
Route::get('ctFaculties/{id}/delete', array('as' => 'ctFaculties.delete', 'uses' => 'CtFacultyController@getDelete'));
Route::get('ctFaculties/{id}/confirm-delete', array('as' => 'ctFaculties.confirm-delete', 'uses' => 'CtFacultyController@getModalDelete'));
Route::get('ctFaculties/{ctFaculties}', ['as'=> 'ctFaculties.show', 'uses' => 'CtFacultyController@show']);
Route::get('ctFaculties/{ctFaculties}/edit', ['as'=> 'ctFaculties.edit', 'uses' => 'CtFacultyController@edit']);

});


Route::group(array('prefix' => 'admin/', 'middleware' => 'admin','as'=>'admin.'), function () {

Route::get('ctMajors', ['as'=> 'ctMajors.index', 'uses' => 'CtMajorController@index']);
Route::post('ctMajors', ['as'=> 'ctMajors.store', 'uses' => 'CtMajorController@store']);
Route::get('ctMajors/create', ['as'=> 'ctMajors.create', 'uses' => 'CtMajorController@create']);
Route::put('ctMajors/{ctMajors}', ['as'=> 'ctMajors.update', 'uses' => 'CtMajorController@update']);
Route::patch('ctMajors/{ctMajors}', ['as'=> 'ctMajors.update', 'uses' => 'CtMajorController@update']);
Route::get('ctMajors/{id}/delete', array('as' => 'ctMajors.delete', 'uses' => 'CtMajorController@getDelete'));
Route::get('ctMajors/{id}/confirm-delete', array('as' => 'ctMajors.confirm-delete', 'uses' => 'CtMajorController@getModalDelete'));
Route::get('ctMajors/{ctMajors}', ['as'=> 'ctMajors.show', 'uses' => 'CtMajorController@show']);
Route::get('ctMajors/{ctMajors}/edit', ['as'=> 'ctMajors.edit', 'uses' => 'CtMajorController@edit']);

});


Route::group(array('prefix' => 'admin/', 'middleware' => 'admin','as'=>'admin.'), function () {

Route::get('ctStudentMajors', ['as'=> 'ctStudentMajors.index', 'uses' => 'CtStudentMajorController@index']);
Route::post('ctStudentMajors', ['as'=> 'ctStudentMajors.store', 'uses' => 'CtStudentMajorController@store']);
Route::get('ctStudentMajors/create', ['as'=> 'ctStudentMajors.create', 'uses' => 'CtStudentMajorController@create']);
Route::put('ctStudentMajors/{ctStudentMajors}', ['as'=> 'ctStudentMajors.update', 'uses' => 'CtStudentMajorController@update']);
Route::patch('ctStudentMajors/{ctStudentMajors}', ['as'=> 'ctStudentMajors.update', 'uses' => 'CtStudentMajorController@update']);
Route::get('ctStudentMajors/{id}/delete', array('as' => 'ctStudentMajors.delete', 'uses' => 'CtStudentMajorController@getDelete'));
Route::get('ctStudentMajors/{id}/confirm-delete', array('as' => 'ctStudentMajors.confirm-delete', 'uses' => 'CtStudentMajorController@getModalDelete'));
Route::get('ctStudentMajors/{ctStudentMajors}', ['as'=> 'ctStudentMajors.show', 'uses' => 'CtStudentMajorController@show']);
Route::get('ctStudentMajors/{ctStudentMajors}/edit', ['as'=> 'ctStudentMajors.edit', 'uses' => 'CtStudentMajorController@edit']);

});
