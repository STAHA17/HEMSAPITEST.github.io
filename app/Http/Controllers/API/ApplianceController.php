<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Appliance;
use Validator;
use App\Http\Resources\ApplianceResource;
   
class ApplianceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appliances = Appliance::all();
    
        return $this->sendResponse(ApplianceResource::collection($appliances), 'Appliance retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'a_name' => 'required',
            'a_category' => 'required',
            'a_watt' => 'required',
            'a_consumption' => 'required',
            // 'user_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $appliance = Appliance::create($input);
   
        return $this->sendResponse(new ApplianceResource($appliance), 'Appliance created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appliance = Appliance::find($id);
  
        if (is_null($appliance)) {
            return $this->sendError('Appliance not found.');
        }
   
        return $this->sendResponse(new ApplianceResource($appliance), 'Appliance retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appliance $appliance)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'a_name' => 'required',
            'a_category' => 'required',
            'a_watt' => 'required',
            'a_consumption' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $appliance->a_name = $input['a_name'];
        $appliance->a_category = $input['a_category'];
        $appliance->a_watt = $input['a_watt'];
        $appliance->a_consumption = $input['a_consumption'];

        $appliance->save();
   
        return $this->sendResponse(new ApplianceResource($appliance), 'Appliance updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appliance $appliance)
    {
        $appliance->delete();
   
        return $this->sendResponse([], 'Appliance deleted successfully.');
    }
}