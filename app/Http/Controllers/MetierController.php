<?php

namespace App\Http\Controllers;

use App\Models\Metier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MetierController extends Controller
{
    
    public function index() {
        $metiers = Metier::orderBy('metier', 'asc')->get();
        return view('front.admin.metiers.liste', compact('metiers'));
    }

    public function create(Request $request) {

        $validator = Validator::make($request->all(),[
            'metier' => 'required|unique:metiers,metier',
        ], [
            'metier.required' => 'Le champ métier est obligatoire.',
            'metier.unique' => 'Le métier a déjà été pris.',
        ]);


        if ($validator->passes()) {

            $metier = new Metier();
            $metier->metier = $request->metier;
            $metier->description_metier = $request->description_metier;
            $metier->save();

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
    public function edit(Request $request) {
        // dd($request->description);


        $validator = Validator::make($request->all(),[
            'metier' => 'required|unique:metiers,metier,' . $request->metier_id,
        ], [
            'metier.required' => 'Le champ métier est obligatoire.',
        ]);


        if ($validator->passes()) {

            $metier = Metier::find($request->metier_id);
            $metier->metier = $request->metier;
            $metier->description_metier = $request->description_metier;
            $metier->save();

            session()->flash('success','Métier modifié avec succès.');

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

        $metier = Metier::find($id);

        if ($metier == null) {
            session()->flash('error','Metier introuvable.');
            return response()->json([
                'status' => false                
            ]);
        }

        $metier->delete();
        session()->flash('success','Métier supprimé avec succès.');
        return response()->json([
            'status' => true                
        ]);
    }
}
