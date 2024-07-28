<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\MessageClient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    

    public function index() {
        $clients = User::where('type', 'Client')->latest()->get();
        return view('front.admin.clients.liste', compact('clients'));
    }

    public function artisans() {
        
        

        if (Auth::user() == null) {
            return redirect()->route('account.login');
        } else {
            $userId = Auth::user()->id;
            $user = User::where('id', $userId)->first();
            $artisans = MessageClient::where('user_id',$userId)->get();
            

            // dd($artisans);
            return view('front.client.artisan', compact('artisans','user'));
        }
        
    }

    public function compte() {


        if (Auth::user() == null) {
            return redirect()->route('account.login');
        } else {
            # code...
            $userId = Auth::user()->id;
            $user = User::where('id', $userId)->first();
            // $clients = Client::latest()->get();
            return view('front.client.compte', [
                'user' => $user
            ]);
        }
        
    }


    public function demandeDevis(Request $request) {
        
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'artisan_id' => 'required',
            'metier_id' => 'required',
            'numero_telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'objet' => 'required|max:25|min:5',
            'message' => 'required|min:10',
        ], [
            'numero_telephone.required' => 'Le numéro de téléphone est obligatoire.',
        ]);


        if ($validator->passes()) {

            // dd($request->all());

            $demande = new MessageClient();
            $demande->user_id = $request->user_id;
            $demande->metier_id = $request->metier_id;
            $demande->artisan_id = $request->artisan_id;
            $demande->numero_telephone = $request->numero_telephone;
            $demande->objet = $request->objet;
            $demande->message = $request->message;
            $demande->save();

            session()->flash('success','Votre message a été envoyé.');
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


    public function destroy(Request $request) {

        $id = $request->id;

        $client = User::find($id);


        if ($client == null) {
            session()->flash('error','Client introuvable.');
            return response()->json([
                'status' => false                
            ]);
        }

        $client->delete();
        session()->flash('success','Client supprimé avec succès.');
        return response()->json([
            'status' => true                
        ]);
    }





}
