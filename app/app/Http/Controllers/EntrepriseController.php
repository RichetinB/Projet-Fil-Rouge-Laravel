<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Models\Personne;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Entreprise::all());
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
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'secteur_id' => 'nullable|exists:secteurs_activite,id',
            'code_postal' => 'required|string|max:10',
            'ville' => 'required|string|max:255',
            'chiffre_affaires' => 'required|numeric|min:0',
            'personnes_ids' => 'array',
            'personnes_ids.*' => 'exists:personnes,id',
        ]);

        $entreprise = Entreprise::create($validated);

        if (!empty($validated['personnes_ids'])) {
            Personne::whereIn('id', $validated['personnes_ids'])
                ->update(['entreprise_id' => $entreprise->id]);
        }

        return response()->json($entreprise->load('personnes'), 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $entreprise = Entreprise::with('secteur','personnes')->find($id);

        if (!$entreprise) {
            return response()->json(['message' => 'Entreprise non trouvée'], 404);
        }

        return response()->json($entreprise);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entreprise $entreprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $entreprise = Entreprise::find($id);

        if (!$entreprise) {
            return response()->json(['message' => 'Entreprise non trouvée'], 404);
        }

        $validated = $request->validate([
            'nom' => 'sometimes|string|max:255',
            'secteur_id' => 'sometimes|exists:secteurs_activite,id',
            'code_postal' => 'sometimes|string|max:10',
            'ville' => 'sometimes|string|max:255',
            'chiffre_affaires' => 'sometimes|numeric|min:0',
            'personnes_ids' => 'sometimes|array',
            'personnes_ids.*' => 'exists:personnes,id',
        ]);

        $entreprise->update($validated);

        if (!empty($validated['personnes_ids'])) {
            Personne::where('entreprise_id', $entreprise->id)
                ->whereNotIn('id', $validated['personnes_ids'])
                ->update(['entreprise_id' => null]);

            Personne::whereIn('id', $validated['personnes_ids'])
                ->update(['entreprise_id' => $entreprise->id]);
        }

        return response()->json($entreprise->load('personnes'));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $entreprise = Entreprise::find($id);

        if (!$entreprise) {
            return response()->json(['message' => 'Entreprise non trouvée'], 404);
        }

        Personne::where('entreprise_id', $entreprise->id)->update(['entreprise_id' => null]);

        $entreprise->delete();

        return response()->json(['message' => 'Entreprise supprimée avec succès']);
    }

}
