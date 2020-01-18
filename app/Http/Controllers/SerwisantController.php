<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;
use App\Role;
use App\Category;
use App\Brand;
use App\Device;
use App\Repair;
use DB;
class SerwisantController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->paginate(10);
    return view('serwisant.serwisant', ['categories' => $categories]);
  
    }

    public function getSerwisantNaprawyMarkaPage($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $brands = Brand::where('category_id', $category->id)->paginate(10);
        return view('serwisant.serwisant_naprawy_marka', compact('brands','category'));
    }

    public function getSerwisantNaprawyModelPage($slugi)
    {
        $brand = Brand::where('slugi', $slugi)->first();
        $category = Category::where('id',$brand->category_id)->first();
        $devices = Device::where('brand_id', $brand->id)->paginate(10);
        return view('serwisant.serwisant_naprawy_model', compact('devices','brand','category'));
    }

    public function getSerwisantUrzadzenie($slugii)
    {

        $device = Device::where('slugii', $slugii)->first();
        $brand = Brand::where('id',$device->brand_id)->first();
        $category = Category::where('id', $brand->category_id)->first();

    
        return view('serwisant.serwisant_urzadzenie', compact('device','brand','category'));
    }

    public function getSerwisantTworzenieNaprawy(Request $request, $slugii)
    {
        $device = Device::where('slugii', $slugii)->first();

        return view('serwisant.serwisant_tworzenie_naprawy', compact('device'));
    }

    public function postSerwisantTworzenieNaprawy(Request $request, $slugii)
    {

        $device = Device::where('slugii', $slugii)->first();
        $validatedData = $request->validate([
            'name' => 'required|unique:repairs',
            'description' => 'required',
            'zdj' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);


        $image = $request->file('zdj');

     $new_name = rand() . '.' . $image->getClientOriginalExtension();

     $image->move(public_path('images'), $new_name);
     //return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
    

        if(empty($request->session()->get('repair'))){
            $repair = new Repair();
            $repair->fill($validatedData);
            $request->session()->put('repair', $repair);
        }else{
            $repair = $request->session()->get('repair');
            $repair->fill($validatedData);
            $request->session()->put('repair', $repair);
        }



       
        return redirect('/sserwisant/nowa_naprawa_2');
      
      //  return redirect()->guest(route('serwisant.serwisant_tworzenie_naprawy2'));

        //return view('serwisant.serwisant_tworzenie_naprawy', compact('device'));
    }

    public function getSerwisantTworzenieNaprawy2(Request $request)
    {
        $repair = $request->session()->get('repair');
        return view('serwisant.serwisant_tworzenie_naprawy2',compact('repair', $repair));
        
    }

}