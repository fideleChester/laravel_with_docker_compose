<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'photo',
        'unite',
        'description',
        // 'prixVente',
        'quantite',
        'categorie_id',
    ];
    protected $table = 'produits';

    public function detailCommande(): HasMany
    {
        return $this->hasMany(DetailCommande::class);
    }

    public function livraison(): HasMany
    {
        return $this->hasMany(Livraison::class);
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }
}
