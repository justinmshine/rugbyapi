<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\ScanModel;

class ScanController extends Controller
{
    /**
     * Edit the scan item.
     */
    public function edit(Request $request, int $id) {
        $item = ScanModel::findOrFail($id);
        $attributes = $item->getAttributes();
        return view('scan/edit', ['item' => $attributes]);
    }

    /**
     * Update the scan item.
     */
    public function update(Request $request, int $id) {
        $params = $request->all();
        $item = ScanModel::findOrFail($id);
        $item->bar_code = $params['bar_code'];
        $item->qr_code = $params['qr_code'];
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
}
