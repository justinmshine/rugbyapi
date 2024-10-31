<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\CountryModel;
use App\Models\ShirtsModel;

class CountryController extends Controller
{
    /**
     * Edit the country item.
     */
    public function edit(Request $request, int $id) {
        $item = CountryModel::findOrFail($id);
        $shirts = ShirtsModel::get();
        $items = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });
        $attributes = $item->getAttributes();
        return view('country/edit', ['item' => $attributes, 'items' => $items]);
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
        $item->shirt_id = $params['shirt_id'];
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

    /**
     * Open the add country form.
     */
    public function add() {
        $shirts = ShirtsModel::get();
        $items = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });

        return view('country/add', ['items' => $items]);
    }

    /**
     * Insert the country item.
     */
    public function insert(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3',
            'capital' => 'required|string|min:3',
            'iso' => 'required|string|min:2',
        ]);

        $params = $request->all();
        $item = CountryModel::make();
        $item->name = $params['name'];
        $item->capital_city = $params['capital'];
        $item->iso_code = $params['iso'];
        $item->shirt_id = $params['shirt_id'];
        $item->save();
        return Redirect::to('dashboard/countries')->with('message','Operation Successful !');
    }
}
