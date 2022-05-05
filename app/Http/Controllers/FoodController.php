<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;


class FoodController extends Controller
{
    public function index()
    {
        $data = Menu::all();
        return response()->json($data);
    }

    public function breakfast(){
        $breakfast = Category::where('name','=','breakfast')->first();
        $breakfastFoods=Menu::where('category_id','=',$breakfast->id)->get();
        return response()->json($breakfastFoods);
    }
    public function lunch(){
        $lunch = Category::where('name','=','lunch')->first();
        $lunchFoods=Menu::where('category_id','=',$lunch->id)->get();
        return response()->json($lunchFoods);
    }
    public function dinner(){
        $dinner = Category::where('name','=','dinner')->first();
        $dinnerFoods=Menu::where('category_id','=',$dinner->id)->get();
        return response()->json($dinnerFoods);
    }

    public function getCategories(){
        $cat=Category::all();
        return response()->json($cat);
    }
    public function filterMenu($id){
        $items=Menu::where('category_id','=',$id)->get();
        return response()->json($items);
    }
}
