<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Girl\StoreRequest;
use App\Http\Requests\Girl\UpdateRequest;
use App\Models\Girl;
use App\Services\GirlServices;

class GirlController extends Controller
{
    public function index()
    {
        $girls = Girl::latest()->paginate(12);

        return view('backend.girls.index', compact('girls'));
    }

    public function create()
    {
        return view('backend.girls.create');
    }

    public function store(StoreRequest $request, GirlServices $action)
    {
        $data = $request->validated();
        $action->store($data);

        return redirect(route('girls.index'))->with('success', 'Girl Created!!!');
    }

    public function edit(Girl $girl)
    {
        return view('backend.girls.edit', compact('girl'));
    }

    public function update(UpdateRequest $request, Girl $girl, GirlServices $action)
    {
        $data = $request->validated();
        $action->update($data, $girl);

        return redirect(route('girls.index'))->with('success', 'Girl Updated!!!');
    }

    public function destroy(Girl $girl)
    {
        $delete = $girl->delete();

        if ($delete) {
            return response()->json([
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => __("Couldn't Delete. Please Try Again!"),
            ], 500);
        }
    }
}
