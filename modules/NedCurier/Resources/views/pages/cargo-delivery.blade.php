<?php
/*
 * api-ned | carg-delivery.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/28/2023 9:54 AM
*/
?>

@extends('nedcurier::layouts.master')
@section('content')
    <main id="main">

        <section class=" breadcumb" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}" ><span class="breadcumb-home">Home |</span></a> <span class="breadcumb-source">Cargo </span>
                    </div>
                </div>
            </div>
        </section>

        <section id="page-content" class="page-content" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  pt-lg-0 content">
                        <h2 class="page-content-title">Cargo Delivery</h2>
                        <p class="description page-content-global">
                            Avantajele curieratului cargo includ:
                            <br><br>
                            Capacitate de transport: Curierii cargo au capacitatea de a gestiona mărfuri și încărcături de dimensiuni mari și grele care nu pot fi transportate prin serviciile obișnuite de curierat.
                            <br><br>
                            Expertiză și echipamente specializate: Companiile de curierat cargo sunt echipate cu echipamente specializate pentru manipularea și transportul sigur al încărcăturilor grele, cum ar fi macarale, autovehicule speciale sau containere.
                            <br><br>
                            Asistență vamală: Aceste companii au cunoștințe și experiență în gestionarea formalităților vamale și a documentației specifice asociate transportului internațional de mărfuri.
                            <br><br>
                            Flexibilitate și planificare: Curieratul cargo oferă flexibilitate în ceea ce privește programarea și planificarea transportului, permițând adaptarea serviciilor la cerințele specifice ale clienților.
                            <br><br>
                            Asigurare a încărcăturii: Există opțiuni de asigurare a încărcăturii pentru a proteja clienții împotriva daunelor sau pierderilor în timpul transportului.
                            <br><br>
                            Pentru expedierea încărcăturilor prin curierat cargo, este important să se respecte cerințele specifice ale fiecărei companii și să se asigure îndeplinirea formalităților vamale relevante.
                            <br><br>
                            Acestea sunt câteva aspecte importante ale curieratului cargo. Este recomandat să consultați companiile de curierat cargo specifice și documentațiile lor pentru a obține informații detaliate despre serviciile și regulamentele lor specifice.
                         </p>

                        <img class="page-content-sign" src="{{ asset('modules/nedcurier/img/ned-sign.png') }}">
                    </div>
                </div>
            </div>
        </section>


    </main>
    <!-- End #main -->
@endsection

