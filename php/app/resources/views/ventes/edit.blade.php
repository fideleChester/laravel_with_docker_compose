@extends('layout.application.base')
@section('title')
    Vente modification
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('livraisons.index') }}">Vente</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Modification</a>
                </li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier une vente</h4>
                    </div>
                    <div class="card-body">

                        <form class="needs-validation" novalidate action="{{ route('commandes.update', $detailCommande) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="user_id" id="user_id" value="{{ $commande->user_id }}">

                            <input type="hidden" name="produit_id" id="produit_id" value="{{ $commande->produit_id }}">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">


                                        <div class="input-group mb-3 ">
                                            <label class="form-label">Article vendu:
                                                <strong>{{ $detailCommande->produit->libelle }}
                                                </strong>

                                            </label>



                                        </div>

                                    </div>




                                </div>


                                <div class="col-xl-6">

                                    <div class="mb-3 ">

                                        <label for="quantiteVendue" class="form-label"> Quantité</label>
                                        <input class="form-control input-default" type="number" name="quantiteVendue"
                                            id="quantiteVendue" placeholder="Quantité"
                                            value="{{ old('quantiteVendue', $detailCommande->quantiteVendue) }}"
                                            required />

                                    </div>

                                    <div class="mb-3 ">

                                        <label for="frais" class="form-label"> Frais</label>
                                        <input class="form-control input-default" type="number" name="frais"
                                            id="frais" value="{{ old('frais', $commande->frais) }}" placeholder="Frais"
                                            required />


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
@endpush
