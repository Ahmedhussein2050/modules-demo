<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Categories\Models\Category;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('Admin::admin-test')->with('categories', $categories);
    }
    public function create(Request $request){
        $category = Category::create($request->all());
        return response()->json($category);
    }
    public function edit($id){
        $category = Category::find($id);
        return response()->json($category);
    }
    public function update(Request $request, $id) {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->save();
        return Response()->json($category);
    }
    public function destroy($id) {
        $category = Category::destroy($id);
        return response()->json($category);
    }
}
