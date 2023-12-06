@extends('layout.application.base')
@section('title')
    Article modification
@endsection
@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('produits.index') }}">Article</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0)">Détails</a>
            </li>
        </ol>
    </div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                        <!-- Tab panes -->

                        <img class="img-fluid" src="{{ asset('storage/produits/' . $produit->photo) }}" alt="">
                    </div>
                    <!--Tab slider End-->
                    <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                        <div class="product-detail-content">
                            <!--Product details-->
                            <div class="new-arrival-content pr">
                                <h4>{{ $produit->libelle }}</h4>
                                <div class="comment-review star-rating">

                                    <span class="review-text">( {{ $produit->quantite }} en stock) / </span><a
                                        class="product-review" href="{{ route('livraisons.create') }}"
                                       >Commander?</a>
                                </div>
                                <div class="d-table mb-2">
                                    <p class="price float-start d-block">{{ $benefices }} FCFA</p>
                                </div>
                                @if ($produit->quantite > 0)
                                    <p>Dispolible: <span class="item"> en stock <i
                                                class="fa fa-shopping-basket"></i></span>
                                    </p>
                                @else
                                    <p>Indisponible: <span class="item"> en stock <i
                                                class="fa fa-shopping-basket"></i></span>
                                    </p>
                                @endif
                                <p>Vendues : <span class="item">{{ $vendu }} à un prix total de
                                        {{ $totalVentes }} FCFA</span> </p>
                                <p>Acheté : <span class="item">{{ $vendu }} à un prix total de
                                        {{ $totalAchats }} FCFA</span> </p>
                                <p>Frais et dépenses: <span class="item">{{ $frais }} FCFA</span></p>
                        
                                <p class="text-content">{{ $produit->description }}</p>
                                <div class="d-flex align-items-end flex-wrap mt-4">
                              
                              
                                    <!--Quanatity End-->
                                    <div class="shopping-cart  mb-2 me-3">
                                        <a class="btn btn-primary" href="{{ route('produits.edit', $produit) }}"><i class="fas fa-pencil-alt me-2"></i>Modifier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
