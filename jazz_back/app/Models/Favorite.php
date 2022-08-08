<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'products_id',
    ];  

    public function getFav($id) {

        $favorite = DB::table('favorites')
                 ->join('users', 'favorites.user_id', '=', 'users.id')
                 ->join('products', 'favorites.product_id', '=', 'products.id')
                 ->select('favorites.id', 'favorites.product_id', 'favorites.user_id'
                 , 'products.title', 'products.artist', 'products.label', 'products.millesime', 'products.price', 'products.picture1', 'products.picture2', 'products.picture3', 'products.picture4', 'products.genre_id', 'products.user_id', 'products.type_id')
                 ->where('favorites.user_id', '=', $id)
                 ->get();
 
         return $favorite;
      }
}
