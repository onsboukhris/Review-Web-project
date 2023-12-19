<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ClientController extends Controller
{

    //fonction qui permet d'afficher le dashboard client
    public function dashboard(){
        return view('client.dashboard');
    }
    public function addReview(Request $request)
    {
        $review = new Review();
        $review->rate = $request->rate;
        $review->product_id = $request->product_id;
        $review->content = $request->content;
        $review->user_id = Auth::user()->id;
        $review->save();
        //return redirect()->back();



    }
}
