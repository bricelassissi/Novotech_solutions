<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
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
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();
        return view('front.artisan.client', [
            'user' => $user
        ]);
    }

    public function compte() {
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();
        // $clients = Client::latest()->get();
        return view('front.artisan.compte', [
            'user' => $user
        ]);
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
