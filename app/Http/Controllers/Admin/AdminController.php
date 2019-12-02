<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Category;
use App\Brand;
use App\Device;
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
    $categories = DB::table('categories')->paginate(10);
    return view('admin.admin_naprawy', ['categories' => $categories]);
  }

  //dodawanie kategorii
  public function dodaj_kategorie(Request $request)
  {
    $categories = New Category;
    $categories->name = $request->name;
    $categories->slug = str_slug($request->name);
    $categories->save();

    return redirect()->back();
  }

  //usuwanie kategorii
  public function usun_kategorie(Request $request)
  {
    $category = Category::where('id', $request['id'])->firstOrFail();
    $category->delete();


    return redirect()->back();
  }

  //edytuj kategorie
  public function edytuj_kategorie(Request $request)
  {


    $category = Category::where('id', $request['id'])->firstOrFail();
    $category->name = $request->name;
    $category->slug = str_slug($request->name);
    $category->update();


    return redirect()->back();
  }

  public function getAdminNaprawyMarkaPage($slug)
  {
    $category = Category::where('slug', $slug)->first();
    $brands = Brand::where('category_id', $category->id)->paginate(10);
    return view('admin.admin_naprawy_marka', compact('brands','category'));
  }


  public function dodaj_marke(Request $request)
  {
    $brands = New Brand;
    $brands->name = $request->name;
    $brands->description = $request->description;
    $brands->slugi = str_slug($request->name);
    $brands->category_id = $request['id'];
    $brands->save();
    

    return redirect()->back();
  }

  public function edytuj_marke(Request $request)
  {
    $brand = Brand::where('id', $request['id'])->firstOrFail();
    $brand->name = $request->name;
    $brand->description = $request->description;
    $brand->slugi = str_slug($request->name);
    $brand->update();


    return redirect()->back();
  }

  public function delete_brand(Request $request)
  {
    $brand = Brand::where('id', $request['id'])->firstOrFail();
    $brand->delete();

    return redirect()->back();
  }

  public function getAdminNaprawyModelPage($slugi)
  {
    $brand = Brand::where('slugi', $slugi)->first();
    $category = Category::where('id',$brand->category_id)->first();
    $devices = Device::where('brand_id', $brand->id)->paginate(10);
    return view('admin.admin_naprawy_model', compact('devices','brand','category'));
  }


  public function dodaj_model(Request $request)
  {
    $device = New Device;
    $device->name = $request->name;
    $device->description = $request->description;
    $device->slugii = str_slug($request->name);
    $device->brand_id = $request['id'];
    $device->save();
    

    return redirect()->back();
  }

  public function edytuj_model(Request $request)
  {
    $device = Device::where('id', $request['id'])->firstOrFail();
    $device->name = $request->name;
    $device->description = $request->description;
    $device->slugii = str_slug($request->name);
    $device->update();


    return redirect()->back();
  }

  public function delete_device(Request $request)
  {
    $device = Device::where('id', $request['id'])->firstOrFail();
    $device->delete();

    return redirect()->back();
  }



  }
