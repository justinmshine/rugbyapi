<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\ImagesModel;

class ImagesController extends Controller
{
    /**
     * Edit the images item.
     */
    public function edit(Request $request, int $id) {
        $item = ImagesModel::findOrFail($id);
        $attributes = $item->getAttributes();
        return view('images/edit', ['item' => $attributes]);
    }

    /**
     * Update the images item.
     */
    public function update(Request $request, int $id) {
        $params = $request->all();
        $item = ImagesModel::findOrFail($id);
        $item->title = $params['title'];
        $item->location = $params['location'];
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
}
