<?php

namespace App\Http\Controllers\API;
   
use App\Models\Genres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;
   
class GenresController extends BaseController
{
    public function index()
    {
        $Genress = Genres::all();
        return $this->sendResponse($Genress, 'Genres fetched.') ;
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'genreName' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $Genres = Genres::create($input);
        return $this->sendResponse($Genres, 'Genre created.');
    }
   
    public function show($id)
    {
        $Genres = Genres::find($id);
        if (is_null($Genres)) {
            return $this->sendError('Genre does not exist.');
        }
        return $Genres;
    }
    
    public function update(Request $request, Genres $Genres, $id)
    {
        $Genres = Genres::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'genreName' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $Genres->genreName = $input['genreName'];
        $Genres->save();
        
        return $this->sendResponse($Genres, 'Genre updated.');
    }
   
    public function destroy(Genres $Genres, $id)
    {
        $Genres =Genres::find($id);
        $Genres->delete();
        return $this->sendResponse([], 'Genre deleted.');
    }
}