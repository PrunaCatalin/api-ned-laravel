<?php
/*
 * api-ned | home-page-client.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/28/2023 9:47 AM
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
                        <a href="{{ route('page.awb_tracking') }}" class="btn-get-started scrollto">Awb tracking</a>
                        <a
                            href="https://www.youtube.com/watch?v=jDDaplaOz7Q"
                            class="glightbox btn-watch-video"
                        ><i class="bi bi-play-circle"></i><span>Watch the demo</span></a
                        >
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="{{ asset('modules/nedcurier/img/truck.png') }}" class="img-fluid animated" alt=""/>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->



    <main id="main">

        <!-- ======= Generate AWB Section ======= -->
        <section id="page-content" class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h2>Genereaza AWB</h2>
                        <p class="description">
                            Pentru a trimite o expeditie, este necesar sa generati un awb...
                        </p>
                        <a href="{{ route('page.generate_awb') }}" class="btn-get-started black">Genereaza awb</a>
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
        <!-- End Generate AWB Section -->


        <!-- ======= List AWB Section ======= -->
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
                        <h2>Lista AWB</h2>
                        <p class="description">
                            Pentru a urmari awb-urile dvs...
                        </p>
                        <a href="{{ route('page.list_awb') }}" class="btn-get-started black">List awb</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End List AWB Section -->

        <!-- ======= List Slip Section ======= -->
        <section id="page-content" class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h2>Lista borderou</h2>
                        <p class="description">
                            Pentru a urmari borderourile dvs...
                        </p>
                        <a href="{{ route('page.list_slip') }}" class="btn-get-started black">Lista borderou</a>
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
        <!-- End List Slip Section -->

        <!-- ======= List Price Section ======= -->
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
                        <h2>Lista preturi</h2>
                        <p class="description">
                            Pentru a urmari lista de preturi...
                        </p>
                        <a href="{{ route('page.list_price') }}" class="btn-get-started black">Lista preturi</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End List Price Section -->


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

