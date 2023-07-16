<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
//use Dotenv\Validator;
use Illuminate\Http\Request;



class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $utilisateurDonnee = $request->validate(["email"=>["required","email"], "password"=>["required","string"]]);
        $utilisateur=User::where("email", $utilisateurDonnee["email"])->first();
        if (!$utilisateur) return response(["message" => "aucun utilisateur de trouver avec l'email suivant $utilisateurDonnee[email]" ],401);
        if (!$Hash::check( $utilisateurDonnee["password"], $utilisateur->password))
        {return response(["message" => "aucun utilisateur trouver aveC ce mot de passe" ],401);}
        $token= $utilisateur->createToken("CLE_SECRETE")->plainTextToken;

        return  response(["utilisateur"=>$utilisateur,"token"=>$token]) ;

    /*public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // code to store a new user
    }
    */
}
}
