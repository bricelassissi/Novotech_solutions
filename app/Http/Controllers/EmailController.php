<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use \Illuminate\Http\RedirectResponse;

class EmailController extends Controller
{

    public function pageEmail(){
        return view("front.contact-us");
    }
    public function index(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'telephone' => 'required|max:10',
            'email' => 'required|email',
            'objet' => 'required|max:255',
            'message' => 'required|max:255'
        ]);

        if(count($validated) < 5){
            return $this->redirection();
        }

        $nameAndSurname = $request->input("name");
        $phone = $request->input("telephone");
        $email = $request->input("email");
        $objet = $request->input("objet");
        $message = $request->input("message");

        $content = [
            "emails" => [$email],
            "phone" => $phone,
            "nameAndSurname" => $nameAndSurname,
            "object" => $objet,
            "message" => $message
        ];

        Mail::to($content["emails"])
            ->queue(new ContactUs($content));

        return $this->redirection()->with('success', 'Votre email a été envoyé avec succès!');
    }

    private function redirection(){
        return redirect()
        ->back()
        ->withFragment("#contact");
        }
    }
