<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\ReviewsModel;
use App\Models\ShirtsModel;

class ReviewsController extends Controller
{
    /**
     * Edit the reviews item.
     */
    public function edit(Request $request, int $id) {
        $item = ReviewsModel::findOrFail($id);
        $shirts = ShirtsModel::get();
        $items = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });
        $attributes = $item->getAttributes();
        return view('reviews/edit', ['item' => $attributes, 'items' => $items]);
    }

    /**
     * Update the reviews item.
     */
    public function update(Request $request, int $id) {
        $validatedData = $request->validate([
            'rating' => 'required|numeric||gt:0|lt:11',
            'comment' => 'required|string|min:4',
            'added_at' => 'date',
            'reviewer_name' => 'required|string|min:4',
            'reviewer_email' => 'required|email|string|min:4',
        ]);

        $params = $request->all();
        $item = ReviewsModel::findOrFail($id);
        $item->rating = $params['rating'];
        $item->comment = $params['comment'];
        $item->added_at = $params['added_at'];
        $item->reviewer_name = $params['reviewer_name'];
        $item->reviewer_email = $params['reviewer_email'];
        $item->shirt_id = $params['shirt_id'];
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

    /**
     * Open the add reviews form.
     */
    public function add() {
        $shirts = ShirtsModel::get();
        $items = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });

        return view('reviews/add', ['items' => $items]);
    }

    /**
     * Insert the reviewss item.
     */
    public function insert(Request $request) {
        $validatedData = $request->validate([
            'rating' => 'required|numeric||gt:0|lt:11',
            'comment' => 'required|string|min:4',
            'added_at' => 'date',
            'reviewer_name' => 'required|string|min:4',
            'reviewer_email' => 'required|email|string|min:4',
        ]);

        $params = $request->all();
        $item = ReviewsModel::make();
        $item->rating = $params['rating'];
        $item->comment = $params['comment'];
        $item->added_at = $params['added_at'];
        $item->reviewer_name = $params['reviewer_name'];
        $item->reviewer_email = $params['reviewer_email'];
        $item->shirt_id = $params['shirt_id'];
        $item->save();
        return Redirect::to('dashboard/reviews')->with('message','Operation Successful !');
    }
}
