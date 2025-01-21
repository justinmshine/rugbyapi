<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\DrawModel;
use Validator;
use App\Http\Resources\DrawResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
   
class PrizeController extends BaseController
{
    /**
     * Store a newly created prize draw entry in the database.
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
            'email' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        DrawModel::create($input);
        return $this->sendResponse($input, 'Draw entry created successfully.');
    }
}