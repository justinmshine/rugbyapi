<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryModel;
use App\Models\DimensionsModel;
use App\Models\ImagesModel;
use App\Models\ReviewsModel;
use App\Models\ScanModel;
use App\Models\ShirtsModel;
use App\Models\StockModel;
use App\Models\SalesModel;
use App\Models\DrawModel;

class DashboardController extends Controller
{
    /**
     * Display the dashboard index.
     */
    public function index() {
        return view('dashboard', []);
    }

    /**
     * Display the countries index.
     */
    public function countries() {
        $countries = CountryModel::get();
        return view('countries', ['items' => $countries]);
    }

    /**
     * Display the dimensions index.
     */
    public function dimensions() {
        $dimensions = DimensionsModel::get();
        return view('dimensions', ['items' => $dimensions]);
    }

   /**
     * Display the stock index.
     */
    public function stock() {
        $shirts = ShirtsModel::get();
        $country = $shirts->map(function ($shirt) {
            return collect($shirt->toArray())
                ->only(['id', 'title'])
                ->all();
        });
        $dimensions = DimensionsModel::get();
        $stock = StockModel::get();
        return view('stock', ['items' => $stock, 'country' => $country, 'size' => $dimensions]);
    }

    /**
     * Display the images index.
     */
    public function images() {
        $images = ImagesModel::get();
        return view('images', ['items' => $images]);
    }

    /**
     * Display the reviews index.
     */
    public function reviews() {
        $reviews = ReviewsModel::get();
        return view('reviews', ['items' => $reviews]);
    }

    /**
     * Display the scan index.
     */
    public function scan() {
        $scan = ScanModel::get();
        return view('scan', ['items' => $scan]);
    }

    /**
     * Display the shirts index.
     */
    public function shirts() {
        $shirts = ShirtsModel::get();
        return view('shirts', ['items' => $shirts]);
    }

    /**
     * Display the sales index.
     */
    public function sales() {
        $sales = SalesModel::orderBy('created_at', 'DESC')->get();

        foreach($sales as $sale) {
            $records = json_decode($sale->sales, true);
            $breakdown = [];
            $total = 0;
            foreach($records as $key => $record) {
                $dimension = DimensionsModel::findOrFail($record['type']);
                $attributes = $dimension->getAttributes();
                $breakdown[$key]['title'] = $record['product']['title'];
                $breakdown[$key]['quantity'] = $record['quantity'];
                $breakdown[$key]['type'] = $attributes['type'];
                $breakdown[$key]['price'] = $record['price'];
                $total += $record['price'] * $record['quantity'];
            }
            $sale->breakdown = $breakdown;
            $sale->total = $total;
        }

        return view('sales', ['items' => $sales]);
    }

    /**
     * Display the prize draw entrants.
     */
    public function prizedraw() {
        $prize = DrawModel::get();
        return view('prizedraw', ['items' => $prize]);
    }
}
