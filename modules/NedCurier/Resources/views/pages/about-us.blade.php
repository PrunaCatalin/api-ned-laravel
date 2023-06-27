<?php
/*
 * api-ned | about-us.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 9:28 AM
*/
?>
@extends('nedcurier::layouts.master')
@section('content')
{{--    <form action="{{ route('page.about_us') }}" method="POST">--}}
{{--        @csrf--}}
{{--        <input type="text" name="text_app">--}}
{{--        <input type="submit" value="Click">--}}
{{--    </form>--}}
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

    <section id="about" class="about " >
        <div class="container">
            <div class="row">
                <div class="col-lg-12  pt-lg-0 content">
                    <h2 class="about-us-title">Despre noi</h2>
                    <p class="description about-us-content">
                        Ned (Network Express Deliveries) este o companie de curierat înființată recent în România, care se angajează să ofere servicii rapide și eficiente de livrare a coletelor în toată țara. Ned își propune să fie o soluție fiabilă pentru clienții săi, indiferent de mărimea sau destinația coletelor.
                        <br><br>
                        Cu o rețea vastă de centre de distribuție și parteneriate cu transportatori de încredere, Ned are capacitățile necesare pentru a oferi livrare rapidă, sigură și convenabilă. Indiferent dacă doriți să trimiteți un pachet la o adresă din orașul dvs. sau într-un colț îndepărtat al țării, Ned se angajează să ofere o experiență de livrare fără probleme și să răspundă nevoilor dumneavoastră individuale.
                        <br><br>
                        Serviciile Ned includ livrarea la domiciliu sau la birou, servicii de colectare a coletelor, urmărirea coletelor în timp real și multe altele. Echipa Ned este dedicată să ofere o experiență de livrare de calitate, iar clienții săi pot avea încredere că coletele lor vor fi livrate la timp și în condiții excelente.
                        <br><br>
                        În concluzie, Ned este o alegere excelentă pentru cei care caută un curier de încredere, cu o rețea extinsă de distribuție, o experiență de livrare fără probleme și servicii personalizate pentru nevoile individuale ale clienților.
                    </p>

                    <img class="about-us-sign" src="{{ asset('modules/nedcurier/img/ned-sign.png') }}">
                </div>
            </div>
        </div>
    </section>


</main>
<!-- End #main -->
@endsection
