@extends('layout.application.base')
@section('style')
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection
@section('title')
    Mes ventes
@endsection
@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/">Tableau de bord</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Liste ventes</a></li>
        </ol>
    </div>



    <div class="row">


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Listes des ventes</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display w-100">
                            <thead>

                                <tr>
                                    <th></th>
                                    <th>Article</th>

                                    <th>Quantité</th>
                                    <th>Frais</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @forelse ($detailCommandes as $detailCommande)
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                src="{{ asset('storage/produits/' . $detailCommande->produit->photo) }}"
                                                alt=""></td>
                                        <td>{{ $detailCommande->produit->libelle }}</td>

                                        <td>{{ $detailCommande->quantiteVendue }}</td>

                                        <td>{{ $detailCommande->commande->frais }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('commandes.edit', $detailCommande) }}"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('script')
    <!-- Datatable -->

    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
@endpush
