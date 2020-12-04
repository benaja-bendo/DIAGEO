<?php

namespace App\Http\Controllers\API;

use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserRessource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

//    recupere tous les utilisateurs
    public function index()
    {
        return UserRessource::collection(User::all());
    }

//    creation d'un utilisateur
    public function register(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->telephone1 = $request->telephone1;
        $user->telephone2 = $request->telephone2;
        $user->role = 'gerant';
        $user->password = Hash::make('password');
        if ($user->save()){
            return new UserRessource($user);
        }else {
            return response([
                'statut' => 0
            ], 404);
        }
    }

//connexion d'un utilisateur
    public function login()
    {
        $isconnect = auth()->attempt([
            'telephone1' => request('telephone1'),
            'password' => request('password'),
        ]);

        if ($isconnect) {

            return
                response([
                    'statut' => 1,
                    //                'token'=>Auth::user()->api_token
                ], 200);
        } else {
            return
                response([
                    'statut' => 0
                ], 404);
        }
    }

    //modification des informations d'un utilisateur
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
//        dd($request->name);

//        $info = new UpdateUserProfileInformation();
//        if($info->update($user, (array)$request)){
//            return new UserRessource($user);
//        }

        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->telephone1 = $request->telephone1;
        $user->telephone2 = $request->telephone2;
        $user->email = $request->email;
//        $user->profile_photo_url = $request->profile_photo_url;
        if ($user->save()){
            return new UserRessource($user);
        }


    }
}
