<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use App\Models\MessageClient;
use App\Models\Metier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtisanController extends Controller
{
    public function index() {
        $artisans = Artisan::latest()->get();
        return view('front.admin.artisans.liste', compact('artisans'));
    }


    public function clients() {
        
        if (Auth::user() == null) {
            return redirect()->route('account.login');

        } else {

            $userId = Auth::user()->id;
            $user = User::where('id', $userId)->first();
            $clients = MessageClient::where('artisan_id',$userId)->get();

            // dd($clients);
            
            return view('front.artisan.client', [
                'user' => $user,
                'clients' => $clients
            ]);
        }
        
    }

    public function makeMessageAsRead(Request $request) {

        // dd($request->all());

        $message = MessageClient::find($request->message_id);
        if ($message->read == true) {
            
        } else {
            $message->read = true;
        }
        
        $message->save();


    }

    public function compte() {

        if (Auth::user() == null) {
            return redirect()->route('account.login');
        } else {
            # code...
            $userId = Auth::user()->id;
            $user = User::where('id', $userId)->first();
            $metiers = Metier::all();
            
            return view('front.artisan.compte', [
                'user' => $user,
                'metiers' => $metiers

            ]);
        }
        

    }

    public function details($id) {

        $artisan = Artisan::where('id',$id)->with(['user','metier'])->first();

        // dd($artisan);

        if ($artisan == null) {
            // abort(404);
            return view('front.artisan-404');
        } else {
            return view('front.artisanDetails', compact(['artisan']));
        }
        




    }


    public function destroy(Request $request) {
        $id = $request->id;

        $artisan = Artisan::find($id);

        if ($artisan == null) {
            session()->flash('error','Artisan introuvable.');
            return response()->json([
                'status' => false                
            ]);
        }

        $artisan->delete();
        session()->flash('success','Artisan supprimé avec succès.');
        return response()->json([
            'status' => true                
        ]);
    }



}
