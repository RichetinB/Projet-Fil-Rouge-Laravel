<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personnes = Personne::with('civilite')
            ->select('id', 'civilite_id', 'nom', 'prenom')
            ->get();
        return response()->json($personnes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'civilite_id' => 'required|exists:civilites,id',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:personnes,email',
            'telephone' => 'nullable|string|max:10',
            'localisation_id' => 'nullable|exists:localisations,id',
            'entreprise_id' => 'nullable|exists:entreprises,id',
        ]);

        $personne = Personne::create($request->all());

        return response()->json($personne, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personne = Personne::with('civilite', 'localisation', 'entreprise')->find($id);

        if (!$personne) {
            return response()->json(['message' => 'Personne non trouvée'], 404);
        }

        return response()->json($personne);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personne $personne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $personne = Personne::find($id);
        if (!$personne) {
            return response()->json(['message' => 'Personne non trouvée'], 404);
        }
        $validated = $request->validate([
            'civilite_id' => 'nullable|exists:civilites,id',
            'nom' => 'sometimes|string|max:255',
            'prenom' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:personnes,email,' . $personne->id,
            'telephone' => 'sometimes|string|max:20',
            'entreprise_id' => 'nullable|exists:entreprises,id',
            'localisation_id' => 'nullable|exists:localisations,id',
        ]);
        $personne->update($validated);
        
        return response()->json($personne->load('civilite', 'entreprise', 'localisation'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $personne = Personne::find($id);
        if (!$personne) {
            return response()->json(['message' => 'Personne non trouvée'], 404);
        }
        $personne->delete();
        return response()->json(['message' => 'Personne supprimée avec succès']);
    }

}
