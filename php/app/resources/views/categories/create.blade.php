@extends('layout.application.base')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Ajout catégorie</h4>
            <h6>Créer une catégorie</h6>
        </div>
    </div>
    <form class="needs-validation" novalidate action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">


                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Nom de la catégorie</label>
                            <input type="text" name="nom" id="nom" required />
                            <div class="invalid-feedback">
                                Ce champ est obligatoire
                            </div>
                            @error('nom')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="description"></textarea>

                            @error('description')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 m-auto d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-submit me-2">Créer</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-cancel">Cancel</a>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
