<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Category;
use DB;

class AdminController extends Controller
{
    public function getAdminPage()
    {
    	$users = User::all();
    	return view('admin.admin', ['users' => $users]);
    }

    //dodawanie rol
    public function postAdminAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_user']) {
            $user->roles()->attach(Role::where('name', 'User')->first());
        }
        if ($request['role_serwisant']) {
            $user->roles()->attach(Role::where('name', 'Serwisant')->first());
        }
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }
        return redirect()->back();
    }

    //usuwanie uÅ¼ytkownika przez admina
  public static function destroy(Request $request){
    $user = User::where('id', $request['id'])->firstOrFail();
    $user->delete();

    //usuwanie roli usunietego uzytkownika
    DB::table('user_role')->where('user_id', '=', $request['id'])->delete();

    return redirect()->back();
  }

//banowanie
  public static function ban(Request $request){
    $user = User::where('id', $request['id'])->firstOrFail();
    //dodawanie 14 dni bana
    $timestamp = strtotime("+14 Days");
    $datum = date("Y-m-d H:i:s",$timestamp);
    
    $user->banned_until=$datum;
    $user->save();

    

    return redirect()->back();
  }

  public static function odbanuj(Request $request){
    $user = User::where('id', $request['id'])->firstOrFail();
    //dodawanie 14 dni bana
    
    
    $user->banned_until=null;
    $user->save();

    

    return redirect()->back();
  }

  public function getAdminNaprawyPage()
  {
    $categories = Category::all();
    return view('admin.admin_naprawy', ['categories' => $categories]);
  }

    }
