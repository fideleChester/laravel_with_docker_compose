<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\DetailCommande;
use App\Models\Livraison;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $produits = Produit::simplePaginate(10);

        $produits = Produit::paginate(5); // Paginez par 10 produits par page
        $nombreTotalProduits = Produit::count();

        return view('produits.index', compact('produits', 'nombreTotalProduits'));
    }

    public function rechercherProduits(Request $request)
    {
        $term = $request->input('term'); // Récupérez le terme de recherche depuis la requête

        // Effectuez la recherche dans la base de données en fonction du terme
        $resultats = Product::where('libelle', 'like', "%$term%")->get();

        return response()->json($resultats);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();

        return view('produits.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            'libelle' => 'required|string|max:20|unique:produits,libelle',
            'description' => 'max:300',
            'unite' => 'in:piece,kg,boite',
            'categorie' => 'required',
            'prixVente' => 'required|numeric',
            // 'quantite' => 'required|numeric',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $request->libelle.'_'.uniqid().'.'.$photo->getClientOriginalExtension();
            $photo->storeAs('produits', $photoName, 'public');
        }

        Produit::create([
            'libelle' => $request->libelle,
            'description' => $request->description,
            'unite' => $request->unite,
            'categorie_id' => $request->categorie,
            'prixVente' => $request->prixVente,
            // 'quantite' => $request->quantite,
            'photo' => $photoName, // Enregistrez le nom du fichier photo dans la base de données.
        ]);

        return to_route('produits.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        // Initialise les variables à zéro
        $frais = 0;
        $vendu = 0;
        $totalVentes = 0;
        $totalAchats = 0;
        $benefices = 0;

        // Compte le nombre de ventes
        $ventes = DetailCommande::where('produit_id', $produit->id)->get();

        if ($ventes->isNotEmpty()) {
            // Calcule les valeurs de vente
            foreach ($ventes as $vente) {
                $frais += $vente->frais;
                $vendu += $vente->quantiteVendue;
                $totalVentes += $vente->quantiteVendue * $vente->prixVente;
            }

            // Calcule les achats en fonction du nombre de produits vendus
            $achats = Livraison::where('produit_id', $produit->id)
                ->take($vendu)
                ->get();

            foreach ($achats as $achat) {
                $frais += $achat->frais;
                $totalAchats += $achat->quantiteAchat * $achat->prixUnitaire;
            }

            // Calcule les bénéfices
            $benefices = $totalVentes - ($totalAchats + $frais);
        }

        return view('produits.show', compact('produit', 'vendu', 'frais', 'totalVentes', 'benefices', 'totalAchats'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::all();

        return view('produits.edit', compact('produit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'libelle' => 'string|max:20|unique:produits,libelle,'.$produit->id,
            'description' => 'max:300',
            'unite' => 'in:piece,kg,boite',
            'categorie' => 'required',
            'prixVente' => 'required|numeric',
        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $photo = $request->file('photo');
            $photoName = $produit->libelle.'_'.uniqid().'.'.$photo->getClientOriginalExtension();
            $photo->storeAs('produits', $photoName, 'public');
            // Assurez-vous de supprimer l'ancienne photo ici si nécessaire.
            // ex. Storage::disk('public')->delete('produits/' . $produit->photo);
            $produit->photo = $photoName;
        }

        $produit->libelle = $request->libelle;
        $produit->description = $request->description;
        $produit->unite = $request->unite;
        $produit->categorie_id = $request->categorie;
        $produit->prixVente = $request->prixVente;
        // Mettez à jour d'autres champs si nécessaire.

        $produit->save();

        return to_route('produits.edit', $produit);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
    }
}
