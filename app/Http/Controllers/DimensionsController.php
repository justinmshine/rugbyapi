<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\DimensionsModel;
use App\Models\ShirtsModel;

class DimensionsController extends Controller
{
    /**
     * Edit the dimensions item.
     */
    public function edit(Request $request, int $id) {
        $item = DimensionsModel::findOrFail($id);
        $shirts = ShirtsModel::get();
        $items = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });
        $attributes = $item->getAttributes();
        return view('dimensions/edit', ['item' => $attributes, 'items' => $items]);
    }

    /**
     * Update the dimensions item.
     */
    public function update(Request $request, int $id) {
        $validatedData = $request->validate([
            'type' => 'required|string|min:2',
            'waste' => 'required|integer',
            'length' => 'required|integer',
            'chest' => 'required|integer',
        ]);

        $params = $request->all();
        $item = DimensionsModel::findOrFail($id);
        $item->type = $params['type'];
        $item->waste = $params['waste'];
        $item->length = $params['length'];
        $item->chest = $params['chest'];
        $item->shirt_id = $params['shirt_id'];
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

    /**
     * Open the add dimensions form.
     */
    public function add() {
        $shirts = ShirtsModel::get();
        $items = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });

        return view('dimensions/add', ['items' => $items]);
    }

    /**
     * Insert the dimensions item.
     */
    public function insert(Request $request) {
        $validatedData = $request->validate([
            'type' => 'required|string|min:2',
            'waste' => 'required|integer',
            'length' => 'required|integer',
            'chest' => 'required|integer',
        ]);

        $params = $request->all();
        $item = DimensionsModel::make();
        $item->type = $params['type'];
        $item->waste = $params['waste'];
        $item->length = $params['length'];
        $item->chest = $params['chest'];
        $item->shirt_id = $params['shirt_id'];
        $item->save();
        return Redirect::to('dashboard/dimensions')->with('message','Operation Successful !');
    }
}
