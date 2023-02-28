<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Str;

class CategoriesController extends Controller
{
    public function index(){
        $categories = ProductCategory::get();
        return view('dashboard.categories.index', compact('categories'));
    }
    public function create(){
        return view('dashboard.categories.create');
    }
    public function store(Request $request){
        $form = $request->all();
        $form['slug'] = Str::slug($request->name);
        ProductCategory::create($form);
        return redirect()->back();
        // $categories = ProductCategory::get();
        // return view('dashboard.categories.index', compact('categories'));
    }
}
