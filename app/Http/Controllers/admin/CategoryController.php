<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    //form add new category
    public function add()
    {
        return view('admin.category.addcategory');
    }

    //insert category
    public function insert(Request $request)
    {
        $category = new Category();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/upload/category', $filename);
            $category->img = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->save();

        return redirect('/dashboard')->with('status', 'add category success');
    }

    //edit-category
    public function edit($id)
    {
        //$category = new Category();
        $category = Category::find($id);
        return view('admin.category.editcategory', compact('category'));
    }

    public function update($id)
    {

    }
}
