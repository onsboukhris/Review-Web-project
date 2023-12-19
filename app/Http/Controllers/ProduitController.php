<?php

namespace App\Http\Controllers;
use App\Models\Produit;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
   public function index()
   {
    return view('produit');
   }
   public function store(Request $request)
   {
    $produit = new Produit();
    $produit->name = $request->input('name');
    $produit->adresse = $request->input('adresse');
    $produit->pays = $request->input('pays');
    $produit->ville = $request->input('ville');
    $produit->entreprise = $request->input('entreprise');
    $produit->image= $request->input('image');
    $produit->category_id = $request->input('categorie');
    if($request->hasfile('image')){
        $file =$request->file('image');
        $extension =$file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/produit/', $filename);
        $produit->image = $filename;
    }else {
        return $request;
        $produit->image = '';

    }
    $produit->save();
    return view('produit')->with('produit',$produit);
   }

}
