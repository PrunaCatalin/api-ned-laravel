<?php
/*
 * webdirect | contact.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 5/15/2023 9:13 PM
*/
?>
@extends('fresciastore::layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('modules/fresciastore/css/contact/contact.min.css') }}">
@endsection
@section('content')
    <section class="sn_intro_text ">
        <div class="sn_intro_text_bg " style="background-image: url('{{ asset('modules/fresciastore/images/contact-header.jpg') }}');"></div>
        <div class="container pt-5 pt-lg-1 pb-6 sn_intro_text_content">
            <h1 class="display-4">Contact</h1>
        </div>
    </section>
    <section class="sn_breadcrumb">
        <div class="container">

        </div>
    </section>
   <section class="sn_info_map mt-6">
       <div class="row mb-12">
           <div class="col-12 col-lg-10 mx-auto">
               <div class="row align-items-center">
                   <div class="col-12 col-xl-5">
                       <div class="h4 text-uppercase mb-3">Adresa</div>
                       <div class="sn_info_map_infos">
                           <div class="mb-2">
                               <a href="https://goo.gl/maps/1kiuXt6VCmY9SafP6" target="_blank">
                                   <i class="sn_sprite _pin fa fa-map-pin" aria-hidden="true"></i>
                                   <span>{{ $WDConfigCompany->address }}</span>
                               </a>
                           </div>
                           <div class="mb-2">
                               <a href="tel:0735124124 ">
                                   <i class="sn_sprite _pin fa fa-phone" aria-hidden="true"></i>
                                   <span>{{ $WDConfigCompany->phone_contact }}</span>
                               </a>
                           </div>
                           <div class="mb-2">
                               <a href="mailto:contact@fresciastore.ro ">
                                   <i class="sn_sprite _pin fa fa-envelope" aria-hidden="true"></i>
                                   <span>{{ $WDConfigCompany->email_contact }}</span>
                               </a>
                           </div>
                           <div class="mb-2">
                               <a href="mailto:contact@fresciastore.ro ">
                                   <i class="sn_sprite _pin fa fa-clock-o" aria-hidden="true"></i>
                                   <span> {{ $WDConfigCompany->scheduler->start }}  : {{ $WDConfigCompany->scheduler->end  }}</span>
                               </a>
                           </div>
                       </div>
                       <div class="sn_info_map_links">
                           <div class="mb-2">
                               <a href="https://goo.gl/maps/yhQhRveE4DwQJGKK8" target="">
                                   <i class="contact sn_sprite _pin fa fa-plane" aria-hidden="true"></i>
                                   <span>Cum să ajungi la noi de la aeroport</span>
                               </a>
                           </div>
                           <div class="mb-2">
                               <a href="https://goo.gl/maps/GYGQDcKmLyTG2rwVA" target="">
                                   <i class="contact sn_sprite _pin fa fa-bus" aria-hidden="true"></i>
                                   <span>Cum să ajungi la noi cu autobuzul</span>
                               </a>
                           </div>
                       </div>
                       <br>
                   </div>
                   <div class="col-12 col-xl-7 mt-4 mt-xl-0">
                       <div class="sn_info_map_gmap">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2842.4536525010612!2d26.0685308!3d44.56728580000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b21b7c98c245e1%3A0x9d58f167133f457b!2sDrumul%20G%C4%83rii%20Od%C4%83i%201A%2C%20Otopeni%20075100!5e0!3m2!1sro!2sro!4v1683193204415!5m2!1sro!2sro" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450"></iframe>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
    <section class="sn_choose mt-6 pb-8 pt-6 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 text-center sn_choose_content">
                    <h2>Cum te putem ajuta?</h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="col-12 mt-6 col-lg-8 mx-auto">
                    <form class="sn_form" method="post" action="{{ route('contact.page-submit') }}" id="contact_form">
                        @csrf
                        <div class="row">
                                <div class="form-group  col-md-6">
                                    @if ($errors->has('fullname'))
                                        <p class="error">{{ $errors->first('fullname') }}</p>
                                    @endif
                                    <input type="text" class="form-control" name="fullname" placeholder="Nume complet*" value="{{ old('fullname') }}" required>
                                </div>
                                <div class="form-group  col-md-6">
                                    @if ($errors->has('email'))
                                        <p class="error">{{ $errors->first('email') }}</p>
                                    @endif
                                    <input type="email" class="form-control" name="email" placeholder="E-mail*" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group col-12">
                                    @if ($errors->has('subject'))
                                        <p class="error">{{ $errors->first('subject') }}</p>
                                    @endif
                                    <input type="text" class="form-control" name="subject" placeholder="Subiect*" value="{{ old('subject') }}" required>
                                </div>
                                <div class="form-group col-12">
                                    @if ($errors->has('message'))
                                        <p class="error">{{ $errors->first('message') }}</p>
                                    @endif
                                    <textarea class="form-control" name="message" placeholder="Mesaj*" required>{{ old('message') }}</textarea>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    @if ($errors->has('g-recaptcha-response'))
                                        <p class="error">{{ $errors->first('g-recaptcha-response') }}</p>
                                    @endif
                                    <div class="g-recaptcha" data-sitekey="{{ $WDConfigGoogle->captha->site_key }}">
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input " name="contacts_privacy" id="contacts_privacy" value="1">
                                        <label class="custom-control-label" for="contacts_privacy">
                                            Prin utilizarea acestui formular
                                            acceptați stocarea și gestionarea datelor dumneavoastră de către acest site web.</label>
                                    </div>
                                </div>
                                <div class="text-center col-12 mt-2">
                                    <button type="submit" class="btn btn-black" >Trimite</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section("scripts")
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
