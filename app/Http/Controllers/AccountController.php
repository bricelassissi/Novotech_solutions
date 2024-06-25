<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    
    
    public function registration() {
        
        return view('front.account.register');
        
    }

    
    public function userRegistration(Request $request) {
        $validator = Validator::make($request->all(),[
            'type' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique',
            'motDePasse' => 'required|min:8|same:confirmMotDePasse',
            'confirmMotDePasse' => 'required',
        ]);

        if ($validator->passes()) {

            $user = new User();
            $user->type = $request->type;
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->password = Hash::make($request->motDePasse);
            $user->save();

            session()->flash('success','Utilisateur crée avec succès!');


            return response()->json([
                'status' => true,
                'errors' => []
            ]);


        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
        
        
    }

    
    
    
    public function login() {
        return view('front.account.login');

    }
}
