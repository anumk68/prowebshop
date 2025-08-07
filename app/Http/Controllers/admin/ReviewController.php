<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  public function index()
  {
      $reviews = Review::with('user')->get();
      return view('admin.review.list', compact('reviews'));
  }

  public function destroy($id)
{
    $review = Review::findOrFail($id);
    $review->delete();

    return redirect()->back()->with('success', 'Review Deleted successfully');
}

}
