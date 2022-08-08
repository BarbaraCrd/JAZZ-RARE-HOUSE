<?php
   
namespace App\Http\Controllers\API;
   
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;
   
class ProductsController extends BaseController
{

    public function index()
    {
        $Productss = Products::getProducts();
        return $Productss;
    }

    public function indexOK()
    {
        $Productss = Products::getProductsOK();
        return $Productss;
    }

    public function getGroup()
    {
        $seller = Products::getCAtBySeller();
        return $seller;
    }

    public function getQtyBySeller()
    {
        $sellerqty = Products::getQtyBySeller();
        return $sellerqty;
    }

    public function indexKO()
    {
        $Productss = Products::getProductsKO();
        return $Productss;
    }

    public function indexProduct($id)
    {
        $Productss = Products::getProductsId($id);
        return $Productss;
    }

    public function indexByGenre($input)
    {
        $Productss = Products::getGenres($input);
        return $Productss;
    }

    public function indexByUser($user_id)
    {
        $Productss = Products::getProductsUser($user_id);
        return $Productss;
    }

    public function indexByUserOK($user_id)
    {
        $Productss = Products::getProductsUserOK($user_id);
        return $Productss;
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
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
            'type_id' => 'required',
            'user_id' => 'required',
            'genre_id' => 'required',
            'statut' => 'required',
            'views' => 'required'
           
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $path = "images/";
        $image_parts = explode(";base64", $request->picture1);
        $image_type_aux = explode("./images/", $image_parts[0]);
        $image_type = $image_type_aux;
        $image_en_base64 = base64_decode($image_parts[1]);
        $file = $path . uniqid() . '.png';

        $image_parts2 = explode(";base64", $request->picture2);
        $image_type_aux2 = explode("./images/", $image_parts2[0]);
        $image_type2 = $image_type_aux2;
        $image_en_base642 = base64_decode($image_parts2[1]);
        $file2 = $path . uniqid() . '.png';

        $image_parts3 = explode(";base64", $request->picture3);
        $image_type_aux3 = explode("./images/", $image_parts3[0]);
        $image_type3 = $image_type_aux3;
        $image_en_base643 = base64_decode($image_parts3[1]);
        $file3 = $path . uniqid() . '.png';

        $image_parts4 = explode(";base64", $request->picture4);
        $image_type_aux4 = explode("./images/", $image_parts4[0]);
        $image_type4 = $image_type_aux4;
        $image_en_base644 = base64_decode($image_parts4[1]);
        $file4 = $path . uniqid() . '.png';

        file_put_contents($file, $image_en_base64);
        file_put_contents($file2, $image_en_base642);
        file_put_contents($file3, $image_en_base643);
        file_put_contents($file4, $image_en_base644);

        $Products = new Products;
        $Products->title = request('title');
        $Products->artist = request('artist');
        $Products->label = request('label');
        $Products->millesime = request('millesime');
        $Products->picture1 = $file;
        $Products->picture2 = $file2;
        $Products->picture3 = $file3;
        $Products->picture4 = $file4;
        $Products->price = request('price');
        $Products->description = request('description');
        $Products->type_id= request('type_id');
        $Products->user_id= request('user_id');
        $Products->genre_id= request('genre_id');
        $Products->statut = request('statut');
        $Products->views = 0;
        $Products->available= "OK";
        

        $Products->save();

        return $this->sendResponse($Products, 'Product created.');
    }

   
    public function show($id)
    {
        $Products = Products::find($id);
        if (is_null($Products)) {
            return $this->sendError('Products does not exist.');
        }
        return $this->sendResponse($Products, 'Product fetched.');
    }
    
    public function updateP1(Request $request, Products $Products, $id)
    {
        $Products = Products::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'picture1' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $path = "images/";
        $image_parts = explode(";base64", $request->picture1);
        $image_type_aux = explode("./images/", $image_parts[0]);
        $image_type = $image_type_aux;
        $image_en_base64 = base64_decode($image_parts[1]);
        $file = $path . uniqid() . '.png';

        file_put_contents($file, $image_en_base64);

        $Products->picture1 = $file;

        $Products->save();
        
        return $this->sendResponse($Products, 'Product updated.');
    }

    public function updateP2(Request $request, Products $Products, $id)
    {
        $Products = Products::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'picture2' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $path = "images/";
        $image_parts2 = explode(";base64", $request->picture2);
        $image_type_aux2 = explode("./images/", $image_parts2[0]);
        $image_type2 = $image_type_aux2;
        $image_en_base642 = base64_decode($image_parts2[1]);
        $file2 = $path . uniqid() . '.png';

        file_put_contents($file2, $image_en_base642);

        $Products->picture2 = $file2;

        $Products->save();
        
        return $this->sendResponse($Products, 'Product updated.');
    }

    public function updateP3(Request $request, Products $Products, $id)
    {
        $Products = Products::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'picture3' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $path = "images/";
        $image_parts3 = explode(";base64", $request->picture3);
        $image_type_aux3 = explode("./images/", $image_parts3[0]);
        $image_type3 = $image_type_aux3;
        $image_en_base643 = base64_decode($image_parts3[1]);
        $file3 = $path . uniqid() . '.png';

        file_put_contents($file3, $image_en_base643);

        $Products->picture3 = $file3;

        $Products->save();
        
        return $this->sendResponse($Products, 'Product updated.');
    }

    public function updateP4(Request $request, Products $Products, $id)
    {
        $Products = Products::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'picture4' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $path = "images/";
        $image_parts4 = explode(";base64", $request->picture4);
        $image_type_aux4 = explode("./images/", $image_parts4[0]);
        $image_type4 = $image_type_aux4;
        $image_en_base644 = base64_decode($image_parts4[1]);
        $file4 = $path . uniqid() . '.png';

        file_put_contents($file4, $image_en_base644);

        $Products->picture4 = $file4;

        $Products->save();
        
        return $this->sendResponse($Products, 'Product updated.');
    }

    public function update(Request $request, Products $Products, $id)
    {
        $Products = Products::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'artist' => 'required',
            'label' => 'required',
            'millesime' => 'required',
            'price' => 'required',
            'description' => 'required',
            'type_id' => 'required',
            'user_id' => 'required',
            'genre_id' => 'required',
            'statut' => 'required',
            'views' => 'required',
            

        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }


        $Products->title = request('title');
        $Products->artist = request('artist');
        $Products->label = request('label');
        $Products->millesime = request('millesime');
        $Products->price = request('price');
        $Products->description = request('description');
        $Products->type_id= request('type_id');
        $Products->user_id= request('user_id');
        $Products->genre_id= request('genre_id');
        $Products->statut= request('statut');
        $Products->views = request('views');
        $Products->available= "OK";
        
        $Products->save();
        
        return $this->sendResponse($Products, 'Product updated.');
    }
   
    public function updateViews(Request $request, Products $Products, $id)
    {
        $Products = Products::find($id);
        $viewsT = $Products->views;
        $Products->views = $viewsT+1;
        $Products->save();
        
        return $this->sendResponse($Products, 'Product updated.');
    }


    public function destroy($id)
    {
        $Products = Products::findOrFail($id);
        $Products->delete();
        return $this->sendResponse([], 'Product deleted.');
    }

    public function getPopulate(){
        $Products = Products::getPopulate();
        return $Products;
    }
}