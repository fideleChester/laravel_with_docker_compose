<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout.application.base');
});
// Produits
Route::get('mes_articles', [ProduitController::class, 'index'])->name('produits.index');
Route::get('mes_articles/ajout', [ProduitController::class, 'create'])->name('produits.create');
Route::post('mes_articles/ajout', [ProduitController::class, 'store'])->name('produits.store');
Route::get('mon_acrticle/modifier/{produit}', [ProduitController::class, 'edit'])->name('produits.edit');
Route::get('mon_acrticle/details/{produit}', [ProduitController::class, 'show'])->name('produits.show');
Route::patch('mon_acrticle/update/{produit}', [ProduitController::class, 'update'])->name('produits.update');

// Catégories
Route::get('categorie_articles', [CategorieController::class,  'index'])->name('categories.index');
Route::get('categorie_articles/ajout', [CategorieController::class,  'create'])->name('categories.create');
Route::post('categorie_articles/ajout', [CategorieController::class,  'store'])->name('categories.store');

// Livraison
Route::get('commande', [LivraisonController::class,   'index'])->name('livraisons.index');
Route::get('commande/ajout', [LivraisonController::class,   'create'])->name('livraisons.create');
Route::post('commande/ajout', [LivraisonController::class,   'store'])->name('livraisons.store');
Route::patch('commande/modifier/{livraison}', [LivraisonController::class, 'update'])->name('livraisons.update');
Route::get('commande/edit/{livraison}', [LivraisonController::class, 'edit'])->name('livraisons.edit');

// Commandes et details commandes
Route::get('ventes', [CommandeController::class,    'index'])->name('commandes.index');
Route::get('ventes/ajout', [CommandeController::class,    'create'])->name('commandes.create');
Route::post('ventes/ajout', [CommandeController::class,    'store'])->name('commandes.store');
Route::patch('ventes/modifier/{detailCommande}', [CommandeController::class,  'update'])->name('commandes.update');
Route::get('ventes/edit/{detailCommande}', [CommandeController::class,  'edit'])->name('commandes.edit');

// Obtenir Liste produits
Route::get('/get-products', [LivraisonController::class, 'getProducts']);
