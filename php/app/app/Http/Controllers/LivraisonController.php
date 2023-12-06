<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use App\Models\Produit;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livraisons = Livraison::all();

        return view('livraisons.index', compact('livraisons'));
    }

    public function getProducts()
    {
        $produits = Produit::select('libelle', 'id')->get();

        // Convertir la collection en un tableau associatif
        $produitsArray = $produits->map(function ($produit) {
            return [
                'id' => $produit->id,
                'text' => $produit->libelle,
            ];
        })->all();

        return response()->json($produitsArray);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livraisons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'produit_id' => 'required|numeric',
            'frais' => 'required|numeric',
            'fournisseur_id' => 'required|numeric',
            'user_id' => 'required|numeric',

            'prixUnitaire' => 'required|numeric',
            'quantiteAchat' => 'required|numeric',
        ]);

        Livraison::create([
            'produit_id' => $request->produit_id,
            'frais' => $request->frais,
            'fournisseur_id' => $request->fournisseur_id,
            'user_id' => $request->user_id,
            'prixUnitaire' => $request->prixUnitaire,
            'quantiteAchat' => $request->quantiteAchat,
        ]);
        $produit = Produit::find($request->produit_id);
        $produit->quantite += $request->quantiteAchat;
        $produit->save();

        return to_route('livraisons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livraison $livraison)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livraison $livraison)
    {
        return view('livraisons.edit', compact('livraison'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livraison $livraison)
    {
        // dd($request);
        $request->validate([
           'produit_id' => 'required|numeric',
           'frais' => 'required|numeric',
           'fournisseur_id' => 'required|numeric',
           'user_id' => 'required|numeric',

           'prixUnitaire' => 'required|numeric',
           'quantiteAchat' => 'required|numeric',
        ]);
        $ancienneQuantite = $livraison->quantiteAchat;

        $livraison->produit_id = $request->produit_id;
        $livraison->frais = $request->frais;
        $livraison->fournisseur_id = $request->fournisseur_id;
        $livraison->user_id = $request->user_id;
        $livraison->prixUnitaire = $request->prixUnitaire;
        $livraison->quantiteAchat = $request->quantiteAchat;
        $livraison->save();

        $produit = Produit::find($request->produit_id);
        $produit->quantite += $request->quantiteAchat - $ancienneQuantite;
        $produit->save();

        return to_route('livraisons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livraison $livraison)
    {
    }
}
