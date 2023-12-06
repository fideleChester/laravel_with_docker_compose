@extends('layout.application.base')
@section('title')
    Article Création
@endsection
@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('produits.index') }}">Article</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0)">Création</a>
            </li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Enregister un article</h4>
                </div>
                <div class="card-body">

                    <form class="needs-validation" novalidate action="{{ route('produits.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">


                             
                                      
                                            <span class="text-danger">*</span>

               
                                        <input type="text" class="form-control input-default" name="libelle" id="libelle"
                                            value="{{ old('libelle') }}" placeholder="Designation" required>


                                </div>

                                <div class="mb-3 ">
                             
                                            <span class="text-danger">*</span>
                                        
                                        <input class="form-control input-default" type="number" name="prixVente" id="prixVente"
                                            value="{{ old('prixVente') }}" placeholder="Prix de vente" required />


                                    
                                </div>
                                <div class="mb-3 ">
                                    <div class="input-group mb-3 input-primary">
                                        <label class="input-group-text mb-0">Unité
                                            <span class="text-danger">*</span></label>
                                        <select class="me-sm-2 default-select form-control wide" name="unite"
                                            id="unite" required>

                                            <option data-display="Choisir une unité" value="">
                                                Choisir une unité
                                            </option>



                                            <option disabled> </option>
                                            <option value="piece">Piece</option>
                                            <option value="boite">Boite</option>
                                            <option value="kg">Kg</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Choisis une catégorie
                                        </div>

                                    </div>


                                </div>


                            </div>

                            <div class="col-xl-6">
                                <div class="mb-3 ">
                                    <div class="input-group mb-3 input-primary">
                                        <label class="input-group-text mb-0">Catégorie
                                            <span class="text-danger">*</span></label>
                                        <select class="me-sm-2 default-select form-control wide" name="categorie"
                                            id="categorie" required>

                                            <option data-display="Catégoris de l'article" value="">
                                                Choisis
                                            </option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <div class="invalid-feedback">
                                            Choisis une catégorie
                                        </div>
                                    </div>


                                </div>
                                {{-- <div class="mb-3 ">
                                    <div class="input-group mb-3  input-primary">
                                        <span class="input-group-text">Quantité
                                            <span class="text-danger">*</span>
                                        </span>
                                        <input class="form-control" type="number" name="quantite" id="quantite"
                                            value="{{ old('quantite') }}" required disabled/>

                                    </div>
                                </div> --}}


                                <div class="mb-3 ">

                                    <div class="input-group   input-primary">
                                        <span class="input-group-text">Description</span>
                                        <textarea class="form-control " name="description" id="description" value="{{ old('description') }}"
                                            placeholder="Entre la description de l'article"> </textarea>
                                    </div>
                                </div>





                            </div>
                            <div class="col-xl-12">
                                <div class="input-group mb-3">
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control" name="photo"
                                            id="photo" required>
                                    </div>
                                    <span class="input-group-text">Photo format jpeg, png, jpg, gif</span>

                                </div>

                                <div class="mb-3 row">
                                    <div class="col-lg-8 ms-auto">
                                        <button type="submit" class="btn btn-primary">
                                            Enregistrer
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('js/plugins-init/jquery.validate-init.js') }}"></script>
@endpush
