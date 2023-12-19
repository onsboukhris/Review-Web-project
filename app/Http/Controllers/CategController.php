<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Categ;

class CategController extends Controller
{
    public function index()
    {
      $listcateg = Categ::all();  //recuperer les categ de la base
      return view('Categ.index',['categs' => $listcateg]);
    }
    public function create()
    {
        return view('Categ.create');

    }
    public function store(Request $request)

    {
        $categ = new Categ();
        $categ->name = $request->input('name');
        $categ->save();
        return redirect('categs');
    }
    public function edit($id)
    {
     $categ = Categ::find($id);
     return view('categ.edit',['categ' => $categ]);
    }
    public function update(Request $request,$id)
    {
    $categ = Categ::find($id);
    $categ->name =$request->input('name');
    $categ->save();
    return redirect('categs');
    }
    public function destroy(Request $request,$id)
    {
   $categ = Categ::find($id);
   $categ->delete();
   return redirect('categs');
    }


}
