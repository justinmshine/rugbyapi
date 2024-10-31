<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\CountryModel;

class CountryController extends Controller
{
    /**
     * Edit the country item.
     */
    public function edit(Request $request, int $id) {
        $item = CountryModel::findOrFail($id);
        $attributes = $item->getAttributes();
        return view('country/edit', ['item' => $attributes]);
    }

    /**
     * Update the country item.
     */
    public function update(Request $request, int $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3',
            'capital' => 'required|string|min:3',
            'iso' => 'required|string|min:2',
        ]);

        $params = $request->all();
        $item = CountryModel::findOrFail($id);
        $item->name = $params['name'];
        $item->capital_city = $params['capital'];
        $item->iso_code = $params['iso'];
        $item->save();
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Delete the country item.
     */
    public function delete(int $id) {
        $item = CountryModel::findOrFail($id);
        if ($item) {
            $item->delete();
        }
        return Redirect::back()->with('message','Operation Successful !');
    }

}
