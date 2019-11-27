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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('admin', [
    'uses' => 'Admin\AdminController@getAdminPage',
    'as' => 'admin.admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);


Route::post('assign_roles', [
    'uses' => 'Admin\AdminController@postAdminAssignRoles',
    'as' => 'admin.assign.change',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('destroy_user', [
    'uses' => 'Admin\AdminController@destroy',
    'as' => 'admin.user.destroy',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('ban_user', [
    'uses' => 'Admin\AdminController@ban',
    'as' => 'admin.user.ban',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('odbanuj', [
    'uses' => 'Admin\AdminController@odbanuj',
    'as' => 'admin.user.odbanuj',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('admin_naprawy', [
    'uses' => 'Admin\AdminController@getAdminNaprawyPage',
    'as' => 'admin.admin_naprawy',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);


Route::post('dodaj_kategorie', [
    'uses' => 'Admin\AdminController@dodaj_kategorie',
    'as' => 'admin.dodaj_kategorie',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('usun_kategorie', [
    'uses' => 'Admin\AdminController@usun_kategorie',
    'as' => 'admin.usun_kategorie',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('edytuj_kategorie', [
    'uses' => 'Admin\AdminController@edytuj_kategorie',
    'as' => 'admin.edytuj_kategorie',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('/admin_naprawy/{slug}', [
    'uses' => 'Admin\AdminController@getAdminNaprawyMarkaPage',
    'as' => 'admin.admin_naprawy_marka',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);


Route::post('dodaj_marke', [
    'uses' => 'Admin\AdminController@dodaj_marke',
    'as' => 'admin.dodaj_marke',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('edytuj_marke', [
    'uses' => 'Admin\AdminController@edytuj_marke',
    'as' => 'admin.edytuj_marke',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('delete_brand', [
    'uses' => 'Admin\AdminController@delete_brand',
    'as' => 'admin.delete_brand',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);