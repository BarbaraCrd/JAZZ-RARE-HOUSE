<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    use HasFactory;

    public static function getPromotions()
{

    $new = DB::table('promotions')
    ->join('products', 'promotions.products_id', '=', 'products.id')
     ->leftjoin('types', 'products.type_id', '=', 'types.id')
    ->leftjoin('genres', 'products.genre_id', '=', 'genres.id')
    ->select(
        'promotions.promoid',
        'promotions.promoprice',
        'promotions.products_id',
        'products.id',
        'products.title',
        'products.artist',
        'products.label',
        'products.millesime',
        'products.price',
        'products.description',
        'products.picture1',
        'products.picture2',
        'products.picture3',
        'products.picture4',
        'products.genre_id',
        'products.user_id',
        'products.type_id',
        'types.typeName',
        'genres.genreName',
    )

    ->where('products.available', '=', 'OK')
    ->where('products.statut', '=', 'OK')
 
    ->get();

return $new;
}

public static function getPromotionsid($id)
{


$new = DB::table('promotions')
    ->join('products', 'promotions.products_id', '=', 'products.id')
     ->leftjoin('types', 'products.type_id', '=', 'types.id')
    ->leftjoin('genres', 'products.genre_id', '=', 'genres.id')
    ->select(
        'promotions.promoid',
        'promotions.promoprice',
        'promotions.products_id',
        'products.id',
        'products.title',
        'products.artist',
        'products.label',
        'products.millesime',
        'products.price',
        'products.description',
        'products.picture1',
        'products.picture2',
        'products.picture3',
        'products.picture4',
        'products.genre_id',
        'products.user_id',
        'products.type_id',
        'types.typeName',
        'genres.genreName',
    )
    ->where(
        "promotion.promoid",
        "=",
        $id
    )
    ->where('products.available', '=', 'OK')
    ->where('products.statut', '=', 'OK')

    ->get();

return $new;
}
    

}
