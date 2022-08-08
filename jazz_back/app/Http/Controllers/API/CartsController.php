<?php

namespace App\Http\Controllers\API;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;


class CartsController extends BaseController
{
    public function index($id)
    {
        $cart = Cart::getCart($id);
        return $cart;
    }

    public function indexAll()
    {
        $cart = Cart::all();
        return $cart;
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

        $cart = new Cart;
        $cart->user_id = request('user_id');
        $cart->product_id = request('product_id');
        $cart->save();

        return $this->sendResponse($cart, 'Cart created.');
    }

    public function buy($id){

        $buy = Products::findOrFail($id);
        $buy->available = "KO";
        $buy->save();
        return $this->sendResponse($buy, 'Produit acheté');

    }

    public function getSold($id){

        $cart = Cart::getSold($id);

        return $cart;

    }    

    public function destroycarts($cartid)
    {
        $Cart = Cart::where('cartid', '=', $cartid);
        $Cart->delete();

        return $this->sendResponse( $Cart, 'Deleted from carts');
    }

}
