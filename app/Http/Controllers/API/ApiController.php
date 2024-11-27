<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\ShirtsModel;
use App\Models\DimensionsModel;
use App\Models\SalesModel;
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

    /**
     * Store a newly created sale in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'surname' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'card' => 'required',
            'expires' => 'required',
            'cvc' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        SalesModel::create($input);

        return $this->sendResponse($input, 'Sale created successfully.');
    }
}