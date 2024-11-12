<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\StockModel;
use App\Models\ShirtsModel;
use App\Models\DimensionsModel;

class StockController extends Controller
{
    /**
     * Edit the stock item.
     */
    public function edit(Request $request, int $id) {
        $item = StockModel::findOrFail($id);
        $shirts = ShirtsModel::get();
        $items = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });
        $dimensions = DimensionsModel::get();
        $attributes = $item->getAttributes();
        return view('stock/edit', ['item' => $attributes, 'items' => $items, 'size' => $dimensions]);
    }

    /**
     * Update the stock item.
     */
    public function update(Request $request, int $id) {
        $validatedData = $request->validate([
            'stock' => 'required|numeric',
            'size_id' => 'required|numeric',
            'shirt_id' => 'required|numeric',
        ]);

        $params = $request->all();
        $item = StockModel::findOrFail($id);
        $item->stock = $params['stock'];
        $item->size_id = $params['size_id'];
        $item->shirt_id = $params['shirt_id'];
        $item->save();
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Delete the stock item.
     */
    public function delete(int $id) {
        $item = StockModel::findOrFail($id);
        if ($item) {
            $item->delete();
        }
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Open the add stock form.
     */
    public function add() {
        $shirts = ShirtsModel::get();
        $items = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });
        $dimensions = DimensionsModel::get();

        return view('stock/add', ['items' => $items, 'size' => $dimensions]);
    }

    /**
     * Insert the country item.
     */
    public function insert(Request $request) {
        $validatedData = $request->validate([
            'stock' => 'required|numeric',
            'size_id' => 'required|numeric',
            'shirt_id' => 'required|numeric',
        ]);

        $params = $request->all();
        if (StockModel::where([['size_id', '=', $params['size_id']], ['shirt_id', '=', $params['shirt_id']]])->exists()) {
            return Redirect::back()->withErrors(['message' => 'Stock for this shirt and size already exists. Update the current data!!!']);
        }
        else {
            $item = StockModel::make();
            $item->stock = $params['stock'];
            $item->size_id = $params['size_id'];
            $item->shirt_id = $params['shirt_id'];
            $item->save();
        }
        return Redirect::to('dashboard/stock')->with('message','Operation Successful !');
    }
}
