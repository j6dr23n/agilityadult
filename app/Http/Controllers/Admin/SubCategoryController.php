<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{    
    public function create($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        $categories = DB::table('categories')->oldest()->get();

        return view('backend.categories.sub_cat.create', compact('category','categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $poster = $request->file('poster');
        $fileName = $poster->getClientOriginalName();
        $poster->storeAs('/sub_cat/poster/', $fileName, 'public');
        $path = '/storage/sub_cat/poster/'.$fileName;
        $data['poster'] = $path;

        SubCategory::create($data);

        return redirect(route('categories.index'))->with('success', 'Sub Categories Created!!!');
    }

    public function edit(SubCategory $subCategory)
    {
        $categories = DB::table('categories')->oldest()->get();

        return view('backend.categories.sub_cat.edit', compact('categories', 'subCategory'));
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        $data = $request->all();
        if ($request->file('poster')) {
            $subCategory->poster = str_replace('/storage','',$subCategory->poster);
            Storage::disk('public')->delete($subCategory->poster);

            $poster = $request->file('poster');
            $fileName = $poster->getClientOriginalName();
            $poster->storeAs('/sub_cat/poster/', $fileName, 'public');
            $path = '/storage/sub_cat/poster/'.$fileName;
            $data['poster'] = $path;
        }
        $subCategory->fill($data)->save();

        return redirect(route('categories.index'))->with('success', 'Sub Categories Updated!!!');
    }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->poster = str_replace('/storage','',$subCategory->poster);
        Storage::disk('public')->delete($subCategory->poster);

        $subCategory->delete();

        return redirect(route('categories.index'))->with('success','Sub Category Deleted!!!');
    }
}
