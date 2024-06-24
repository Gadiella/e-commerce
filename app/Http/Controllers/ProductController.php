<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("products.list",["products"=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $categories = Category::all();
        return view("products.create",[
            "categories"=> $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if ($request->hasFile("file")) {
            move_uploaded_file($_FILES['file']['tmp_name'], 'db/products/' . $_FILES['file']['name']);
            $product->file = $_FILES['file']['name'];
        } else {
            $product->file = '';
        }
        $product->save();

        return redirect()->route('product.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view("products.edit",[
            "product"=> $product,
            "categories"=> $categories
         ]);
    }
  


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if ($request->hasFile("file")) {
            move_uploaded_file($_FILES['file']['tmp_name'], 'db/products/' . $_FILES['file']['name']);
            $product->file = $_FILES['file']['name'];
        } else {
            $product->file = '';
        }
        $product->save();
        return redirect()->route("product.list")->with("success", "Produit modifiée avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with("success","produit supprimé");
    }
}
