<?php
/*
 * webdirect | shop-page.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 5/16/2023 11:31 AM
*/
?>
@extends('fresciastore::layouts.master')
@section("styles")
    <link rel="stylesheet" href="{{ asset('modules/fresciastore/css/shop/shop-page.min.css') }}">
@endsection
@section("content")
    <section class="sn_intro_text ">
        <div class="sn_intro_text_bg"
             style="background-image: url('{{ asset('modules/fresciastore/images/gift-card-header.jpg') }}');"></div>
        <div class="container pt-8 pt-lg-1 pb-6 sn_intro_text_content">
            <h1 class="display-4">Magazin Frescia</h1>
        </div>
    </section>
    <section class="sn_breadcrumb ">
        <div class="container">
            <nav id="breadcrumbs" class="main-breadcrumbs">
                <span>
                    <span>
                        <a href="{{ route('shop.page') }}">Acasa</a>
                        <span class="separator"></span>
                        <span class="breadcrumb_last" aria-current="page">
                            Magazin Frescia
                        </span>

                    </span>
                </span>
            </nav>
        </div>
    </section>
    <section class="page-section with-sidebar">
        <form action="{{ url()->full() }}" method="POST" id="shop-form">
            @csrf
            <div class="container">
            <div class="row">
                <aside class="col-md-3 sidebar" id="sidebar">
                    <!-- widget search -->
                    <div class="widget">
                        <div class="widget-search">
                            <input class="form-control"
                                   type="text"
                                   placeholder="Cauta un produs"
                                   name="Product[name]"
                                   value="{{  request('Product.name') }}"
                                   onkeypress="if(event.keyCode==13) {this.form.submit()}">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <!-- widget shop categories -->
                    <div class="widget shop-categories">
                        <h4 class="widget-title">TOATE CATEGORIILE</h4>
                        <div class="widget-content">
                            <ul>
                                @include('fresciastore::shop.shop-category' , ['nodes' => $categories])
                            </ul>
                        </div>
                    </div>
                    <!-- /widget price filter -->
                    <div class="widget widget-filter-price">

                    </div>
                </aside>
                <div id="content" class="col-md-9 content">
                    <!-- shop-sorting -->
                    <div class="shop-sorting">
                        <div class="row">
                            <div class="col-md-6 col-xs-6 col-xl-6">
                                <div class="filter-container">
                                    <div class="filter-item">
                                        <label for="stock-filter">Stoc produs:</label>
                                        <select id="stock-filter" name="Product[stock-filter]" onchange="this.form.submit()">
                                            <option value="" {{ old('Product.stock-filter', request('Product.stock-filter')) == '' ? 'selected' : '' }}>Toate</option>
                                            <option value="in-stoc" {{ old('stock-filter', request('Product.stock-filter')) == 'in-stoc' ? 'selected' : '' }}>In stoc</option>
                                            <option value="fara-stoc" {{ old('Product.stock-filter', request('Product.stock-filter')) == 'fara-stoc' ? 'selected' : '' }}>Fara stoc</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6 col-xl-6">
                                <div class="filter-container right">
                                    <div class="filter-item">
                                        <label for="max-page-filter">Arata pe pagina:</label>
                                        <select id="max-page-filter" name="Product[max-page-filter]" onchange="this.form.submit()">
                                            <option value="12" {{ old('Product.max-page-filter', request('Product.max-page-filter')) == 12 ? 'selected' : '' }}>12</option>
                                            <option value="24" {{ old('Product.max-page-filter', request('Product.max-page-filter')) == 24 ? 'selected' : '' }}>24</option>
                                            <option value="36" {{ old('Product.max-page-filter', request('Product.max-page-filter')) == 36 ? 'selected' : '' }}>36</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /shop-sorting -->
                    <!-- Products grid -->
                    <div class="row products grid">
                        @foreach($products as $product)
                            @include('fresciastore::shop.shop-products-grid' , ['product' => $product])
                        @endforeach
                    </div>
                    <!-- /Products grid -->
                    <!-- Pagination -->
                    <div class="container pagination-wrapper">
                        {{ $products->links('fresciastore::shop.shop-products-pagination') }}
                    </div>
                    <!-- /Pagination -->
                </div>
            </div>
        </div>
        </form>
    </section>
@endsection
@section("scripts")
    <script src="{{ asset('modules/fresciastore/js/shop/shop-page.js') }}"></script>
@endsection
