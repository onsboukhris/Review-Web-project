<?php

namespace App\Http\Controllers;
use App\Models\Categ;
use App\Models\Product;


use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->get();
        $categs = Categ:: with('products')->get();

        return view('product/index', compact('products','categs'));
    }
    public function create()
    {
        return view('product.create');

    }
    public function store(Request $request)
    {
    $product = new Product();
    $product->name = $request->input('name');
    $product->adresse = $request->input('adresse');
    $product->pays = $request->input('pays');
    $product->ville = $request->input('ville');
    $product->entreprise = $request->input('entreprise');
    $product->image= $request->input('image');
    $product->category_id = $request->input('categorie');
    if($request->hasfile('image')){
        $file =$request->file('image');
        $extension =$file->getClientOriginalExtension();// pour faire l'extension de mon fichier
        $filename = time() . '.' . $extension;
        $file->move('uploads/product/', $filename);
        $product->image = $filename;
    }else {
        return $request;
        $product->image = '';

    }
    $product->save();
   // return view('product')->with('product',$product);
    return redirect('products');
    }
    public function edit($id)
    {
     $product = Product::find($id);
     return view('product.edit',['product'=>$product]);
    }
    public function update(Request $request,$id)
    {
    $product = Product::find($id);
    $product->name =$request->input('name');
    $product->adresse = $request->input('adresse');
    $product->pays = $request->input('pays');
    $product->ville = $request->input('ville');
    $product->entreprise = $request->input('entreprise');
    $product->category_id = $request->input('categorie');

    $product->save();
    return redirect('products');

    }
    public function destroy(Request $request,$id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('products');
    }
}
