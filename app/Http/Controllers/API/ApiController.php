<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\ShirtsModel;
use App\Models\DimensionsModel;
use Validator;
use App\Http\Resources\ShirtsResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
   
class ApiController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $shirts = ShirtsModel::all();
        $dimensions = DimensionsModel::all();
    
        foreach($shirts as $shirt) {
            $single = ShirtsModel::find($shirt->id);
            $shirt->country = $single->country;
            $shirt->image = $single->image;
            $shirt->stock = $single->stock;
            $shirt->dimensions = $dimensions;
            Log::info($shirt);
        }

        return $this->sendResponse(ShirtsResource::collection($shirts), 'Products retrieved successfully.');
    }
}