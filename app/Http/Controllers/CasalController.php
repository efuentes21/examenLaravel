<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casal;
use App\Models\Ciutat;
use Carbon\Carbon;

class CasalController extends Controller
{
    public function index()
    {
        if(auth()->check()){
            $casals = Casal::all();
            return view("home", compact("casals"));
        } else {
            return redirect()->route('login.show')->with('errors', ['Log in first to access']);
        }
    }

    public function new()
    {
        $ciutats = Ciutat::all();
        return view("cruds.create-casals", compact("ciutats"));
    }

    public function create(Request $request) 
    {
        try{
            // Register credentials validation
            $validatedData = $request->validate([
                "nom" => "required|string|max:255",
                "data_inici" => "required|date",
                "data_final" => "required|date",
                "n_places" => "required|numeric",
                "ciutat_id" => "required|numeric"
            ]);
    
            if(Carbon::parse($validatedData["data_inici"])->gt(Carbon::parse($validatedData["data_final"]))){
                return redirect()->back()->with("errors", ["La data final ha de ser després que la de inici"]);
            } else {
                Casal::create($validatedData);

                $casals = Casal::all();
                return redirect()->route("home", compact("casals"));
            }
            
    
        } catch (\Exception $e) {
            return redirect()->back()->with("errors", [$e->getMessage()]);
        }

    }

    public function edit(Casal $casal)
    {
        $ciutats = Ciutat::all();
        return view("cruds.edit-casals", compact("casal", "ciutats"));
    }

    public function update(Request $request, String $id) 
    {
        try{
            $casal = Casal::findOrFail($id);
            // Register credentials validation
            $request->validate([
                "nom" => "required|string|max:255",
                "data_inici" => "required|date",
                "data_final" => "required|date",
                "n_places" => "required|numeric",
                "ciutat_id" => "required|numeric"
            ]);
    
            if(Carbon::parse($request->data_inici)->gt(Carbon::parse($request->data_final))){
                return redirect()->back()->with("errors", ["La data final ha de ser després que la de inici"]);
            } else {
                $casal->nom = $request->nom;
                $casal->data_inici = $request->data_inici;
                $casal->data_final = $request->data_final;
                $casal->n_places = $request->n_places;
                $casal->ciutat_id = $request->ciutat_id;
                $casal->update();

                $casals = Casal::all();
                return redirect()->route("home", compact("casals"));
            }
            
    
        } catch (\Exception $e) {
            return redirect()->back()->with("errors", [$e->getMessage()]);
        }

    }

    public function destroy(Casal $casal){
        $casal->delete();
        
        $casals = Casal::all();
        return redirect()->route("home", compact("casals"));
    }
}
