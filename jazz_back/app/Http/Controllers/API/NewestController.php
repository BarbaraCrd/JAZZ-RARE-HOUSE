<?php

namespace App\Http\Controllers\API;

use App\Models\Newest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;


class NewestController extends BaseController
{
    public function index()
    {
        $Newests = Newest::getNewest();
        return $this->sendResponse($Newests, 'Newests fetched.') ;

        
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'products_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $Newest = new Newest;
        $Newest->products_id = request('products_id');
        $Newest->save();

        return $this->sendResponse($Newest, 'Newest created.');
    }

    public function destroy($newestid)
    {
        $Newest = Newest::where('newestid', '=', $newestid);
        $Newest->delete();

        return $this->sendResponse( $Newest, 'Deleted from newest');
    }




   

}