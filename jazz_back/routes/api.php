<?php
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CartsController;
use App\Http\Controllers\API\NotesController;
use App\Http\Controllers\API\TypesController;
use App\Http\Controllers\API\GenresController;
use App\Http\Controllers\API\NewestController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\FavoritesController;
use App\Http\Controllers\API\PromotionsController;
  
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
// users
Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::get('getuser/{id}',[AuthController::class,'show']);
Route::get('users',[AuthController::class,'indexUser']);
Route::delete('destroyUser/{id}',[AuthController::class,'destroyUser']);
Route::put('users/updatea/{id}', [AuthController::class, 'updatea']);
Route::put('users/updatei/{id}', [AuthController::class, 'updatei']);
Route::put('users/updateadmin/{id}', [AuthController::class, 'updateadmin']);
Route::put('users/updatep/{id}', [AuthController::class, 'updatep']);

//products
Route::get('productskpi', [ProductsController::class, "getGroup"]) ;
Route::get('products', [ProductsController::class, "index"]) ;
Route::get('productsok', [ProductsController::class, "indexOK"]) ;
Route::get('productsko', [ProductsController::class, "indexKO"]) ;
Route::get('productsd/{id}', [ProductsController::class, "indexProduct"]) ;
Route::get('products/user/{id}', [ProductsController::class, "indexByUser"]) ;
Route::get('productsok/user/{id}', [ProductsController::class, "indexByUserOK"]) ;
Route::get('products/genre/{genre_id}', [ProductsController::class, "indexByGenre"]) ;
Route::get('products/{id}', [ProductsController::class, "show"]) ;
Route::post('products', [ProductsController::class, "store"]) ;
Route::put('products/{id}', [ProductsController::class, "update"]) ;
Route::put('products/{id}/views', [ProductsController::class, "updateViews"]) ;
Route::get('populate', [ProductsController::class, "getPopulate"]) ;
Route::put('products/photo1/{id}', [ProductsController::class, "updateP1"]) ;
Route::put('products/photo2/{id}', [ProductsController::class, "updateP2"]) ;
Route::put('products/photo3/{id}', [ProductsController::class, "updateP3"]) ;
Route::put('products/photo4/{id}', [ProductsController::class, "updateP4"]) ;
Route::delete('products/{id}', [ProductsController::class, "destroy"]); 

//genres
Route::get('genres', [GenresController::class, "index"]) ;
Route::get('genres/{id}', [GenresController::class, "show"]) ;
Route::post('genres', [GenresController::class, "store"]) ;
Route::put('genres/{id}', [GenresController::class, "update"]) ;
Route::delete('genres/{id}', [GenresController::class, "destroy"]) ;

//types
Route::get('types', [TypesController::class, "index"]) ;
Route::get('types/{id}', [TypesController::class, "show"]) ;
Route::post('types', [TypesController::class, "store"]) ;
Route::put('types/{id}', [TypesController::class, "update"]) ;
Route::delete('types/{id}', [TypesController::class, "destroy"]) ;

//favorites
Route::get('favorites/{id}',[FavoritesController::class,'index']);
Route::get('favorites',[FavoritesController::class,'indexall']);
Route::post('addfavorite',[FavoritesController::class,'store']);
Route::delete('destroyfav/{id}',[FavoritesController::class,'destroy']);

//carts
Route::get('carts/{id}',[CartsController::class,'index']);
Route::get('carts',[CartsController::class,'indexall']);
Route::get('solds/{id}',[CartsController::class,'getSold']);
Route::post('addcarts',[CartsController::class,'store']);
Route::put('buy/{id}',[CartsController::class,'buy']);
Route::delete('destroycarts/{id}',[CartsController::class,'destroycarts']);

//notes
Route::get('notes',[NotesController::class,'index']);
Route::post('addnote',[NotesController::class,'store']);
Route::put('updatenote/{id}', [NotesController::class, 'update']);


//newest
Route::get('newest',[NewestController::class,'index']);
Route::post('addNewest',[NewestController::class,'store']);
Route::delete('destroyNewest/{newestid}',[NewestController::class,'destroy']);

//promotions
Route::get('promotions',[PromotionsController::class,'indexAll']);
Route::get('promotions/{id}',[PromotionsController::class,'index']);
Route::post('addPromotions',[PromotionsController::class,'store']);
Route::delete('destroyPromotions/{promotionsid}',[PromotionsController::class,'destroy']);
     
Route::middleware('auth:sanctum')->group( function () {
   
});
