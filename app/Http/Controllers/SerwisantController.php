<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;
use App\Role;
use App\Category;
use App\Brand;
use App\Device;
use DB;
class SerwisantController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	return view('serwisant.serwisant', ['users' => $users]);
    }
}
