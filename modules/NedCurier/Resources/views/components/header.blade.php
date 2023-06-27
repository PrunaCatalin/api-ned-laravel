<?php
/*
 * api-ned | header.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 9:01 AM
*/
?>
    <!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <a href="{{ route('page.homepage') }}"
        ><img
                class="logo-img"
                src="{{ asset('modules/nedcurier/img/ned-logo.png') }}"
                alt="Ned logo"
                title="Ned"
            /></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{ route('page.homepage') }}">Home</a></li>
                <li class="dropdown">
                    <a href="#"
                    ><span>Optiuni expediere</span> <i class="bi bi-chevron-down"></i
                        ></a>
                    <ul>
                        <li><a href="{{ route('page.cost_estimate') }}">Estimare costuri</a></li>
                        <li><a href="{{ route('page.shipment_tracking') }}">Urmarire expediere</a></li>

                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{route('page.about_us')}}">Despre noi</a></li>
                <li><a class="nav-link scrollto" href="{{route('page.frequent_questions')}}">Suport</a></li>
                <li><a class="nav-link scrollto" href="{{route('page.contact')}}">Contacts</a></li>
                <li>
                    <a class="getstarted scrollto" href="log-in.php">Log In</a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
</header>
<!-- End Header -->
