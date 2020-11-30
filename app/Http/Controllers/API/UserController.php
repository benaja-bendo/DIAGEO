<?php

namespace App\Http\Controllers\API;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserRessource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //save User
    public function register(Request $request)
    {
        $user = new CreateNewUser();
        $user_connect = $user->create($request->all());

        return response()->json([
            'success' => 'utilisateur cree avec success',
            'token' => $user_connect->api_token
        ], 200);

    }

    //login user
    public function login()
    {
        $isconnect = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if ($isconnect) {
            return [
                'success' => 'utilisateur conecté avec success',
                'token' => Auth::user()->api_token
            ];
        } else {
            return [
                'error' => 'aucun utilisateur trouvé'
            ];
        }
    }

    //show all user
    public function index()
    {
        return UserRessource::collection(User::all());
    }

    //update user
    public function update(Request $request, $token)
    {

        $user = new UpdateUserProfileInformation();
        $user->update();
//        dd($token);
        $user = User::findOrFail($token);
        $user->name = $request->title;
        if ($user->save()) {
            return new UserRessource($user);
        }
    }
}
