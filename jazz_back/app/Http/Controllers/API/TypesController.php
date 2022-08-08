<?php

namespace App\Http\Controllers\API;
   
use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;
   
class TypesController extends BaseController
{
    public function index()
    {
        $Typess = Types::all();
        return $this->sendResponse($Typess, 'Types fetched.') ;
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'typeName' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $Types = Types::create($input);
        return $this->sendResponse($Types, 'Type created.');
    }
   
    public function show($id)
    {
        $Types = Types::find($id);
        if (is_null($Types)) {
            return $this->sendError('Type does not exist.');
        }
        return $Types;
    }
    
    public function update(Request $request, Types $Types, $id)
    {
        $Types = Types::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'typeName' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $Types->typeName = $input['typeName'];
        $Types->save();
        
        return $this->sendResponse($Types, 'Type updated.');
    }
   
    public function destroy(Types $Types, $id)
    {
        $Types =Types::find($id);
        $Types->delete();
        return $this->sendResponse([], 'Type deleted.');
    }
}