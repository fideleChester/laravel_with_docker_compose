@extends('layout.application.base')
@section('title')
    Vente Création
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('livraisons.index') }}">Ventes</a>
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
                        <h4 class="card-title">Enregister une ventes</h4>
                    </div>
                    <div class="card-body">

                        <form class="needs-validation" novalidate action="{{ route('commandes.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" value="1">

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">


                                        <div class="input-group mb-3 ">
                                            <label class="form-label">Article


                                            </label>
                                            {{-- <input type="text" class="form-control" name="produit_id" id="produit_id"
                                                value="{{ old('produit_id') }}" required> --}}
                                            <select class="form-control" id="produit_id" name="produit_id"
                                                id="produit_id"></select>

                                        </div>

                                    </div>





                                </div>


                                <div class="col-xl-6">

                                    <div class="mb-3 ">


                                        <input class="form-control input-default" type="number" name="quantiteVendue"
                                            id="quantiteVendue" placeholder="Quantité" value="{{ old('quantiteVendue') }}"
                                            required />

                                    </div>

                                    <div class="mb-3 ">


                                        <input class="form-control input-default" type="number" name="frais"
                                            id="frais" value="{{ old('frais') }}" placeholder="Frais" required />


                                    </div>







                                </div>
                                <div class="col-xl-12">


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
    </div>
@endsection
@push('script')
    <script src="{{ asset('js/plugins-init/jquery.validate-init.js') }}"></script>

    <script>
        $(document).ready(function() {

            var donnes = [];

            fetch('/get-products')
                .then(response => response.json()) // Convertir la réponse en JSON
                .then(produits => {
                    if (Array.isArray(produits)) {
                        // Adapter le tableau de produits reçu pour correspondre au format souhaité
                        var newData = produits.map(produit => ({
                            id: produit.id,
                            text: produit.text
                        }));

                        // Ajouter les nouvelles données à votre tableau data
                        donnes = donnes.concat(newData);

                        // Maintenant, data contient les données initiales plus les nouvelles données de la requête Ajax
                        console.log(donnes);

                        // Créez la liste déroulante Select2 une fois que les données sont disponibles
                        $('#produit_id').select2({
                            data: donnes,
                            templateSelection: function(data, container) {
                                // data contient l'objet sélectionné (avec id et text)
                                // container est l'élément HTML où le texte sera affiché

                                // Vous pouvez mettre en forme le texte sélectionné comme vous le souhaitez ici.
                                // Dans cet exemple, nous affichons simplement le texte.

                                // Cependant, nous allons stocker l'ID dans l'attribut "data-id"
                                $(container).data('id', data.id);

                                return data.text;
                            }
                        });
                    } else {
                        console.error('La réponse de l\'API ne contient pas un tableau de produits.');
                    }
                })
                .catch(error => {
                    console.error('Une erreur s\'est produite lors de la requête Ajax :', error);
                });



        });
    </script>
@endpush
