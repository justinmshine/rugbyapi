<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\ScanModel;
use App\Models\ShirtsModel;

class ScanController extends Controller
{
    /**
     * Edit the scan item.
     */
    public function edit(Request $request, int $id) {
        $item = ScanModel::findOrFail($id);
        $shirts = ShirtsModel::get();
        $items = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });
        $attributes = $item->getAttributes();
        return view('scan/edit', ['item' => $attributes, 'items' => $items]);
    }

    /**
     * Update the scan item.
     */
    public function update(Request $request, int $id) {
        $validatedData = $request->validate([
            'bar_code' => 'required|string|min:4',
            'qr_code' => 'required|string|min:4',
        ]);

        $params = $request->all();
        $item = ScanModel::findOrFail($id);
        $item->bar_code = $params['bar_code'];
        $item->qr_code = $params['qr_code'];
        $item->shirt_id = $params['shirt_id'];
        $item->save();
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Delete the scan item.
     */
    public function delete(int $id) {
        $item = ScanModel::findOrFail($id);
        if ($item) {
            $item->delete();
        }
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Open the add scan form.
     */
    public function add() {
        $shirts = ShirtsModel::get();
        $items = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });

        return view('scan/add', ['items' => $items]);
    }

    /**
     * Insert the scan item.
     */
    public function insert(Request $request) {
        $validatedData = $request->validate([
            'bar_code' => 'required|string|min:4',
            'qr_code' => 'required|string|min:4',
        ]);

        $params = $request->all();
        $item = ScanModel::make();
        $item->bar_code = $params['bar_code'];
        $item->qr_code = $params['qr_code'];
        $item->shirt_id = $params['shirt_id'];
        $item->save();
        return Redirect::to('dashboard/scan')->with('message','Operation Successful !');
    }
}
