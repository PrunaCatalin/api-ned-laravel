<?php
/*
 * api-ned | about-cookie.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/30/2023 12:00 PM
*/
?>


@extends('nedcurier::layouts.master')
@section('content')
    <main id="main">

        <section class=" breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}"><span class="breadcumb-home">Home |</span></a> <span
                            class="breadcumb-source">Politica de Cookie</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="page-content" class="page-content ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  pt-lg-0 content">
                        <h2 class="page-content-title">Politica de Cookie</h2>
                        <div class="description page-content-global">
                            <section class="sn_text mt-6 mb-7">
                                <div class="container">
                                    <section class="sn_text mt-6 mb-7">
                                        <div class="container">
                                            <div class="row">
                                                <div class="content col-md-12">
                                                    <h3 class="wp-block-heading">Despre politica privind gestionarea
                                                        cookie-urile&nbsp;</h3>
                                                    <p>Această politică a cookie-urilor explică ce sunt cookie-urile și
                                                        cum le utilizăm, care sunt tipurile pe care le folosim, ce
                                                        informații colectăm prin intermediul lor, cum folosim aceste
                                                        date și cum poți controla setările cu privire la cookie-uri.
                                                        Pentru mai multe informații legate de modul cum folosim, stocăm
                                                        și cum păstrăm datele dumneavoastră securizat, vedeți Politica
                                                        de Confidențialitate.</p>
                                                    <p>Poți oricând să îți schimbi sau retragi acordul cu privire la
                                                        utilizarea cookie-urilor pe site-ul nostru. Acordul
                                                        dumneavoastră se aplică pe următorul domeniu:
                                                        fresciastore.ro</p>
                                                    <h3 class="wp-block-heading">Ce sunt cookie-urile?</h3>
                                                    <p>Cookie-urile sunt fișiere mici care conțin text și sunt utilizate
                                                        pentru a stoca mici informații. Ele sunt stocate pe dispozitivul
                                                        dumneavoastră atunci când site-ul este încărcat în browser.
                                                        Aceste cookie-uri ne ajută să avem o bună funcționare a
                                                        site-ului, să îl facem mai sigur, să oferim o mai bună
                                                        experiență de utilizare, să înțelegem cum utilizați site-ul și
                                                        să analizăm ce merge și unde trebuie îmbunătățiri.&nbsp;</p>
                                                    <h3 class="wp-block-heading">Cum folosim cookie-urile?</h3>
                                                    <p>Ca majoritatea serviciilor online, site-ul nostru utiliează
                                                        cookie-uri proprii și ale aplicațiilor terțe dintr-o serie de
                                                        motive. Cookie-urile proprii sunt cele necesare pentru ca
                                                        site-ul să funcționeze în mod corespunzător și ele nu colectează
                                                        informații sau date personale.</p>
                                                    <p>Cookie-urile terțe folosite pe site-ul nostru sunt în principal
                                                        pentru a înțelege cum funcționează site-ul, cum dumneavoastră
                                                        interacționați cu el, păstrând serviciile securizate, oferind o
                                                        experiență mai bună de utilizare și ajutând interacțiunile
                                                        dumneavoastră viitoare cu site-ul.&nbsp;</p>
                                                    <h3 class="wp-block-heading">Ce fel de cookie-uri
                                                        folosim?&nbsp;</h3>
                                                    <p>
                                                        <em>Necesare:</em> Unele cookie-uri sunt esențiale pentru ca
                                                        toate funcționalitățile site-ului să meargă corect. Ele ne ajută
                                                        de asemenea să gestionăm sesiunile utilizatorilor și să prevenim
                                                        pericolele din punct de vedere al securității. Ele nu colectează
                                                        sau stochează nici o informație personală.&nbsp;
                                                    </p>
                                                    <p>
                                                        <em>Analitice:</em> Aceste cookie-uri stochează informații
                                                        despre numărul de vizitatori de pe site, numărul unic de
                                                        utilizatori, care dintre paginile site-ului au fost vizitate, de
                                                        unde a provenit vizita, etc. Aceste date ne ajută să înțelegem
                                                        și să analizam cum site-ul nostru funcționează și unde sunt
                                                        necesare îmbunătățiri.&nbsp;
                                                    </p>
                                                    <p>
                                                        <strong>
                                                            <em>Preferințe</em>
                                                        </strong>: Aceste cookie-uri ne ajută să păstrăm preferințele
                                                        dumneavoastră legate de site-ul nostru și să oferim o experiență
                                                        mai bună și eficientă la următoarea vizită pe site.&nbsp;&nbsp;
                                                    </p>
                                                    <h3 class="wp-block-heading">Cum pot controla preferințele legate de
                                                        gestionarea cookie-urilor?</h3>
                                                    <p>Puteți să schimbați preferințele legate de gestionarea
                                                        cookie-urilor în timpul sesiunii dumneavoastră pe site apăsând
                                                        butonul ,,Politica Cookies” de pe ecran. Acesta vă va arăta
                                                        notificarea cookie-urilor și puteți retrage acordul pentru
                                                        stocarea cookie-urilor care nu sunt absolut necesare sau puteți
                                                        schimba preferințele.</p>
                                                    <p>Browserele oferă modalități diferite pentru a șterge sau a bloca
                                                        cookie-urile utilizate de site-uri. Puteți schimba de asemenea
                                                        setările browser-ului pentru a șterge/bloca cookie-urile. Pentru
                                                        a găsi mai multe informații despre cum să gestionați și să
                                                        ștergeți cookie-urile, vizitați&nbsp;
                                                        <a href="https://www.allaboutcookies.org/" target="_blank"
                                                           rel="noreferrer noopener">www.allaboutcookies.org</a>.&nbsp;
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </section>
                        </div>

                        <img class="page-content-us-sign" src="{{ asset('modules/nedcurier/img/ned-sign.png') }}">
                    </div>
                </div>
            </div>
        </section>


    </main>
    <!-- End #main -->
@endsection
