<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $users=User::all();
        $menu=Menu::all();
        return view("admin.dashboard",compact('users','menu'));
    }
    public function setAdmin($id){
        $user = DB::table('users')
              ->where('id', $id)
              ->update(['isAdmin' => true]);
        return redirect('admin/dashboard')->with('msg', 'user has been admin');
    }
}
