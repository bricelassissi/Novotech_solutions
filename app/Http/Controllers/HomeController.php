<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use App\Models\Metier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    public function index() {
        $metiers = Metier::orderBy('metier', 'asc')->get();
        $artisans = Artisan::orderBy('created_at','DESC')
                        ->with('user')
                        ->with('metier')
                        ->take(6)->get();
        return view('front.home', compact('metiers','artisans'));
    }


    public function quiSommesNous() {

        return view('front.qui-sommes-nous');


    }
}
