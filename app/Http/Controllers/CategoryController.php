<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view("admin.Categories",compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'image' => 'required'
        ]);

        $img_name = time().'_'.$request->name.'.'.$request->image->extension();
        $request->image->move(public_path('images'),$img_name);

       $cat = Category::create([
           'name' => $request->name,
           'image' => $img_name
       ]);
        return redirect('admin/categories')->with('msg', 'Category has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->image){
            $img_name = time().'_'.$request->name.'.'.$request->image->extension();
            $request->image->move(public_path('images'),$img_name);
            $data = array(
                'name'=>$request->name,
                'image' => $img_name
            );
            }else{
                $data = array(
                    'name'=>$request->name,
                );
            }
            $cat = Category::find($id);
            $cat->update($data);
            return redirect()->back()->with('msg','Categroy has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect()->back()->with('msg','Categroy has been deleted successfully');
    }
}
