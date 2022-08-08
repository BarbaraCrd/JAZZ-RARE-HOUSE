<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class AuthController extends BaseController
{

    public function signin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['id'] =  $authUser->id;
            $success['uRole'] =  $authUser->uRole;
            $success['pseudo'] = $authUser->pseudo;

            return $this->sendResponse($success, 'User signed in');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'pseudo' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'uRole' => 'required',
            'numero' => 'required',
            'rue' => 'required',
            'codepostal' => 'required',
            'ville' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }

        /* $path = "./avatar/";
        $image_parts = explode(";base64", $request->avatar);
        $image_type_aux = explode("./avatar/", $image_parts[0]);
        $image_type = $image_type_aux;
        $image_en_base64 = base64_decode($image_parts[1]);
        $file = $path . uniqid() . '.png';

        file_put_contents($file, $image_en_base64); */

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['avatar'] = 'avatar/default.jpg';
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;

        return $this->sendResponse($success, 'User created successfully.');
    }

    public function indexUser()
    {
        $users = User::getUsers();
        return $users;
    }

    public function indexUserAll()
    {
        $users = User::all();
        return $users;
    }




    public function show($id)
    {
        return User::getUsersById($id);
    }




    public function loggedUser()
    {
        $user = Auth::user();
        return $user;
    }

    public function updatea(Request $request, User $user, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'avatar',

        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $path = "./avatar/";
        $image_parts = explode(";base64", $request->avatar);
        $image_type_aux = explode("./avatar/", $image_parts[0]);
        $image_type = $image_type_aux;
        $image_en_base64 = base64_decode($image_parts[1]);
        $file = $path . uniqid() . '.png';

        file_put_contents($file, $image_en_base64);

        $user->avatar = $file;
        $user->update();

        return $user;
    }

    public function updatei(Request $request, User $user, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'firstName',
            'lastName',
            'pseudo',
            'email',
            'numero',
            'rue',
            'codepostal',
            'ville'

        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

      

        $user->firstName = request('firstName');
        $user->lastName = request('lastName');
        $user->pseudo = request('pseudo');
        $user->email = request('email');
        $user->numero = request('numero');
        $user->rue = request('rue');
        $user->codepostal = request('codepostal');
        $user->ville = request('ville');
        
        $user->update();

        return $user;
    }

    public function updateadmin(Request $request, User $user, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'firstName',
            'lastName',
            'pseudo',
            'email',
            'avatar',
            'numero',
            'rue',
            'codepostal',
            'ville',
            'uRole',

        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $path = "./avatar/";
        $image_parts = explode(";base64", $request->picture);
        $image_type_aux = explode("./avatar/", $image_parts[0]);
        $image_type = $image_type_aux;
        $image_en_base64 = base64_decode($image_parts[1]);
        $file = $path . uniqid() . '.png';

        file_put_contents($file, $image_en_base64);

        $user->firstName = request('firstName');
        $user->lastName = request('lastName');
        $user->email = request('email');
        $user->pseudo = request('pseudo');
        $user->uRole = request('uRole');
        $user->avatar = $file;
        $user->numero = request('numero');
        $user->rue = request('rue');
        $user->codepostal = request('codepostal');
        $user->ville = request('ville');
        $user->update();

        return $user;
    }

    public function updatep(Request $request, User $user, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'password' => 'required',
            'confirm_password' => 'required|same:password',

        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $user->password = bcrypt(request('password'));
        $user->update();

        return $user;
    }


    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return $this->sendResponse([], 'User deleted.');
    }
}
