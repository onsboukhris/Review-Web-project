<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Product;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
      $listreview = Review::all();
      return view('review.index',['reviews' => $listreview]);
    }

    public function create()
    {
        return view('reviews.create');
    }
    public function addReview(Request $request)
    {


        $review = new Review();
        $review->rate = $request->rate;
        $review->product_id = $request->product_id;
        $review->content = $request->content;
        $review->user_id = Auth::user()->id;
        $review->save();
        return redirect()->back();


    }
    public function destroy(Request $request,$id)
    {
        $review = Review::find($id);
        $review->delete();
        return redirect('reviews');

    }
   /* public function getProductRating($id) {
        $averageRating = DB::table('reviews')
                            ->where('product_id', $id)
                            ->avg('rating');

        //return $averageRating;
        view('review.getProductRating',['averageRating' => $averageRating]);
    }
*/
}
