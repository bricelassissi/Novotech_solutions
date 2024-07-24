<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use App\Models\Client;
use App\Models\MessageClient;
use App\Models\Metier;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AccountController extends Controller
{
    
    
    public function registration() {
        
        return view('front.compte.inscription');
        
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
        return view('front.compte.connexion');
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
                return redirect()->route('account.login')->with('error','Attention, votre identifiant ou votre mot de passe est incorrect.');
            }

           

        } else {

            return redirect()->route('account.login')
                            ->withErrors($validator)
                            ->withInput($request->only('email'));
            
        }

    }

    public function profile() {

        
        if (Auth::user() == null) {
            return redirect()->route('account.login');
        } else {
            # code...
            $userId = Auth::user()->id;
            $user = User::where('id', $userId)->first();
            if ($user->type == "Artisan") {
    
                $artisanExiste = Artisan::where('user_id', $userId)->first();
                $metiers = Metier::all();
                if ($artisanExiste == null) {
                    return view('front.artisan.creer', [
                        'user' => $user,
                        'metiers' => $metiers
                    ]);
                } else {
                    $clients = MessageClient::where('artisan_id',$userId)->get();
                    return view('front.artisan.ArtisanDashboard', [
                        'user' => $user,
                        'clients' => $clients
                    ]);
                }
                
    
                
            } elseif ($user->type == "Client") {
                return view('front.client.ClientDashboard', [
                    'user' => $user
                ]);
            } elseif ($user->type == "Admin"){
    
                $artisans = Artisan::all();
                $clients = User::where('type','Client')->get();
                $metiers = Metier::all();
    
                
    
                return view('front.admin.AdminDashboard', [
                    'user' => $user,
                    'artisans' => $artisans,
                    'clients' => $clients,
                    'metiers' => $metiers,
                ]);
            }
        }
        
        
    }

    


    public function createArtisan(Request $request) {
        // dd($request->all());

        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'metier_id' => 'required',
            'ville' => 'required',
            'quartier' => 'required',
            'poste_occupe_dans_l_entreprise' => 'required',
            'description' => 'required',
            'telephone' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'zone_couverture' => 'required',
            'anciennete' => 'required',
            'plage_horaire' => 'required',
            'jour_travaille' => 'required',
        ], [
            'metier_id.required' => 'Le champ métier est obligatoire.',
        ]);

        // dd($validator->errors());

        if ($validator->passes()) {

            
            $artisan = new Artisan();
            $artisan->user_id = $request->user_id;
            $artisan->metier_id = $request->metier_id;
            $artisan->ville = $request->ville;
            $artisan->quartier = $request->quartier;
            $artisan->poste_occupe_dans_l_entreprise = $request->poste_occupe_dans_l_entreprise;
            $artisan->description = $request->description;
            $artisan->telephone = $request->telephone;
            $artisan->telephone_whatsapp = $request->telephone_whatsapp;
            $artisan->latitude = $request->latitude;
            $artisan->longitude = $request->longitude;
            $artisan->zone_couverture = $request->zone_couverture;
            $artisan->anciennete = $request->anciennete;
            $artisan->plage_horaire = $request->plage_horaire;
            $artisan->jour_travaille = $request->jour_travaille;
            $artisan->registre_commerce = $request->registre_commerce;
            $artisan->numero_registre_commerce = $request->numero_registre_commerce;
            $artisan->save();

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

    public function updateArtisan(Request $request) {

        // dd($request->all());
        // dd($request->password);

        $user = User::findOrFail($request->user_id);

        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => [
                'required','email',
                Rule::unique('users')->ignore($user->id)
        ],
            'metier_id' => 'required',
            'ville' => 'required',
            'quartier' => 'required',
            'poste_occupe_dans_l_entreprise' => 'required',
            'description' => 'required',
            'telephone' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'zone_couverture' => 'required',
            'anciennete' => 'required',
            'plage_horaire' => 'required',
            'jour_travaille' => 'required',
        ], [
            'metier_id.required' => 'Le champ métier est obligatoire.',
        ]);

        if ($validator->passes()) {

            // dd($request->metier_id);
            
            $artisan = Artisan::where('user_id', $user->id)->first();

            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->email = $request->email;

            $artisan->metier_id = $request->metier_id;
            $artisan->ville = $request->ville;
            $artisan->quartier = $request->quartier;
            $artisan->poste_occupe_dans_l_entreprise = $request->poste_occupe_dans_l_entreprise;
            $artisan->description = $request->description;
            $artisan->telephone = $request->telephone;
            $artisan->telephone_whatsapp = $request->telephone_whatsapp;
            $artisan->latitude = $request->latitude;
            $artisan->longitude = $request->longitude;
            $artisan->zone_couverture = $request->zone_couverture;
            $artisan->anciennete = $request->anciennete;
            $artisan->plage_horaire = $request->plage_horaire;
            $artisan->jour_travaille = $request->jour_travaille;
            $artisan->registre_commerce = $request->registre_commerce;
            $artisan->numero_registre_commerce = $request->numero_registre_commerce;
            
            
            $user->save();
            $artisan->save();

            session()->flash('success','Informations mises à jour avec succès.');

            



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


    public function updateClient(Request $request) {

        // dd($request->all());
        // dd($request->password);

        $user = User::findOrFail($request->user_id);


        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => [
                'required','email',
                Rule::unique('users')->ignore($user->id)
        ],
            
        ]);

        if ($validator->passes()) {

           
            

            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->email = $request->email;

            
            $user->save();

            session()->flash('success','Informations mises à jour avec succès.');

            



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


    

    public function updatePassword(Request $request){
        $validator = Validator::make($request->all(),[
            'old_password' => 'required',
            'password' => 'required|min:5',
            'confirmation_password' => 'required|same:password',
        ],
        [
            'old_password.required' => 'Ancien mot de passe est obligatoire.',
            'confirmation_password.required' => 'Confirmation mot de passe est obligatoire.',
        ]);

        if ($validator->passes()) {


            if (Hash::check($request->old_password, Auth::user()->password) == false){
                session()->flash('error','Votre ancien mot de passe est incorrect.');
                return response()->json([
                    'status' => true                
                ]);
            }

            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);  
            $user->save();

        session()->flash('success','Mot de passe mis à jour avec succès.');




            return response()->json([
                'status' => true,
                'errors' => []
            ]);
            # code...
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
        

       

    }


    public function updateProfilePic(Request $request) {
        // dd($request->all());

        $id = Auth::user()->id;

        $validator = Validator::make($request->all(),[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->passes()) {

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = $id.'-'.time().'.'.$ext;
            $image->move(public_path('/profile_pic/'), $imageName);



            // Create a small thumbnail
            // $sourcePath = public_path('/profile_pic/'.$imageName);
            // $manager = new ImageManager(Driver::class);
            // $image = $manager->read($sourcePath);
            // dd('ok');

            // crop the best fitting 5:3 (600x360) ratio and resize to 600x360 pixel
            // $image->cover(150, 150);
            // $image->toPng()->save(public_path('/profile_pic/thumb/'.$imageName));



            // Delete Old Profile Pic
            File::delete(public_path('/profile_pic/thumb/'.Auth::user()->image));
            File::delete(public_path('/profile_pic/'.Auth::user()->image));

            User::where('id',$id)->update(['image_profile' => $imageName]);

            session()->flash('success','Profile picture updated successfully.');

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





    public function logout() {
        Auth::logout();
        return redirect()->route('front.home');
    }



}
