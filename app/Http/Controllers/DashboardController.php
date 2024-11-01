<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryModel;
use App\Models\DimensionsModel;
use App\Models\ImagesModel;
use App\Models\ReviewsModel;
use App\Models\ScanModel;
use App\Models\ShirtsModel;

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
}
