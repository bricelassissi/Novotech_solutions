<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PubliciteController extends Controller
{
    public function index() {
        return view('front.admin.publicite.liste');
    }
}
