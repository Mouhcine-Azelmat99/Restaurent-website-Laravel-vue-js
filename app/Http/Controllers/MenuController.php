<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu=Menu::all();
        return view('admin.Menu',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.AddMenu',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:4|max:30',
            'desc' => 'required|min:10|max:200',
            'price' => 'required|numeric',
            'image' => 'required'
        ]);

        $img_name = time().'_'.$request->name.'.'.$request->image->extension();
        $request->image->move(public_path('images'),$img_name);
        $slug=Str::slug($request->name,'-');
       $item = Menu::create([
           'name' => $request->name,
           'slug' => $slug,
           'desc' => $request->desc,
           'price' => $request->price,
           'category_id' => $request->category_id,
           'image' => $img_name,
       ]);
        return redirect('admin/menu')->with('msg', 'Category has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user_id=Auth::user()->id;
        return view('showFood',compact('slug','user_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->image){
            $img_name = time().'_'.$request->name.'.'.$request->image->extension();
            $request->image->move(public_path('images'),$img_name);
            $data = array(
                'name'=>$request->name,
                'desc'=>$request->desc,
                'price'=>$request->price,
                'old_price'=>$request->old_price,
                'image' => $img_name
            );
            }else{
                $data = array(
                    'name'=>$request->name,
                    'desc'=>$request->desc,
                    'price'=>$request->price,
                    'old_price'=>$request->old_price,
                );
            }
            $item = Menu::find($id);
            $item->update($data);
            return redirect()->back()->with('msg','Item has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Menu::find($id);
        $item->delete();
        return redirect()->back()->with('msg','Record has been deleted successfully');
    }

    public function showItem($slug)
    {
        $item=Menu::where('slug','=',$slug)->first();
        return response()->json($item);
    }
}
