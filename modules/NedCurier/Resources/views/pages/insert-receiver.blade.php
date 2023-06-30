<?php
/*
 * api-ned | insert-receiver.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/29/2023 12:50 PM
*/
?>

@extends('nedcurier::layouts.master')
@section('content')
    <main id="main">

        <section class=" breadcumb" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}" ><span class="breadcumb-home">Home |</span></a> <span class="breadcumb-source">Creare Destinatar</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="page-content" class="page-content " >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  pt-lg-0 content">
                        <h2 class="page-content-title">Creare Destinatar</h2>
                        <section class="description page-content-global">
                            <section id="page-content" class="page-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="card mt-5">
                                            <div class="card-body">
                                                <h5 class="card-title">Formular Profil Companie</h5>
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="companyName" class="form-label">Nume *:</label>
                                                        <input type="text" class="form-control" id="companyName" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="county" class="form-label">Judet *:</label>
                                                        <input type="text" class="form-control" id="county" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="city" class="form-label">Localitate *:</label>
                                                        <select class="form-select" id="city" required>
                                                            <option value="">Selecteaza</option>
                                                            <!-- Opțiuni pentru localități -->
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="street" class="form-label">Strada *:</label>
                                                        <input type="text" class="form-control" id="street" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="number" class="form-label">Numarul *:</label>
                                                        <input type="text" class="form-control" id="number" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="postalCode" class="form-label">Cod Postal *:</label>
                                                        <input type="text" class="form-control" id="postalCode" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="contact" class="form-label">Contact *:</label>
                                                        <input type="text" class="form-control" id="contact" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Telefon *:</label>
                                                        <input type="text" class="form-control" id="phone" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email:</label>
                                                        <input type="email" class="form-control" id="email">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Salvează</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </section>

                        <img class="page-content-sign" src="{{ asset('modules/nedcurier/img/ned-sign.png') }}">
                    </div>
                </div>
            </div>

        </section>


    </main>
    <!-- End #main -->
@endsection

