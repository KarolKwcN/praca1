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



Route::get('/home', 'HomeController@index')->name('home');

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


Route::get('/admin_naprawyy/{slugi}', [
    'uses' => 'Admin\AdminController@getAdminNaprawyModelPage',
    'as' => 'admin.admin_naprawy_model',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('dodaj_model', [
    'uses' => 'Admin\AdminController@dodaj_model',
    'as' => 'admin.dodaj_model',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('edytuj_model', [
    'uses' => 'Admin\AdminController@edytuj_model',
    'as' => 'admin.edytuj_model',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('delete_device', [
    'uses' => 'Admin\AdminController@delete_device',
    'as' => 'admin.delete_device',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

//wiaodmosci


Route::get('/wiadomosci', 'MessageController@index')->name('messages')->middleware('verified');


Route::get('/nowawiadomosc', function(){
    return view('newmessages');
})->middleware('verified');

Route::get('/nowawiadomosc','MessageController@newMessage')->middleware('verified');

Route::get('/getMessages', function(){
  

    $allUsers1 = App\User::with('roles')
    ->Join('conversation','users.id','conversation.user_one')
    ->where('conversation.user_two',Auth::user()->id)->get();
    //return $allUsers1;

    $allUsers2 =  App\User::with('roles')
    ->Join('conversation','users.id','conversation.user_two')
    ->where('conversation.user_one',Auth::user()->id)->get();
    return array_merge($allUsers1->toArray(), $allUsers2->toArray());
})->middleware('verified');

Route::get('/getMessages/{id}', function($id){
    /*$checkCon = DB::table('conversation')->where('user_one', Auth::user()->id)
    ->where('user_two', $id)->get();
    if(count($checkCon)!=0){
        //echo $checkCon[0]->id;
        $userMsg = DB::table('messages')->where('messages.conversation_id', $checkCon[0]->id)->get();
        return $userMsg;
    }else{
        echo "no messages";
    }*/

    $userMsg = DB::table('messages')
    ->join('users','users.id','messages.user_from')
    ->where('messages.conversation_id', $id)->get();
        return $userMsg;

})->middleware('verified');

Route::post('/sendMessage', 'MessageController@sendMessage')->middleware('verified');
Route::post('sendNewMessage', 'MessageController@sendNewMessage');

Route::get('/naprawy', function(){
        $categories = App\Category::all();
    	return view('naprawy.naprawy', ['categories' => $categories]);
});

Route::get('/naprawy/{slug}', function($slug){
        
  $category = App\Category::where('slug', $slug)->first();
  $brands = App\Brand::where('category_id', $category->id)->paginate(10);
  
  return view('naprawy.naprawy_marka', compact('brands','category'));

});

Route::get('/naprawyy/{slugi}', function($slugi){
        
    $brand = App\Brand::where('slugi', $slugi)->first();
    $category = App\Category::where('id',$brand->category_id)->first();
    $devices = App\Device::where('brand_id', $brand->id)->paginate(10);
    return view('naprawy.naprawy_model', compact('devices','brand','category'));
  
  });
  
  Route::get('serwisant', [
    'uses' => 'SerwisantController@index',
    'as' => 'serwisant.serwisant',
    'middleware' => 'roles',
    'roles' => ['Serwisant']
]);
