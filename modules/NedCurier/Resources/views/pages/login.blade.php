<?php
/*
 * api-ned | login.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 9:34 PM
*/
?>
@extends('nedcurier::layouts.master')
@section('content')
    <main class="login-page " id="main">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Trimite colet</h2>
                        <p>If you don’t have an account register</p>
                        <p>You can <a>Register here !</a></p>


                        <form action="#" method="post" role="form" class="login-page-form">
                            <div class="row">

                                <div class="form-group mt-3 mt-md-0">
                                    <label for="name">Email</label>
                                    <div class="show-it-on-a-single-line border-bottom">
                                        <i class="fa fa-envelope"></i>
                                        <input placeholder="Enter your email address" type="email" class="form-control"
                                               name="email" id="email" required="">
                                    </div>
                                </div>


                                <div class="space-login-page-between-inputs">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="name">Password</label>
                                    <div class="show-it-on-a-single-line border-bottom">
                                        <i class="fa fa-lock"></i>
                                        <input placeholder="Enter your Password" type="text" class="form-control"
                                               name="password" id="password" required="">
                                        <i class="fa fa-eye-slash"></i>
                                    </div>
                                </div>


                                <div class="row additional-text">

                                    <div class="remember-me col-lg-6">
                                        <div class="show-it-on-a-single-line">
                                            <input type="checkbox" name="remember-me">
                                            <p>Rememebr me</p>
                                        </div>
                                    </div>

                                    <div class="forget-pass col-lg-6">
                                        <p>Forgot Password ?</p>
                                    </div>
                                </div>

                                <div class="submit-button">
                                    <a href="#" class=" submit btn-get-started scrollto buton-formular-log-in">Login</a>
                                </div>
                            </div>
                        </form>


                        <div class="aditional-log-in-options">
                            <p>or continue with</p>
                            <div class="additional-log-in-options-images show-it-on-a-single-line">
                                <img src="{{ asset('modules/nedcurier/img/facebook.jpg') }}">
                                <img src="{{ asset('modules/nedcurier/img/google.jpg') }}">
                            </div>
                        </div>

                        <div class="aditional-log-in-options">
                            <div class="additional-log-in-options-images2 show-it-on-a-single-line">
                                <img src="{{ asset('modules/nedcurier/img/appel.jpg') }}">
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-6">
                        <div class="place-log-in-background-image">
                            <img src="{{ asset('modules/nedcurier/img/log-in-image.png') }}">
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </main>
@endsection
