<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    

    public function index() {
        $clients = Client::latest()->get();
        return view('front.admin.clients.liste', compact('clients'));
    }

    public function artisans() {
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();
        $clients = Client::latest()->get();
        return view('front.client.artisan', [
            'user' => $user
        ]);
    }

    public function compte() {
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();
        // $clients = Client::latest()->get();
        return view('front.client.compte', [
            'user' => $user
        ]);
    }





}
