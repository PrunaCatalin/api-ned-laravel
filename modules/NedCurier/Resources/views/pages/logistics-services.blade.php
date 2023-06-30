<?php
/*
 * api-ned | logistics-services.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/28/2023 10:09 AM
*/
?>

@extends('nedcurier::layouts.master')
@section('content')
    <main id="main">

        <section class=" breadcumb" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}" ><span class="breadcumb-home">Home |</span></a> <span class="breadcumb-source">Servicii Logistice</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="page-content" class="page-content " >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  pt-lg-0 content">
                        <h2 class="page-content-title">Servicii Logisitice</h2>
                        <p class="description page-content-global">
                            Avantajele serviciilor logistice includ:
                            <br><br>
                            Gestionarea eficientă a lanțului de aprovizionare: Serviciile logistice asigură fluxul optim al bunurilor și informațiilor în lanțul de aprovizionare, de la furnizori până la clienți.
                            <br><br>
                            Reducerea costurilor și eficientizarea operațiunilor: Companiile de logistică lucrează pentru a optimiza procesele, a reduce costurile și a îmbunătăți eficiența operațională în lanțul de aprovizionare.
                            <br><br>
                            Gestionarea stocurilor și depozitarea: Serviciile logistice includ administrarea stocurilor, depozitarea și gestionarea spațiilor de depozitare, asigurând o gestionare adecvată a inventarului și accesibilitatea rapidă a bunurilor.
                            <br><br>
                            Transport și distribuție: Companiile logistice gestionează transportul și distribuția bunurilor utilizând diverse moduri de transport, inclusiv rutier, aerian, maritim sau feroviar, în funcție de nevoile și cerințele specifice.
                            <br><br>
                            Urmărire și monitorizare: Serviciile logistice includ sisteme de urmărire și monitorizare a bunurilor în timp real, oferind vizibilitate și informații actualizate cu privire la stadiul și locația acestora.
                            <br><br>
                            Servicii de ambalare și etichetare: Companiile logistice oferă servicii de ambalare adecvată și etichetare a bunurilor, asigurând protecția acestora în timpul transportului.
                            <br><br>
                            Serviciile logistice sunt esențiale pentru a asigura o funcționare eficientă a rețelei de aprovizionare și pentru a satisface cerințele clienților în ceea ce privește livrarea promptă și corectă a bunurilor.
                            <br><br>
                            Acesta este doar un rezumat al serviciilor logistice. Companiile specializate în logistica oferă o gamă variată de servicii adaptate nevoilor specifice ale clienților. Pentru informații mai detaliate, este recomandat să consultați companiile de logistică și documentațiile specifice oferite de acestea.
                        </p>

                        <img class="page-content-sign" src="{{ asset('modules/nedcurier/img/ned-sign.png') }}">
                    </div>
                </div>
            </div>
        </section>


    </main>
    <!-- End #main -->
@endsection

