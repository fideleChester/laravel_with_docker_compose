<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\DetailCommande;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailCommandes = DetailCommande::all();

        return view('ventes.index', compact('detailCommandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ventes.create');
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

           'user_id' => 'required|numeric',

           'quantiteVendue' => 'required|numeric',
        ]);

        $commande = Commande::create([
              'frais' => $request->frais,
              'user_id' => $request->user_id,
          ]);
        $details = DetailCommande::create([
            'produit_id' => $request->produit_id,

            'commande_id' => $commande->id,

            'quantiteVendue' => $request->quantiteAchat,
        ]);

        $produit = Produit::find($request->produit_id);
        $produit->quantite -= $request->quantiteAchat;
        $produit->save();
        $commande->frais = $details->quantiteVendue * $produit->prixVente;
        $commande->save();

        return to_route('cammandes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailCommande $detailCommande)
    {
        $commande = Commande::find($detailCommande->commande_id);

        return view('ventes.edit', compact('detailCommande', 'commande'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailCommande $detailCommande)
    {
        // dd($request);
        $request->validate([
          'produit_id' => 'required|numeric',
          'frais' => 'required|numeric',

          'user_id' => 'required|numeric',

          'quantiteVendue' => 'required|numeric',
             ]);
        $commande = Commande::find($detailCommande->commande_id);
        $commande->frais = $request->frais;

        $commande->user_id = $request->user_id;
        $commande->save();
        $ancienneQuantite = $detailCommande->quantiteVendue;
        $detailCommande->produit_id = $request->produit_id;
        $detailCommande->quantiteVendue = $request->quantiteVendue;
        $detailCommande->save();
        $produit = Produit::find($request->produit_id);
        $produit->quantite -= $request->quantiteVendue - $ancienneQuantite;
        $produit->save();

        return to_route('commandes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
    }
}
