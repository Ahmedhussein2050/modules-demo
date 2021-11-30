<?php

namespace App\Modules\Categories\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Categories\Models\Category;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('Categories::test', compact('categories'));
    }
}
