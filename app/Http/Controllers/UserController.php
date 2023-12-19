<?php

namespace App\Http\Controllers;
use App\Models\Categ;
use App\Models\Product;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
      $listuser= User::all();
      return view('User.index',['users' => $listuser]);
    }
    public function create()
    {
        return view('User.create');

    }
    public function store(Request $request)

    {
        $user = new User();
         $user->name = $request->input('name');
         $user->email = $request->input('email');
         $user->password = $request->input('password');
        $user->save();

        return redirect('users');
    }

    public function update(Request $request,$id)
    {

    }
    public function destroy(Request $request,$id)
    {
   $user = User::find($id);
   $user->delete();
   return redirect('users');
    }
    public function home(){
        $produits = Product::all();// recuperer les prod de la base
        $categories =Categ::all();// recuperer les categ de la base
    return view('user.home')->with('produits', $produits)->with('categories',$categories);
    }

    /////////////////////////////////
        public function productDetails($id)
    {
    $product = Product::find($id);
     $categories =Categ::all();// recuperer les categ de la base
        return view('user.detail')->with('categories',$categories)->with('produit',$product);
    }
    public function view($idcategory)
    {$category = Categ::find($idcategory);
     $products = $category->products;
     $categories =Categ::all();// recuperer les categ de la base
        return view('user.pro')->with('categories',$categories)->with('products',$products);
    }
    public function search(Request $request){
$products = Product::where('name' ,'LIKE' , '%' .$request->keywords .'%')->get();
$categories =Categ::all();// recuperer les categ de la base
return view('user.pro')->with('categories',$categories)->with('products',$products);
    }


    ///////////////////////////////////

}
