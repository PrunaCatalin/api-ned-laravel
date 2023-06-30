<?php
/*
 * api-ned | frequent-questions.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 5:36 PM
*/
?>


@extends('nedcurier::layouts.master')
@section('content')
    <main id="main">

        <section class=" breadcumb" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}"><span class="breadcumb-home">Home |</span></a> <span class="breadcumb-source">Întrebări frecvente</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="page-content" class="page-content contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="info">
                            <h2 class="contact-us-title">Întrebări frecvente</h2>
                        </div>
                    </div>

                    <div class="start-fasq">
                        <ul class="question-answer-sections">
                            <!------------  INCEPUT DE INTREBARE------------>
                            <li class="question-answer-section question-answer-section--active">
            <span class="question">
              <img class="cercle-before-the-question" src="{{ asset('modules/nedcurier/img/cerc.png') }}">
              Care sunt serviciile oferite de Ned?
              <img class="arrow-after-the-question" src="{{ asset('modules/nedcurier/img/arrow.png') }}">
            </span>

                                <div class="answer">
              <span class="question-in-the-answer-areea">
                Care sunt serviciile oferite de Ned?
              </span>
                                    <br>
                                    <div class="space">
                                    </div>
                                    Ned ofera o varietate de servicii de curierat, inclusiv livrare de documente si pachete, livrare de colete si paleti, servicii de logistica si solutii personalizate pentru livrari urgente
                                </div>
                            </li>
                            <!------------ FINAL DE INTREBARE------------>

                            <!------------  INCEPUT DE INTREBARE------------>
                            <li class="question-answer-section ">
            <span class="question">
              <img class="cercle-before-the-question" src="{{ asset('modules/nedcurier/img/cerc.png') }}">
              Care este zona de acoperire a serviciilor de curierat Ned?
              <img class="arrow-after-the-question" src="{{ asset('modules/nedcurier/img/arrow.png') }}">
            </span>

                                <div class="answer">
              <span class="question-in-the-answer-areea">
                Care este zona de acoperire a serviciilor de curierat Ned?
              </span>
                                    <br>
                                    <div class="space">
                                    </div>
                                    Ned ofera servicii de curierat in toata tara, acoperind majoritatea localitatilor din Romania.
                                </div>
                            </li>
                            <!------------ FINAL DE INTREBARE------------>

                            <!------------  INCEPUT DE INTREBARE------------>
                            <li class="question-answer-section ">
            <span class="question">
              <img class="cercle-before-the-question" src="{{ asset('modules/nedcurier/img/cerc.png') }}">
              Cum pot sa trimit un colet prin intermediul serviciilor Ned?
              <img class="arrow-after-the-question" src="{{ asset('modules/nedcurier/img/arrow.png') }}">
            </span>

                                <div class="answer">
              <span class="question-in-the-answer-areea">
                Cum pot sa trimit un colet prin intermediul serviciilor Ned?
              </span>
                                    <br>
                                    <div class="space">
                                    </div>
                                    Pentru a trimite un colet prin intermediul Ned, puteti crea o comanda online sau prin intermediul aplicatiei Ned, sau puteti suna la centrul de preluare a comenzilor pentru a plasa o comanda. Trebuie sa furnizati detaliile complete ale destinatarului si ale pachetului, iar un curier Ned va prelua pachetul de la adresa dvs. si il va livra la destinatie.

                                </div>
                            </li>
                            <!------------ FINAL DE INTREBARE------------>

                            <!------------  INCEPUT DE INTREBARE------------>
                            <li class="question-answer-section ">
            <span class="question">
              <img class="cercle-before-the-question" src="{{ asset('modules/nedcurier/img/cerc.png') }}">
              Cat timp dureaza livrarea prin intermediul serviciilor Ned?
              <img class="arrow-after-the-question" src="{{ asset('modules/nedcurier/img/arrow.png') }}">
            </span>

                                <div class="answer">
              <span class="question-in-the-answer-areea">
               Cat timp dureaza livrarea prin intermediul serviciilor Ned?
             </span>
                                    <br>
                                    <div class="space">
                                    </div>
                                    Timpul de livrare depinde de zona de destinatie si de tipul de serviciu selectat. Pentru livrari urgente, Ned ofera servicii de livrare in aceeasi zi, in timp ce pentru livrarile standard, timpul de livrare poate varia intre 24 si 48 de ore.
                                </div>
                            </li>
                            <!------------ FINAL DE INTREBARE------------>

                            <!------------  INCEPUT DE INTREBARE------------>
                            <li class="question-answer-section ">
          <span class="question">
            <img class="cercle-before-the-question" src="{{ asset('modules/nedcurier/img/cerc.png') }}">
            Care sunt tarifele pentru serviciile de curierat Ned?
            <img class="arrow-after-the-question" src="{{ asset('modules/nedcurier/img/arrow.png') }}">
          </span>

                                <div class="answer">
            <span class="question-in-the-answer-areea">
             Care sunt tarifele pentru serviciile de curierat Ned?
           </span>
                                    <br>
                                    <div class="space">
                                    </div>
                                    Tarifele pentru serviciile de curierat Ned variaza in functie de zona de destinatie, greutatea si dimensiunea pachetului si de tipul de serviciu selectat. Pentru a afla mai multe despre tarifele specifice, puteti verifica pe site-ul Ned sau puteti suna la centrul de preluare a comenzilor pentru a primi o estimare a costurilor.
                                </div>
                            </li>
                            <!------------ FINAL DE INTREBARE------------>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <section id="page-content" class="page-content contact-us yellow-section-faq" >
            <div class="container"><div class="row">
                    <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="info">
                            <h2 class="contact-us-title-on-the-faq-page">Dacă ai intrebari completeaza formularul și intră în contact cu noi</h2>
                            <div class="start-contact-info-faq">
                                <div class="email-faq">
                                    <h4>Email</h4>
                                    <p>ned@info.ro</p>
                                </div>

                                <div class="phone">
                                    <h4>Telefon</h4>
                                    <p>+1 601-201-5580</p>
                                </div>

                                <div class="address">
                                    <h4>Adresa</h4>
                                    <p>1642 Washington Ave, Jackson, MS</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch form-on-yellow-section">

                        <form action="#" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <h2 class="contact-us-title-on-the-contact-form-on-faq-page">Contact</h2>
                                <div class="form-group mt-3">
                                    <label for="name">Nume complet</label>
                                    <input placeholder="Introdu numele tau complet" type="text" class="form-control" name="phone" id="phone" required="">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="email">E-mail</label>
                                    <input placeholder="Introdu e-mailul tau" type="email" class="form-control" name="phone" id="phone" required="">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="phone">Telefon</label>
                                    <input placeholder="Introdu numarul tau de telefon" type="phone" class="form-control" name="phone" id="phone" required="">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name">Mesaj</label>
                                    <textarea placeholder="Scrie mesajul tau aici..." class="form-control" name="message" rows="10" required=""></textarea>
                                </div>
                                <div class="text-right">
                                    <a href="#" class=" submit btn-get-started scrollto buton-formular-contact">Trimite</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <section id="testimonials" class="testimonials section-bg">
            <div class="container">
                <div>
                    <h2>Ce spun clienți nostri...</h2>
                </div>

                <div class="testimonials-slider swiper swiper-clients swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper" style="transform: translate3d(-3468px, 0px, 0px); transition-duration: 600ms;" id="swiper-wrapper-8bf7474d3101061888" aria-live="off"><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" style="width: 558px; margin-right: 20px;" role="group" aria-label="3 / 4">
                            <div class="testimonial-item">
                                <img src="{{ asset('modules/nedcurier/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
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
                        </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="3" style="width: 558px; margin-right: 20px;" role="group" aria-label="4 / 4">
                            <div class="testimonial-item">
                                <img src="{{ asset('modules/nedcurier/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
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
                        <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 558px; margin-right: 20px;" role="group" aria-label="1 / 4">
                            <div class="testimonial-item">
                                <img src="{{ asset('modules/nedcurier/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
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

                        <div class="swiper-slide swiper-slide-duplicate-next" data-swiper-slide-index="1" style="width: 558px; margin-right: 20px;" role="group" aria-label="2 / 4">
                            <div class="testimonial-item">
                                <img src="{{ asset('modules/nedcurier/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
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

                        <div class="swiper-slide" data-swiper-slide-index="2" style="width: 558px; margin-right: 20px;" role="group" aria-label="3 / 4">
                            <div class="testimonial-item">
                                <img src="{{ asset('modules/nedcurier/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
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

                        <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="3" style="width: 558px; margin-right: 20px;" role="group" aria-label="4 / 4">
                            <div class="testimonial-item">
                                <img src="{{ asset('modules/nedcurier/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
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
                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-active" data-swiper-slide-index="0" style="width: 558px; margin-right: 20px;" role="group" aria-label="1 / 4">
                            <div class="testimonial-item">
                                <img src="{{ asset('modules/nedcurier/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                                <p>
                                    "Am folosit serviciile NED de mai multe ori si nu am fost
                                    niciodata dezamagit. Livrarea a fost intotdeauna rapida si
                                    eficienta, iar curierii au fost mereu profesionisti si
                                    amabili. Recomand cu caldura compania NED tuturor celor care
                                    au nevoie de servicii de curierat de calitate!"
                                </p>

                                <h3>Ana M</h3>
                            </div>
                        </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-next" data-swiper-slide-index="1" style="width: 558px; margin-right: 20px;" role="group" aria-label="2 / 4">
                            <div class="testimonial-item">
                                <img src="{{ asset('modules/nedcurier/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                                <p>
                                    "Am avut nevoie sa trimit urgent niste documente importante
                                    si am apelat la NED pentru ajutor. Nu numai ca am primit o
                                    oferta competitiva, dar livrarea a fost facuta chiar in
                                    aceeasi zi. Sunt foarte multumit de serviciile lor si voi
                                    folosi cu siguranta NED din nou in viitor!"
                                </p>

                                <h3>Alexandru C</h3>
                            </div>
                        </div></div>
                    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            </div>
        </section>


    </main>
    <!-- End #main -->
@endsection
