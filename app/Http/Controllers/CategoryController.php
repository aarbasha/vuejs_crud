<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $Categorys = Category::paginate(5);
        return response()->json($Categorys);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // return request();
       $Category = new Category;
       $Category->name = $request->name;
       $Category->info = $request->info;
       $Category->save();
       return response()->json($Category);

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $Category = Category::find($id);
        return response()->json($Category);
    }


    public function update()
    {
        // return (request()->id);
        $Category = Category::find(request()->id);
        $Category->name = request()->name;
        $Category->info = request()->info;
        $Category->update();
        return response()->json($Category);
    }


    public function destroy($id)
    {
        $Category = Category::find($id)->delete();
        return response()->json($Category);
    }
}
