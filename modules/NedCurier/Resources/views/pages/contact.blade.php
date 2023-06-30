<?php
/*
 * api-ned | contact.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 6:05 PM
*/
?>

@extends('nedcurier::layouts.master')
@section('content')
    <main id="main">

        <section class=" breadcumb" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}"><span class="breadcumb-home">Home |</span></a> <span class="breadcumb-source">Contact</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="page-content" class="page-content contact-us" >
            <div class="container"><div class="row">
                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <h2 class="contact-us-title">Contact</h2>
                            <div class="email">
                                <h4>Email:</h4>
                                <p>ned@info.ro</p>
                            </div>

                            <div class="phone">
                                <h4>Telefon:</h4>
                                <p>+1 601-201-5580</p>
                            </div>

                            <div class="address">
                                <h4>Adresa:</h4>
                                <p>1642 Washington Ave, Jackson, MS</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="#" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nume</label>
                                    <input placeholder="Introdu numele tau" type="text" name="name" class="form-control" id="name" required="">
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                    <label for="name">Email</label>
                                    <input placeholder="Introdu e-mailul tau" type="email" class="form-control" name="email" id="email" required="">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">Telefon</label>
                                <input placeholder="Introdu numarul tau de telefon" type="text" class="form-control" name="phone" id="phone" required="">
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">Mesaj</label>
                                <textarea placeholder="Scrie mesajul tau aici..." class="form-control" name="message" rows="10" required=""></textarea>
                            </div>
                            <div class="text-right">
                                <a href="#" class=" submit btn-get-started scrollto buton-formular-contact">Trimite</a>
                            </div>
                        </form>
                    </div>
                </div>
        </section>



        <div class="map-with-black-overlay">
            <iframe width="100%" height="460" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Madurai,+Tamil+Nadu&amp;aq=0&amp;oq=madursi&amp;sll=10.782836,78.288503&amp;sspn=5.674603,10.755615&amp;ie=UTF8&amp;hq=&amp;hnear=Madurai,+Tamil+Nadu&amp;t=m&amp;z=12&amp;ll=9.925201,78.119775&amp;output=embed"></iframe>
        </div>
    </main>
    <!-- End #main -->
@endsection

