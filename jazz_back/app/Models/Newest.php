<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newest extends Model
{
    use HasFactory;

    protected $fillable = [

        'products_id',
    ];

    
public static function getNewest()
{

    $new = DB::table('newests')
    ->leftjoin('products', 'newests.products_id', '=', 'products.id')
    ->leftjoin('types', 'products.type_id', '=', 'types.id')
    ->leftjoin('genres', 'products.genre_id', '=', 'genres.id')
   
    ->select(
        'newests.newestid',
        'newests.products_id',
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

    
}
