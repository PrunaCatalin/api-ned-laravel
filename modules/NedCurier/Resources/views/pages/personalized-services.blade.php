<?php
/*
 * api-ned | personalized-services.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 9:07 PM
*/
?>


@extends('nedcurier::layouts.master')
@section('content')
<main id="main">

    <section class=" breadcumb" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-lg-0 content">
                    <a href="{{ route('page.homepage') }}" ><span class="breadcumb-home">Home |</span></a> <span class="breadcumb-source">Despre noi</span>
                </div>
            </div>
        </div>
    </section>

    <section id="page-content" class="page-content " >
        <div class="container">
            <div class="row">
                <div class="col-lg-12  pt-lg-0 content">
                    <h2 class="page-content-title">Personalized Services</h2>
                    <p class="description page-content-global">
                        Ned (Network Express Deliveries) este o companie de curierat înființată recent în România, care se angajează să ofere servicii rapide și eficiente de livrare a coletelor în toată țara. Ned își propune să fie o soluție fiabilă pentru clienții săi, indiferent de mărimea sau destinația coletelor.
                        <br><br>
                        Cu o rețea vastă de centre de distribuție și parteneriate cu transportatori de încredere, Ned are capacitățile necesare pentru a oferi livrare rapidă, sigură și convenabilă. Indiferent dacă doriți să trimiteți un pachet la o adresă din orașul dvs. sau într-un colț îndepărtat al țării, Ned se angajează să ofere o experiență de livrare fără probleme și să răspundă nevoilor dumneavoastră individuale.
                        <br><br>
                        Serviciile Ned includ livrarea la domiciliu sau la birou, servicii de colectare a coletelor, urmărirea coletelor în timp real și multe altele. Echipa Ned este dedicată să ofere o experiență de livrare de calitate, iar clienții săi pot avea încredere că coletele lor vor fi livrate la timp și în condiții excelente.
                        <br><br>
                        În concluzie, Ned este o alegere excelentă pentru cei care caută un curier de încredere, cu o rețea extinsă de distribuție, o experiență de livrare fără probleme și servicii personalizate pentru nevoile individuale ale clienților.
                    </p>

                    <img class="page-content-sign" src="{{ asset('modules/nedcurier/img/ned-sign.png') }}">
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Fats delivery Section ======= -->
    <section id="page-content" class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h2>Curierat Rapid</h2>
                    <p class="description">
                        Curieratul rapid este un serviciu de livrare rapidă și eficientă a coletelor și documentelor. Este utilizat atât la nivel local, cât și internațional, și este oferit de companii specializate în acest domeniu, cum ar fi NED Curier și altele.
                    </p>
                    <a href="{{ route('page.fast_delivery') }}" class="btn-get-started black">Află mai multe</a>
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
    <!-- End Fast Delivery Section -->

    <!-- ======= Cargo delivery Section ======= -->
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
                    <h2>Cargo</h2>
                    <p class="description">
                        Curieratul cargo se referă la serviciul de transport și livrare de mărfuri și încărcături de dimensiuni mari și grele. Acesta implică manipularea și transportul eficient al coletelor și bunurilor voluminoase utilizând echipamente specializate, cum ar fi macarale, autovehicule de transport grele și containere.
                    </p>
                    <a href="{{ route('page.cargo_delivery') }}" class="btn-get-started black">Află mai multe</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Cargo Delivery Section -->

    <!-- ======= Cargo Logistics services Section ======= -->
    <section id="page-content" class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h2>Servicii Logistice</h2>
                    <p class="description">
                        Serviciile logistice se referă la activitățile și procesele implicate în gestionarea fluxului de bunuri și informații într-o rețea de aprovizionare. Aceste servicii sunt oferite de companii specializate în logistica și includ o gamă largă de activități, precum gestionarea stocurilor, depozitarea, ambalarea, transportul, urmărirea și gestionarea documentelor.                    </p>
                    <a href="{{ route('page.logistics_services') }}" class="btn-get-started black">Află mai multe</a>
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
    <!-- End Logistics services Section -->


</main>
<!-- End #main -->
@endsection
