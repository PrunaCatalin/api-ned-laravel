<?php
/*
 * api-ned | homepage.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 9:23 AM
*/
?>
@extends('nedcurier::layouts.master')
{{--@section('styles')--}}
{{--    <link rel="stylesheet" href="{{ asset('modules/nedcurier/css/test.min.css') }}">--}}
{{--@endsection--}}

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div
                    class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                >
                    <h1>Urmărește coletul</h1>
                    <h2>
                        Ned este o companie de curierat cu experiență și de încredere,
                        specializată în livrarea promptă și eficientă a coletelor.
                    </h2>
                    <div class="d-flex">
                        <a href="#about" class="btn-get-started scrollto">Awb tracking</a>
                        <a
                            href="https://www.youtube.com/watch?v=jDDaplaOz7Q"
                            class="glightbox btn-watch-video"
                        ><i class="bi bi-play-circle"></i><span>Watch the demo</span></a
                        >
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="{{ asset('modules/nedcurier/img/truck.png') }}" class="img-fluid animated" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->



    <main id="main">
        <!-- =======De ce să alegi Ned Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container">
                <div class="row">
                    <div class="title-wrap">
                        <h2 class="text-center">De ce să alegi Ned ?</h2>
                    </div>
                    <p class="ned-description text-center">
                        In concluzie, NED este partenerul de incredere pe care il cauti
                        pentru servicii de curierat rapide, eficiente si personalizate, la
                        un pret bun. Contacteaza-ne astazi pentru a afla mai multe despre
                        cum putem ajuta afacerea ta sau pentru a solicita o oferta
                        personalizata!
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box">
                            <div class="icon">
                                <img src="{{ asset('modules/nedcurier/img/rapiditate.jpg') }}" />
                            </div>
                            <h4 class="title">Rapiditate si eficienta</h4>
                            <p class="description">
                                NED se concentreaza pe oferirea serviciilor de livrare rapida
                                si eficienta, asigurandu-se ca pachetele tale ajung la
                                destinatie in timp util. Cu o flota de vehicule moderne si o
                                echipa de profesionisti bine pregatiti, suntem pregatiti sa
                                facem fata oricaror cerinte de livrare.
                            </p>
                            <div class="services-btn-wrap">
                                <a href="/" class="btn-get-started">Află mai multe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                        <div class="icon-box">
                            <div class="icon">
                                <img src="{{ asset('modules/nedcurier/img/preturi competitive.jpg') }}" />
                            </div>
                            <h4 class="title">Preturi competitive</h4>
                            <p class="description">
                                La NED, suntem dedicati sa oferim servicii de curierat de
                                inalta calitate la preturi competitive. Fie ca este vorba
                                despre livrarea unui document important sau a unui colet mai
                                mare, putem oferi solutii de livrare adaptate nevoilor tale si
                                bugetului tau.
                            </p>
                            <div class="services-btn-wrap">
                                <a href="/" class="btn-get-started">Află mai multe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                        <div class="icon-box">
                            <div class="icon">
                                <img src="{{ asset('modules/nedcurier/img/servicii.png') }}" />
                            </div>
                            <h4 class="title">Servicii personalizate</h4>
                            <p class="description">
                                La NED, suntem mandri sa oferim servicii personalizate pentru
                                fiecare client in parte. Suntem dedicati sa pastram clientii
                                multumiti prin comunicare transparenta si prin abordarea
                                nevoilor si cerintelor lor individuale.
                            </p>
                            <div class="services-btn-wrap">
                                <a href="/" class="btn-get-started">Află mai multe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End FDe ce să alegi Ned Section -->

        <!-- ======= Sfaturi de ambalare Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h2>Sfaturi de ambalare</h2>
                        <p class="description">
                            Folosește o cutie rezistentă: Alege o cutie cu pereți groși și
                            rezistenți pentru a proteja conținutul pachetului. Asigură-te că
                            cutia este suficient de mare pentru a încăpea conținutul, dar nu
                            prea mare, astfel încât să nu se miște în interiorul cutiei...
                        </p>
                        <a href="/" class="btn-get-started black">Află mai multe</a>
                    </div>
                    <div class="col-lg-6 d-flex justify-flex-end">
                        <img
                            src="{{ asset('modules/nedcurier/img/ambalare.png') }}"
                            class="img-fluid advice-img"
                            alt=""
                        />
                    </div>
                </div>
            </div>
        </section>
        <!-- End Sfaturi de ambalare Section -->


        <!-- ======= Trimite cu ned Section ======= -->
        <section id="about" class="winners">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex justify-flex-end pd-special">
                        <img src="{{ asset('modules/nedcurier/img/premii.png') }}" class="img-fluid" alt="" />
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h2>Trimite cu Ned și câștigă premii...</h2>
                        <p class="description">
                            Trimite cu Ned și câștigă premii atractive! Suntem bucuroși să
                            îți prezentăm noul nostru program de recompense, care îți oferă
                            șansa de a obține beneficii pentru fiecare colet expediat cu
                            noi.
                        </p>
                        <a href="/" class="btn-get-started black">Află mai multe</a>
                    </div>
                    <div class="col-lg-6 d-flex justify-flex-end pd-special only-on-phone">
                        <img src="{{ asset('modules/nedcurier/img/premii.png') }}" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- End Trimite cu ned Section -->
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container">
                <div>
                    <h2>Ce spun clienți nostri...</h2>
                </div>

                <div
                    class="testimonials-slider swiper swiper-clients"
                    data-aos="fade-up"
                    data-aos-delay="100"
                >
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img
                                    src="{{ asset('modules/nedcurier/img/testimonials/testimonials-1.jpg') }} "
                                    class="testimonial-img"
                                    alt=""
                                />
                                <p>
                                    "Am folosit serviciile NED de mai multe ori si nu am fost
                                    niciodata dezamagit. Livrarea a fost intotdeauna rapida si
                                    eficienta, iar curierii au fost mereu profesionisti si
                                    amabili. Recomand cu caldura compania NED tuturor celor care
                                    au nevoie de servicii de curierat de calitate!"
                                </p>

                                <h3>Ana M</h3>
                            </div>
                        </div>
                        <!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img
                                    src="{{ asset('modules/nedcurier/img/testimonials/testimonials-2.jpg') }}"
                                    class="testimonial-img"
                                    alt=""
                                />
                                <p>
                                    "Am avut nevoie sa trimit urgent niste documente importante
                                    si am apelat la NED pentru ajutor. Nu numai ca am primit o
                                    oferta competitiva, dar livrarea a fost facuta chiar in
                                    aceeasi zi. Sunt foarte multumit de serviciile lor si voi
                                    folosi cu siguranta NED din nou in viitor!"
                                </p>

                                <h3>Alexandru C</h3>
                            </div>
                        </div>
                        <!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img
                                    src="{{ asset('modules/nedcurier/img/testimonials/testimonials-3.jpg') }}"
                                    class="testimonial-img"
                                    alt=""
                                />
                                <p>
                                    "Am colaborat cu NED pentru livrarea de colete mari si grele
                                    si am fost impresionat de nivelul lor de profesionalism.
                                    Curierii au fost foarte atenti si au livrat pachetele
                                    noastre in siguranta si la timp. Nu as putea fi mai multumit
                                    de serviciile lor si le recomand cu incredere oricui are
                                    nevoie de servicii de curierat de calitate!"
                                </p>

                                <h3>Ionut D</h3>
                            </div>
                        </div>
                        <!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img
                                    src="{{ asset('modules/nedcurier/img/testimonials/testimonials-4.jpg') }}"
                                    class="testimonial-img"
                                    alt=""
                                />
                                <p>
                                    "Am folosit NED pentru a trimite un pachet important catre
                                    un prieten care locuieste in alta tara. Am primit notificari
                                    in timp real cu privire la starea livrarii si am fost foarte
                                    multumit de serviciile lor. Cu siguranta voi folosi NED din
                                    nou in viitor!"
                                </p>

                                <h3>Maria S</h3>
                            </div>
                        </div>
                        <!-- End testimonial item -->

                        <!-- End testimonial item -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Section -->
    </main>
    <!-- End #main -->
@endsection
@section('scripts')

@endsection
