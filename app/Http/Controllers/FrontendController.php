<?php

namespace App\Http\Controllers;
use App\Models\Categ;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function categories()
    {

        return view('frontend.collections.category.index');
    }
}
