<?php
/*
 * webdirect | login.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 5/12/2023 8:46 PM
*/
?>
@extends('fresciastore::layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('modules/fresciastore/css/auth/auth.min.css') }}">
@endsection
@section('content')
    <section class="sn_intro_text ">
        <div class="sn_intro_text_bg " style="background-image: url('{{ asset('modules/fresciastore/images/despre-noi-header.jpg') }}');"></div>
        <div class="container pt-5 pt-lg-1 pb-6 sn_intro_text_content">
            <h1 class="display-4">Cont client</h1>
        </div>
    </section>
    <section class="sn_breadcrumb">
        <div class="container">

        </div>
    </section>
    <section class="sn_form_unica py-6 pt-md-8 pb-md-12 bg-light" id="unicaForm" data-module="gplaces">
        <div class="container">
            <div class="row mb-6">
                <div class="col-12 text-center sn_form_unica_content">
                    <h3 class="h1 text-center mb-1">Autentificare - Înregistrare</h3>
                </div>
            </div>
            <div class="row mb-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#login">Logare</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#register">Inregistrare</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content text-center">
                    <div class="tab-pane container active" id="login">
                        <br>
                        @if ($errors->has('login'))
                            <div class="alert alert-danger">
                                {{ $errors->first('login') }}
                            </div>
                        @endif
                       <form class="sn_form" method="post" action="{{ route("customer.action.login") }}">
                           @csrf
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="E-mail *" value="">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <input type="password" class="form-control pr-4" name="password" placeholder="Parola *" value="">
                            </div>
                            <div class="text-center col-12">
                                <a data-toggle="modal" data-target="#resetPasswordModal" class="_link_password" href="#">Ai uitat parola?</a>
                            </div>
                            <div class="form-group col-12 col-md-12 mt-2">
                                @if ($errors->has('g-recaptcha-response'))
                                    <p class="error">{{ $errors->first('g-recaptcha-response') }}</p>
                                @endif
                                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_CAPTCHA_PUBLIC_KEY', $WDConfigGoogle->captha->site_key ) }}">
                                </div>
                            </div>
                            <div class="text-center col-12 mt-2">
                                <button type="submit" class="btn btn-black">Logare</button>
                            </div>
                        </div>
                       </form>
                    </div>
                    <div class="tab-pane container fade" id="register">This is a profile tab.</div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section("scripts")
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
