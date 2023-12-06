@extends('layout.application.base')

@section('title')
    Mes articles
@endsection
@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/">Tableau de bord</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Liste articles</a></li>
        </ol>
    </div>

    <div class="row">
        @forelse ($produits as $produit)
            <div class="col-xl-3 col-lg-6 col-sm-6">

                <div class="card">
                    <div class="card-header border-0">
                        <div class="action-dropdown">
                            <div class="dropdown ">
                                <div class="btn-link" data-bs-toggle="dropdown">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12.4999" cy="3.5" r="2.5" fill="#A5A5A5"></circle>
                                        <circle cx="12.4999" cy="11.5" r="2.5" fill="#A5A5A5"></circle>
                                        <circle cx="12.4999" cy="19.5" r="2.5" fill="#A5A5A5"></circle>
                                    </svg>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('produits.edit', $produit) }}">Delete</a>
                                    <a class="dropdown-item" href="{{ route('produits.edit', $produit) }}">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('produits.show', $produit) }}">
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="{{ asset('storage/produits/' . $produit->photo) }}"
                                        alt="">
                                </div>
                                <div class="new-arrival-content text-center mt-3">
                                    <h4><a href="#">{{ $produit->libelle }}</a></h4>
                                    <ul class="star-rating">
                                        <li>Quantité</li>

                                        <li>{{ $produit->quantite }}</li>

                                    </ul>

                                    <span class="price">{{ $produit->prixVente }} FCFA</span>
                                    <span class="price"></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        @empty

            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="new-arrival-product">

                            <div class="new-arrival-content text-center mt-3">
                                <h4>Aucun activle enregistré</h4>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <div class="progect-pagination d-flex justify-content-between align-items-center flex-wrap mt-3">
        <h4 class="mb-3">Affichage de {{ $produits->firstItem() }} à {{ $produits->lastItem() }} sur
            {{ $nombreTotalProduits }} products</h4>
        <ul class="pagination mb-3">
            @if ($produits->previousPageUrl())
                <li class="page-item page-indicator">
                    <a class="page-link" href="{{ $produits->previousPageUrl() }}">
                        <i class="fas fa-angle-double-left me-2"></i>Previous</a>
                </li>
            @endif

            <li class="page-item">
                @for ($i = 1; $i <= $produits->lastPage(); $i++)
                    <a class="{{ $produits->currentPage() == $i ? 'active' : '' }}"
                        href="{{ $produits->url($i) }}">{{ $i }}</a>
                @endfor
            </li>

            @if ($produits->nextPageUrl())
                <li class="page-item page-indicator">
                    <a class="page-link" href="{{ $produits->nextPageUrl() }}">Next<i
                            class="fas fa-angle-double-right ms-2"></i></a>
                </li>
            @endif
        </ul>
    </div>
@endsection
