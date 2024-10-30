<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\DimensionsModel;

class DimensionsController extends Controller
{
    /**
     * Edit the dimensions item.
     */
    public function edit(Request $request, int $id) {
        $item = DimensionsModel::findOrFail($id);
        $attributes = $item->getAttributes();
        return view('dimensions/edit', ['item' => $attributes]);
    }

    /**
     * Update the dimensions item.
     */
    public function update(Request $request, int $id) {
        $params = $request->all();
        $item = DimensionsModel::findOrFail($id);
        $item->type = $params['type'];
        $item->waste = $params['waste'];
        $item->length = $params['length'];
        $item->chest = $params['chest'];
        $item->save();
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Delete the dimensions item.
     */
    public function delete(int $id) {
        $item = DimensionsModel::findOrFail($id);
        if ($item) {
            $item->delete();
        }
        return Redirect::back()->with('message','Operation Successful !');
    }
}
