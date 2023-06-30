<?php
/*
 * api-ned | account-details.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/29/2023 11:38 AM
*/
?>

@extends('nedcurier::layouts.master')
@section('content')
    <main id="main">

        <section class=" breadcumb" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}" ><span class="breadcumb-home">Home |</span></a> <span class="breadcumb-source">Detalii cont</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="page-content" class="page-content " >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  pt-lg-0 content">
                        <h2 class="page-content-title">Detalii cont</h2>
                        <div class="description page-content-global">

                            <!-- ======= Profile Section ======= -->
                            <section id="page-content" class="page-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="card mt-5">
                                            <div class="card-body">
                                                <h5 class="card-title">Profil Companie</h5>
                                                <form>

                                                    <div class="mb-3">
                                                        <label for="companyImage" class="form-label">Poza de profil:</label>
                                                        <input type="file" class="form-control" id="companyImage">
                                                    </div>
                                                    <div class="mb-3">
                                                        <img src="default-profile-image.jpg" alt="Poza de profil" class="img-thumbnail">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="companyName" class="form-label">Nume Companie:</label>
                                                        <input type="text" class="form-control" id="companyName">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="companyCUI" class="form-label">Companie CUI/CIF:</label>
                                                        <input type="text" class="form-control" id="companyCUI">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="companyWebsite" class="form-label">Companie site:</label>
                                                        <input type="text" class="form-control" id="companyWebsite">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="companyEmail" class="form-label">Companie email:</label>
                                                        <input type="email" class="form-control" id="companyEmail">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="companyActivity" class="form-label">Companie activitate:</label>
                                                        <input type="text" class="form-control" id="companyActivity">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="companyCountry" class="form-label">Companie țară:</label>
                                                        <input type="text" class="form-control" id="companyCountry">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="companyCounty" class="form-label">Companie județ:</label>
                                                        <input type="text" class="form-control" id="companyCounty">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="companyCity" class="form-label">Companie oraș:</label>
                                                        <input type="text" class="form-control" id="companyCity">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="postalCode" class="form-label">Cod Postal:</label>
                                                        <input type="text" class="form-control" id="postalCode">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="companyAddress" class="form-label">Companie adresă:</label>
                                                        <input type="text" class="form-control" id="companyAddress">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="companyPhone" class="form-label">Companie telefon:</label>
                                                        <input type="text" class="form-control" id="companyPhone">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="companyFax" class="form-label">Companie fax:</label>
                                                        <input type="text" class="form-control" id="companyFax">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="createdBy" class="form-label">Creat de:</label>
                                                        <input type="text" class="form-control" id="createdBy">
                                                    </div>
                                                    <button type="submit" class="btn-get-started black">Salvează</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                    </section>
                            <!-- End Profile Section -->

                            <!-- ======= Sender Section ======= -->
                            <section id="page-content" class="page-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 d-flex justify-flex-end">
                                            <img
                                                src="{{ asset('modules/nedcurier/img/curierat.png') }}"
                                                class="img-fluid advice-img"
                                                alt=""
                                            />
                                        </div>
                                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                                            <h2>Expeditori</h2>
                                            <p class="description">
                                                Pentru a urmari lista de expeditori...
                                            </p>
                                            <a href="{{ route('page.sender_customer_list') }}" class="btn-get-started black">Expeditori</a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End Sender Section -->


                            <!-- ======= Receiver Section ======= -->
                            <section id="page-content" class="page-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                                            <h2>Destinatari</h2>
                                            <p class="description">
                                                Pentru a urmari lista de destinatari...
                                            </p>
                                            <a href="{{ route('page.receiver_customer_list') }}" class="btn-get-started black">Destinatari</a>
                                        </div>
                                        <div class="col-lg-6 d-flex justify-flex-end">
                                            <img
                                                src="{{ asset('modules/nedcurier/img/curierat.png') }}"
                                                class="img-fluid advice-img"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End Receiver Section -->

                        </div>
                        <img class="page-content-sign" src="{{ asset('modules/nedcurier/img/ned-sign.png') }}">
                    </div>
                </div>
            </div>
        </section>


    </main>
    <!-- End #main -->
@endsection

