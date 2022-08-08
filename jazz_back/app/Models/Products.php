<?php

namespace App\Models;

use App\Models\Types;
use App\Models\Genres;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' => 'required',
        'artist' => 'required',
        'label' => 'required',
        'millesime' => 'required',
        'price' => 'required',
        'description' => 'required',
        'picture1' => 'required',
        'picture2' => 'required',
        'picture3' => 'required',
        'picture4' => 'required',
        'genre_id' => 'required',
        'user_id' => 'required',
        'type_id' => 'required',
        'statut' => 'required',
        'views' => 'required',
        'available' => 'required'


    ];
    public static function getProducts()
    {

        $product = DB::table('products')
            ->join('types', 'products.type_id', '=', 'types.id')
            ->join('genres', 'products.genre_id', '=', 'genres.id')
            ->join('users', 'products.user_id', '=', 'users.id')


            ->select(
                'products.id',
                'products.title',
                'products.artist',
                'products.label',
                'products.millesime',
                'products.price',
                'products.picture1',
                'products.picture2',
                'products.picture3',
                'products.picture4',
                'products.description',
                'products.genre_id',
                'products.user_id',
                'products.type_id',
                'products.statut',
                'products.created_at',
                'products.updated_at',
                'products.views',
                'products.available',
                'types.typeName',
                'genres.genreName',
                'users.pseudo',
                'users.firstName',
                'users.lastName',
                'users.pseudo',
                'users.email',
                'users.password',
                'users.uRole',
                'users.avatar',
                'users.numero',
                'users.rue',
                'users.codepostal',
                'users.ville',
            )
            ->get();

        return $product;
    }

    public static function getProductsOK()
    {

        $product = DB::table('products')
            ->join('types', 'products.type_id', '=', 'types.id')
            ->join('genres', 'products.genre_id', '=', 'genres.id')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->leftjoin('newests', 'products.id', '=', 'newests.products_id')


            ->select(
                'products.id',
                'products.title',
                'products.artist',
                'products.label',
                'products.millesime',
                'products.price',
                'products.picture1',
                'products.picture2',
                'products.picture3',
                'products.picture4',
                'products.description',
                'products.genre_id',
                'products.user_id',
                'products.type_id',
                'products.statut',
                'products.created_at',
                'products.updated_at',
                'products.views',
                'products.available',
                'types.typeName',
                'genres.genreName',
                'users.pseudo',
                'users.firstName',
                'users.lastName',
                'users.pseudo',
                'users.email',
                'users.password',
                'users.uRole',
                'users.avatar',
                'users.numero',
                'users.rue',
                'users.codepostal',
                'users.ville',
                'newests.products_id',
                'newests.newestid'
            )
            ->where('products.statut', '=', 'OK')
            ->where('products.available', '=', 'OK')
            ->get();

        return $product;
    }

    public static function getProductsKO()
    {

        $product = DB::table('products')
            ->join('types', 'products.type_id', '=', 'types.id')
            ->join('genres', 'products.genre_id', '=', 'genres.id')
            ->join('users', 'products.user_id', '=', 'users.id')


            ->select(
                'products.id',
                'products.title',
                'products.artist',
                'products.label',
                'products.millesime',
                'products.price',
                'products.picture1',
                'products.picture2',
                'products.picture3',
                'products.picture4',
                'products.description',
                'products.genre_id',
                'products.user_id',
                'products.type_id',
                'products.statut',
                'products.created_at',
                'products.updated_at',
                'products.views',
                'types.typeName',
                'genres.genreName',
                'users.pseudo',
                'users.firstName',
                'users.lastName',
                'users.pseudo',
                'users.email',
                'users.password',
                'users.uRole',
                'users.avatar',
                'users.numero',
                'users.rue',
                'users.codepostal',
                'users.ville',
            )
            ->where('products.statut', '=', 'KO')
            ->get();

        return $product;
    }

    public static function getProductsId($id)
    {

        $productid = DB::table('products')
            ->leftjoin('types', 'products.type_id', '=', 'types.id')
            ->leftjoin('genres', 'products.genre_id', '=', 'genres.id')
            ->leftjoin('users', 'products.user_id', '=', 'users.id')
            ->leftjoin('notes', 'products.user_id', '=', 'notes.user_id')
            ->leftjoin('carts', 'products.id', '=', 'carts.product_id')
            ->leftjoin('promotions', 'products.id', '=', 'promotions.products_id')

            ->select(
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
                'products.statut',
                'products.created_at',
                'products.updated_at',
                'products.views',
                'products.available',
                'types.typeName',
                'genres.genreName',
                'users.pseudo',
                'users.firstName',
                'users.lastName',
                'users.pseudo',
                'users.email',
                'users.password',
                'users.uRole',
                'users.avatar',
                'users.numero',
                'users.rue',
                'users.codepostal',
                'users.ville',
                'notes.avg_notes',
                'notes.nb_votes',
                'carts.product_id',
                'carts.cartid', 
                'promotions.promoid', 
                'promotions.promoprice',
                'promotions.products_id',

            )
            ->where(
                "products.id",
                "=",
                $id
            )

            ->get();

        return $productid;
    }

    public static function getGenres($id)
    {

        $genres = DB::table('products')
            ->leftjoin('types', 'products.type_id', '=', 'types.id')
            ->leftjoin('genres', 'products.genre_id', '=', 'genres.id')
            ->leftjoin('users', 'products.user_id', '=', 'users.id')

            ->select(
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
                'products.statut',
                'products.created_at',
                'products.updated_at',
                'products.views',
                'products.available',
                'types.typeName',
                'genres.genreName',
                'users.pseudo',
                'users.firstName',
                'users.lastName',
                'users.pseudo',
                'users.email',
                'users.password',
                'users.uRole',
                'users.avatar',
                'users.numero',
                'users.rue',
                'users.codepostal',
                'users.ville',

            )
            ->where(
                "products.genre_id",
                "=",
                $id
            )
            ->where('products.statut', '=', 'OK')
            ->where('products.available', '=', 'OK')

            ->get();

        return $genres;
    }

    public static function getProductsUser($id) {

        $productuser = DB::table('products')
        ->leftjoin('types', 'products.type_id', '=', 'types.id')
        ->leftjoin('genres', 'products.genre_id', '=', 'genres.id')
        ->leftjoin('users', 'products.user_id', '=', 'users.id')
        ->leftjoin('notes', 'products.user_id', '=', 'notes.user_id')

        ->select(
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
            'products.statut',
            'products.created_at',
            'products.updated_at',
            'products.views',
            'products.available',
            'types.typeName',
            'genres.genreName',
            'users.pseudo',
            'users.firstName',
            'users.lastName',
            'users.pseudo',
            'users.email',
            'users.password',
            'users.uRole',
            'users.avatar',
            'users.numero',
            'users.rue',
            'users.codepostal',
            'users.ville',
            'notes.avg_notes',
            'notes.nb_votes'

        )
        ->where(
            "products.user_id", "=", $id
        )

        ->get();
 
         return $productuser;
      }

      public static function getProductsUserOK($id) {

        $productuserok = DB::table('products')
        ->leftjoin('types', 'products.type_id', '=', 'types.id')
        ->leftjoin('genres', 'products.genre_id', '=', 'genres.id')
        ->leftjoin('users', 'products.user_id', '=', 'users.id')
        ->leftjoin('notes', 'products.user_id', '=', 'notes.user_id')

        ->select(
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
            'products.statut',
            'products.created_at',
            'products.updated_at',
            'products.views',
            'products.available',
            'types.typeName',
            'genres.genreName',
            'users.pseudo',
            'users.firstName',
            'users.lastName',
            'users.pseudo',
            'users.email',
            'users.password',
            'users.uRole',
            'users.avatar',
            'users.numero',
            'users.rue',
            'users.codepostal',
            'users.ville',
            'notes.avg_notes',
            'notes.nb_votes'

        )
        ->where(
            "products.user_id", "=", $id
        )
        ->where( "products.statut", "=", "OK")
        ->where( "products.available", "=", "OK")

        ->get();
 
         return $productuserok;
      }

      public static function getPopulate() {

        $populate = DB::table('products')
        ->join('types', 'products.type_id', '=', 'types.id')
        ->join('genres', 'products.genre_id', '=', 'genres.id')
        ->join('users', 'products.user_id', '=', 'users.id')
        ->select(
            'products.id',
            'products.title',
            'products.artist',
            'products.label',
            'products.millesime',
            'products.price',
            'products.picture1',
            'products.picture2',
            'products.picture3',
            'products.picture4',
            'products.description',
            'products.genre_id',
            'products.user_id',
            'products.type_id',
            'products.statut',
            'products.created_at',
            'products.updated_at',
            'products.views',
            'products.available',
            'types.typeName',
            'genres.genreName',
            'users.pseudo',
            'users.firstName',
            'users.lastName',
            'users.pseudo',
            'users.email',
            'users.password',
            'users.uRole',
            'users.avatar',
            'users.numero',
            'users.rue',
            'users.codepostal',
            'users.ville',)

        ->where('products.statut', '=', 'OK')
        ->where('products.available', '=', 'OK')
        ->orderBydesc('views')
        ->get();
 
         return $populate;
      }

      public static function getCAtBySeller() {
 
        $seller = DB::table('products')
        ->join('users', 'products.user_id', '=', 'users.id')
        ->where('products.available', '=', 'KO')
        ->groupBy('products.user_id')
        ->get(['products.user_id', DB::raw('SUM(products.price) AS sum'), DB::raw('COUNT(products.user_id) AS count'), 'users.pseudo']);

         return $seller;
      }


}
