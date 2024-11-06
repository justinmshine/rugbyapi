<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\ShirtsModel;
use Validator;
use App\Http\Resources\ShirtsResource;
use Illuminate\Http\JsonResponse;
   
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
    
        return $this->sendResponse(ShirtsResource::collection($shirts), 'Products retrieved successfully.');
    }
}