<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\ImagesModel;
use App\Models\ShirtsModel;

class ImagesController extends Controller
{
    /**
     * Edit the images item.
     */
    public function edit(Request $request, int $id) {
        $item = ImagesModel::findOrFail($id);
        $shirts = ShirtsModel::get();
        $items = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });
        $attributes = $item->getAttributes();
        return view('images/edit', ['item' => $attributes, 'items' => $items]);
    }

    /**
     * Update the images item.
     */
    public function update(Request $request, int $id) {
        $validatedData = $request->validate([
            'title' => 'required|string|min:4',
            'location' => 'required|string|min:4',
        ]);

        $params = $request->all();
        $item = ImagesModel::findOrFail($id);
        $item->title = $params['title'];
        $item->location = $params['location'];
        $item->shirt_id = $params['shirt_id'];
        $item->save();
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Delete the images item.
     */
    public function delete(int $id) {
        $item = ImagesModel::findOrFail($id);
        if ($item) {
            $item->delete();
        }
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Open the add images form.
     */
    public function add() {
        $shirts = ShirtsModel::get();
        $items = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });

        return view('images/add', ['items' => $items]);
    }

    /**
     * Insert the images item.
     */
    public function insert(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|min:4',
            'location' => 'required|string|min:4',
        ]);

        $params = $request->all();
        $item = ImagesModel::make();
        $item->title = $params['title'];
        $item->location = $params['location'];
        $item->shirt_id = $params['shirt_id'];
        $item->save();
        return Redirect::to('dashboard/images')->with('message','Operation Successful !');
    }
}
