<?php

namespace App\Http\Controllers;

use App\Models\Categ;
use App\Models\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home()
    {
        $produits = Product::all();// recuperer les prod de la base
        $categories =Categ::all();// recuperer les categ de la base
    return view('guest.home')->with('produits', $produits)->with('categories',$categories);
    }

    public function productDetails($id)
    {
    $product = Product::find($id);
     $categories =Categ::all();// recuperer les categ de la base
        return view('guest.detail')->with('categories',$categories)->with('produit',$product);
    }
    public function view($idcategory)
    {$category = Categ::find($idcategory);
     $products = $category->products;
     $categories =Categ::all();// recuperer les categ de la base
        return view('guest.pro')->with('categories',$categories)->with('products',$products);
    }
    public function search(Request $request){
$products = Product::where('name' ,'LIKE' , '%' .$request->keywords .'%')->get();
$categories =Categ::all();// recuperer les categ de la base
return view('guest.pro')->with('categories',$categories)->with('products',$products);
    }
}
