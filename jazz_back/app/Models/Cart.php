<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'products_id',
    ];  

    public function getCart($id) {

        $cart = DB::table('carts')
                 ->join('users', 'carts.user_id', '=', 'users.id')
                 ->join('products', 'carts.product_id', '=', 'products.id')
                 ->select('carts.cartid', 'carts.product_id', 'carts.user_id'
                 , 'products.title', 'products.artist', 'products.label', 'products.millesime', 'products.price', 'products.picture1', 'products.picture2', 'products.picture3', 'products.picture4', 'products.genre_id', 'products.user_id', 'products.type_id', 'products.available')
                 ->where('carts.user_id', '=', $id)
                 ->where('products.available', '=', 'OK')
                 ->get();
 
         return $cart;
      }

      public function getSold($id) {

        $cart = DB::table('carts')
                 ->join('users', 'carts.user_id', '=', 'users.id')
                 ->join('products', 'carts.product_id', '=', 'products.id')
                 ->select('carts.cartid', 'carts.product_id', 'carts.user_id'
                 , 'products.title', 'products.artist', 'products.label', 'products.millesime', 'products.price', 'products.picture1', 'products.picture2', 'products.picture3', 'products.picture4', 'products.genre_id', 'products.user_id', 'products.type_id', 'products.available', 'products.updated_at')
                 ->where('carts.user_id', '=', $id)
                 ->where('products.available', '=', 'KO')
                 ->get();
 
         return $cart;
      }
}
