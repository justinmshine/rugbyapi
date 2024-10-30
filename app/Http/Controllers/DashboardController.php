<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryModel;
use App\Models\DimensionsModel;

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
}
