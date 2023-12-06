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
                    <form action="{{ route('produits.update', $produit) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">

                            <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                <!-- Tab panes -->




                                <img class="img-fluid" src="{{ asset('storage/produits/' . $produit->photo) }}"
                                    alt="">
                                <div class="input-group mb-3">
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control" name="photo"
                                            id="photo" >
                                    </div>
                                    <span class="input-group-text">Photo format jpeg, png, jpg, gif</span>

                                </div>


                            </div>
                            <!--Tab slider End-->
                            <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                <div class="product-detail-content">

                                    <!--Product details-->
                                    <div class="new-arrival-content pr">


                                        <label class="form-label">Désignation


                                        </label>
                                        <input type="text" class="form-control " name="libelle" id="libelle"
                                            value="{{ old('libelle', $produit->libelle) }}" placeholder="Designation"
                                            required>



                                        <label class="form-label">Prix de vente

                                        </label>
                                        <input class="form-control" type="number" name="prixVente" id="prixVente"
                                            value="{{ old('prixVente', $produit->prixVente) }}" required />



                                        <div class="input-group mb-3 input-primary">
                                            <label class="input-group-text mb-0">Unité
                                                <span class="text-danger">*</span></label>
                                            <select class="me-sm-2 default-select form-control wide" name="unite"
                                                id="unite" required>





                                                <option disabled> </option>
                                                <option value="piece" {{ $produit->unite == 'piece' ? 'selected' : '' }}>
                                                    Piece</option>
                                                <option value="boite" {{ $produit->unite == 'boite' ? 'selected' : '' }}>
                                                    Boite</option>
                                                <option value="kg" {{ $produit->unite == 'kg' ? 'selected' : '' }}>Kg
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Choisis une catégorie
                                            </div>

                                        </div>

                                        <div class="input-group mb-3 input-primary">
                                            <label class="input-group-text mb-0">Catégorie
                                                <span class="text-danger">*</span></label>
                                            <select class="me-sm-2 default-select form-control wide" name="categorie"
                                                id="categorie" required>

                                                <option data-display="Catégoris de l'article" value="">
                                                    Choisis
                                                </option>
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id }}"
                                                        {{ $produit->categorie->nom == $categorie->nom ? 'selected' : '' }}>
                                                        {{ $categorie->nom }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <div class="invalid-feedback">
                                                Choisis une catégorie
                                            </div>
                                        </div>
                                        {{-- <div class="input-group mb-3  input-primary">
                                            <span class="input-group-text">Quantité
                                                <span class="text-danger">*</span>
                                            </span>
                                            <input class="form-control" type="number" name="quantite" id="quantite"
                                                value="{{ old('quantite', $produit->quantite) }}" required disabled />

                                        </div> --}}
                                        <div class="mb-3 ">

                                            <div class="input-group   input-primary">
                                                <span class="input-group-text">Description</span>
                                                <textarea class="form-control" name="description" id="description" placeholder="Entre la description de l'article"
                                                    rows="10"> {{ old('description', $produit->description) }}</textarea>
                                            </div>


                                        </div>
                                        <div class="d-flex align-items-end justify-content-end mt-4">


                                            <!--Quanatity End-->
                                            <div class="shopping-cart  mb-2 me-3">
                                                <button type="submit" class="btn btn-primary">
                                                    Enregistrer

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    @endsection
