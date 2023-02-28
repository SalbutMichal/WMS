<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Str;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::with('category')->get();
        return view('dashboard.products.index', compact('products'));
    }
    public function create(){
        $categories = ProductCategory::get();
        return view('dashboard.products.create', compact('categories'));
    }
    public function store(Request $request){
        $form = $request->all();
        $form['slug'] = Str::slug($request->name);
        $product = Product::create($form);
        return view('dashboard.products.create');
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = ProductCategory::get();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        $form = $request->all();
        $form['slug'] = Str::slug($request->name);
        $product->name = $form['name'];
        $product->slug = $form['slug'];
        $product->ean = $form['ean'];
        $product->tax = $form['tax'];
        $product->price = $form['price'];
        $product->category_id = $form['category_id'];
        $product->save();

        return redirect()->back();
    }
}
