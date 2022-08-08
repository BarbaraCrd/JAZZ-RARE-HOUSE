<?php

namespace App\Http\Controllers\API;

use App\Models\Promotions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;


class PromotionsController extends BaseController
{
    public function indexAll()
    {
        $Promotions = Promotions::getPromotions();
        return $this->sendResponse($Promotions, 'Promotions fetched.') ;

        
    }

    public function index($id)
    {
        $Promotions = Promotions::getPromotionsid($id);
        return $this->sendResponse($Promotions, 'Promotions fetched.') ;

        
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'products_id' => 'required',
            'promoprice' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $Promotion = new Promotions;
        $Promotion->products_id = request('products_id');
        $Promotion->promoprice = request('promoprice');
        $Promotion->save();

        return $this->sendResponse($Promotion, 'Promotion created.');
    }

    public function destroy($id)
    {
        $Promotion = Promotions::where('promoid', '=', $id);
        $Promotion->delete();

        return $this->sendResponse( $Promotion, 'Deleted from Promotion');
    }




   

}