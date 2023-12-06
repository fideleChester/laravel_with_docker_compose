@extends('layout.application.base')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Liste de mes ccatégories d'articles</h4>
            <h6>Gere les articles</h6>
        </div>
        <div class="page-btn">
            <a href="{{ route('categories.create') }}" class="btn btn-added"><img
                    src="{{ asset('assets/img/icons/plus.svg') }}" alt="img" class="me-1" />Ajouter une nouvelle
                catégorie</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-path">
                        <a class="btn btn-filter" id="filter_search">
                            <img src="{{ asset('assets/img/icons/filter.svg') }}" alt="img" />
                            <span><img src="assets/img/icons/closes.svg" alt="img" /></span>
                        </a>
                    </div>
                    <div class="search-input">
                        <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img" /></a>
                    </div>
                </div>
                <div class="wordset">
                    <ul>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                    src="{{ asset('assets/img/icons/pdf.svg') }}" alt="pdf" /></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                    src="{{ asset('assets/img/icons/excel.svg') }}" alt="excel" /></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                    src="{{ asset('assets/img/icons/printer.svg') }}" alt="print" /></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card mb-0" id="filter_inputs">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Product</option>
                                            <option>Macbook pro</option>
                                            <option>Orange</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Category</option>
                                            <option>Computers</option>
                                            <option>Fruits</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Sub Category</option>
                                            <option>Computer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Brand</option>
                                            <option>N/D</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Price</option>
                                            <option>150.00</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg"
                                                alt="img" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th>
                                <label class="checkboxs">
                                    <input type="checkbox" id="select_all" />
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th>Catégorie</th>
                            
                            <th>Description</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $categorie)
                            
                       
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox" class="ligne" />
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td class="productimgname">
                                <a href="javascript:void(0);" class="product-img">
                                    <img src="{{ asset('assets/img/product/noimage.png') }}" alt="category" />
                                </a>
                                <a href="javascript:void(0);">{{ $categorie->nom }}</a>
                            </td>
                            
                            <td>{{ $categorie->description === null ? 'Pas de description':$categorie->description }}</td>
                            
                            <td>
                                <a class="me-3" href="editcategory.html">
                                    <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img" />
                                </a>
                                <a class="me-3 confirm-text" href="javascript:void(0);">
                                    <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img" />
                                </a>
                            </td>
                        </tr>
                     
                        @empty
                        <tr>
                            <td colspan="4"> Aucune Catégorie enregistré</td>
                        </tr>
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
