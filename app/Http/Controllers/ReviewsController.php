<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\ReviewsModel;

class ReviewsController extends Controller
{
    /**
     * Edit the reviews item.
     */
    public function edit(Request $request, int $id) {
        $item = ReviewsModel::findOrFail($id);
        $attributes = $item->getAttributes();
        return view('reviews/edit', ['item' => $attributes]);
    }

    /**
     * Update the reviews item.
     */
    public function update(Request $request, int $id) {
        $params = $request->all();
        $item = ReviewsModel::findOrFail($id);
        $item->rating = $params['rating'];
        $item->comment = $params['comment'];
        $item->added_at = $params['added_at'];
        $item->reviewer_name = $params['reviewer_name'];
        $item->reviewer_email = $params['reviewer_email'];
        $item->save();
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Delete the reviews item.
     */
    public function delete(int $id) {
        $item = ReviewsModel::findOrFail($id);
        if ($item) {
            $item->delete();
        }
        return Redirect::back()->with('message','Operation Successful !');
    }
}
