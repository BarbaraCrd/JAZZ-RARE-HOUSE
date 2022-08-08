<?php

namespace App\Http\Controllers\API;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;


class FavoritesController extends BaseController
{
    public function index($id)
    {
        $favorite = Favorite::getFav($id);
        return $favorite;
    }

    public function indexAll()
    {
        $favorites = Favorite::all();
        return $favorites;
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'user_id' => 'required',
            'product_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $favorite = new Favorite;
        $favorite->user_id = request('user_id');
        $favorite->product_id = request('product_id');
        $favorite->save();

        return $this->sendResponse($favorite, 'Favorite created.');
    }

    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->delete();
    }

}
