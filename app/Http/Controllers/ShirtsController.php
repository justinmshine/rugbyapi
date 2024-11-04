<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\ShirtsModel;

class ShirtsController extends Controller
{
    /**
     * Edit the shirts item.
     */
    public function edit(Request $request, int $id) {
        $item = ShirtsModel::findOrFail($id);
        $attributes = $item->getAttributes();
        return view('shirts/edit', ['item' => $attributes]);
    }

    /**
     * Update the shirts item.
     */
    public function update(Request $request, int $id) {
        $validatedData = $request->validate([
            'title' => 'required|string|min:4',
            'description' => 'required|string|min:4',
            'price' => 'decimal:2',
            'percent_discount' => 'integer',
            'stock' => 'integer',
            'min_order_quantity' => 'integer',
        ]);
        $params = $request->all();
        $item = ShirtsModel::findOrFail($id);
        $item->title = isset($params['title']) ? $params['title'] : '';
        $item->description = isset($params['description']) ? $params['description'] : '';
        $item->category = isset($params['category']) ? $params['category'] : '';
        $item->price = isset($params['price']) ? $params['price'] : 0;
        $item->percent_discount = isset($params['percent_discount']) ? $params['percent_discount'] : 0;
        $item->stock = isset($params['stock']) ? $params['stock'] : 0;
        $item->sku = isset($params['sku']) ? $params['sku'] : '';
        $item->warranty = isset($params['warranty']) ? $params['warranty'] : '';
        $item->shipping = isset($params['shipping']) ? $params['shipping'] : '';
        $item->availability = isset($params['availability']) ? $params['availability'] : '';
        $item->return_policy = isset($params['return_policy']) ? $params['return_policy'] : '';
        $item->min_order_quantity = isset($params['min_order_quantity']) ? $params['min_order_quantity'] : 0;
        $item->thumbnail = isset($params['thumbnail']) ? $params['thumbnail'] : '';
        $item->save();
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Delete the shirts item.
     */
    public function delete(int $id) {
        $item = ShirtsModel::findOrFail($id);
        if ($item) {
            $item->delete();
        }
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Open the add shirts form.
     */
    public function add() {
        $shirts = ShirtsModel::get();
        $items = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });

        return view('shirts/add', ['items' => $items]);
    }

    /**
     * Insert the shirts item.
     */
    public function insert(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|min:4',
            'description' => 'required|string|min:4',
            'price' => 'decimal:2',
            'percent_discount' => 'integer',
            'stock' => 'integer',
            'min_order_quantity' => 'integer',
        ]);

        $params = $request->all();
        $item = ShirtsModel::make();
        $item->title = isset($params['title']) ? $params['title'] : '';
        $item->description = isset($params['description']) ? $params['description'] : '';
        $item->category = isset($params['category']) ? $params['category'] : '';
        $item->price = isset($params['price']) ? $params['price'] : 0;
        $item->percent_discount = isset($params['percent_discount']) ? $params['percent_discount'] : 0;
        $item->stock = isset($params['stock']) ? $params['stock'] : 0;
        $item->sku = isset($params['sku']) ? $params['sku'] : '';
        $item->warranty = isset($params['warranty']) ? $params['warranty'] : '';
        $item->shipping = isset($params['shipping']) ? $params['shipping'] : '';
        $item->availability = isset($params['availability']) ? $params['availability'] : '';
        $item->return_policy = isset($params['return_policy']) ? $params['return_policy'] : '';
        $item->min_order_quantity = isset($params['min_order_quantity']) ? $params['min_order_quantity'] : 0;
        $item->thumbnail = isset($params['thumbnail']) ? $params['thumbnail'] : '';
        $item->save();
        return Redirect::to('dashboard/shirts')->with('message','Operation Successful !');
    }
}
