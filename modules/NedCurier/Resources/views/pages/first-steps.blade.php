<?php
/*
 * api-ned | first-steps.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/28/2023 10:29 AM
*/
?>

@extends('nedcurier::layouts.master')
@section('content')
    <main id="main">

        <section class=" breadcumb" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}" ><span class="breadcumb-home">Home |</span></a> <span class="breadcumb-source">Primii pasi</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="page-content" class="page-content " >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  pt-lg-0 content">
                        <h2 class="page-content-title">Primii pasi</h2>
                        <div class="description page-content-global">
                            <p>
                            Identificarea nevoilor: Primul pas important este să identificați nevoile și cerințele specifice ale afacerii dvs. Întrebați-vă ce tip de servicii de curierat aveți nevoie, cum ar fi livrări locale sau internaționale, livrări urgente sau programate, dimensiuni și greutăți ale coletelor etc. Acest lucru vă va ajuta să găsiți o firmă de curierat care să se potrivească nevoilor dvs.
                            <br><br>
                            Cercetarea și compararea firmelor de curierat: Faceți o cercetare pentru a identifica mai multe companii de curierat care oferă serviciile de care aveți nevoie. Luați în considerare criterii precum reputația, experiența, acoperirea geografică, serviciile oferite, tarifele, asigurările, serviciul de urmărire, feedback-ul clienților etc. Comparați aceste criterii pentru a selecta câteva opțiuni potrivite.
                            <br><br>
                            Solicitare de oferte și negocieri: Contactați companiile de curierat selectate și solicitați oferte personalizate în funcție de nevoile dvs. Discutați despre volumele și frecvența livrărilor, termenele de livrare, serviciile suplimentare (cum ar fi asistența vamală), opțiunile de asigurare și orice alte aspecte relevante. Negociați tarifele și condițiile pentru a ajunge la un acord avantajos pentru ambele părți.
                            <br><br>
                            Stabilirea contractului și proceduri administrative: Odată ce ați ales o firmă de curierat, stabiliți un contract care să reglementeze serviciile, tarifele, condițiile de plată, răspunderea și alte aspecte relevante. Asigurați-vă că înțelegeți și sunteți de acord cu toate clauzele contractuale. Completați și înregistrați procedurile administrative necesare, cum ar fi înregistrarea dvs. ca client al firmei de curierat.
                            <br><br>
                            Pregătirea coletelor și livrarea: În pregătirea coletelor, asigurați-vă că sunt bine ambalate, etichetate corect și pregătite pentru livrare. Furnizați informațiile necesare despre colete, cum ar fi greutatea, dimensiunile și destinația. Comunicați cu firma de curierat pentru a programa preluarea coletelor sau livrarea acestora în funcție de nevoile dvs. Asigurați-vă că furnizați instrucțiuni clare cu privire la preluarea sau livrarea coletelor și orice alte cerințe speciale.
                            <br><br>
                            Acești pași inițiali vor contribui la stabilirea unei relații bune cu firma de curierat și la asigurarea unui proces de livrare eficient și fiabil. Asigurați-vă că mențineți o comunicare deschisă cu firma de curierat pe parcursul colaborării și să revizuiți periodic performanța serviciilor pentru a vă asigura că răspunde nevoilor dvs. în continuare.
                         </p>
                        <img class="page-content-sign" src="{{ asset('modules/nedcurier/img/ned-sign.png') }}">
                    </div>
                </div>
            </div>
        </section>


    </main>
    <!-- End #main -->
@endsection
