<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'userId' => 'exists:user,id',
            'productId' => 'exists:products,id',
            'score' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $review = new Reviews();
        $review->productId = $request->productId;
        $review->score = $request->score;
        $review->comment = $request->comment;
        $review->userId = Auth::user()->id; // Assuming the user is logged in
        $review->save();

        return redirect()->back()->with('success', 'Reseña guardada exitosamente.');
    }

    public function destroy(Request $request, String $id)
    {
        if ($request->isMethod('delete')) {
            Reviews::find($id)->delete();
        } else {
            abort('404');
        }
    }

    public function edit(Request $request, Reviews $review) {
        if ($request->isMethod('put')) {
            $request->validate([
                'userId' => 'exists:user,id',
                'productId' => 'exists:products,id',
                'score' => 'required|integer|min:1|max:5',
                'comment' => 'required|string',
            ]);
            
            $review->update([$request->score, $request->comment]);
            return redirect()->route('product.reviews', ['id' => $review->productId, 'reviewId' => $review->id])->with('success', 'Se ha actualizado la reseña correctamente.');
        } else {
            abort('404');
        }
    }
}
