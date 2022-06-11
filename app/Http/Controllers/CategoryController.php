<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->oldest()->paginate(20);

        return view('backend.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Category::create($data);

        return redirect(route('categories.index'))->with('success','Category Created!!!');
    }

    public function edit(Category $category)
    {
        return view('backend.categories.edit',compact('category'));
    }

    public function update(Request $request,Category $category)
    {
        $data = $request->all();

        $category->fill($data)->save();

        return redirect(route('categories.index'))->with('success','Category Updated!!!');
    }

    public function show($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        $sub_cat = DB::table('sub_categories')->where('category_id',$id)->latest()->paginate(15);

        return view('backend.categories.show',compact('category','sub_cat'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect(route('categories.index'))->with('success','Category Deleted!!!');
    }
}
