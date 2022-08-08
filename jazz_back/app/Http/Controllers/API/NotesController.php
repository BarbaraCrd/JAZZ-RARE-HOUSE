<?php

namespace App\Http\Controllers\API;

use Validator;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class NotesController extends BaseController
{
    public function index()
    {
        $notes = Note::all();
        return $notes;
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'user_id' => 'required',
            'nb_votes' => 'required',
            'total_notes' => 'required',
            'avg_notes' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $notes = new Note;
        $notes->user_id = request('user_id');
        $notes->nb_votes = request('nb_votes');
        $notes->total_notes = request('total_notes');
        $notes->avg_notes = request('avg_notes');
        $notes->save();

        return $this->sendResponse($notes, 'Note created.');
    }

    public function update(Request $request, $id)

    {   $notes = Note::all()->where('user_id', '=', $id)->first();
        $input = $request->all();
        $validator = Validator::make($input, [
            'user_id' => 'required',
            'nb_votes' => 'required',
            'total_notes' => 'required',
            'avg_notes' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $notes->user_id = request('user_id');
        $notes->nb_votes = request('nb_votes');
        $notes->total_notes = request('total_notes');
        $notes->avg_notes = request('avg_notes');
        $notes->update();

        return $this->sendResponse($notes, 'Note updated.');
    }
}
