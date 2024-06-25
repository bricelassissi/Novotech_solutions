<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'email' => 'required|email|unique:users,email',
            'motDePasse' => 'required|min:5|same:confirmationMotDePasse',
            'confirmationMotDePasse' => 'required',
        ]);

        if ($validator->passes()) {

            
            
            if ($request->type == 'Oui') {
                $type = 'Artisan';
            } elseif ($request->type == 'Non') {
                $type = 'Client';
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ]);
            }
            $user = new User();
            $user->type = $type;
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

    public function authentification(Request $request) {
        
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'motDePasse' => 'required|min:5',
        ]);

        if ($validator->passes()) {
            
            if(Auth::attempt(['email' => $request->email, 'password' => $request->motDePasse])) {
                
                return redirect()->route('account.profile');
            } else {

                return redirect()->route('account.login')->with('error','Les informations fournies ne correspondent pas à nos enregistements.');

            }

           

        } else {

            return redirect()->route('account.login')
                            ->withErrors($validator)
                            ->withInput($request->only('email'));
            
        }

    }

    public function profile() {
        echo 'profile page';
    }


}
