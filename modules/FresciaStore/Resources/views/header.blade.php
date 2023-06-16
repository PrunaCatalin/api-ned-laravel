<?php
/*
 * webdirect | header.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 5/8/2023 5:10 PM
*/
?>
<header class="sn_header _above" data-module="header-utils">
    <div class="sn_header_in">
        <div class="container">
            <div class="row">
                <!-- MENIU MOBILE -->
                <div class="col-sm-6  col-6 d-lg-none">
                    <div class="sn_header_toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <!-- INFO CONTACT -->
                <div class="col-lg-12 col-md-12 col-sm-6 col-6 ">
                    <div class="sn_header_tools">
                        <div class="_shop_link_btn d-none d-lg-block">
                            @if(request()->is('magazin/*') || request()->is('magazin'))
                                <a href="{{ route('shop.cart')  }}" target="_blank">
                                    <i class="sn_sprite _cart ">
                                        <i class="fa fa-shopping-cart"></i>

                                    </i> Cosul meu
                                        <span id="cart-count-desktop" class="cart-count">
                                            {{ count($WDCartItems) }}
                                        </span>
                                </a>
                            @else
                                <a href="{{ route('shop.page')  }}">
                                    <i class="sn_sprite _cart ">
                                        <i class="fa fa-shopping-cart"></i>
                                    </i> INTRA IN MAGAZIN
                                </a>
                            @endif
                        </div>
                        <a href="tel:{{ $WDConfigCompany->phone_contact }}" class="sn_header_icontext">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <span class="d-none d-lg-block">SUNA ACUM</span>
                        </a>
                        <a href="{{ route('contact.page')  }}" class="sn_header_icontext">
                            <div class="icon">
                                <i class="fa fa-question"></i>
                            </div>
                            <span class="d-none d-lg-block">SUPORT</span>
                        </a>
                        @auth("customer")
                            <div class="dropdown">
                                <!-- Utilizatorul este logat. -->
                                <a href="#" class="sn_header_icontext dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                    <div class="icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <span class="d-none d-lg-block">{{ $WDCustomer->details->appellate }} {{ $WDCustomer->details->name }}</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a href="{{ route('customer.view.profile') }}" class="dropdown-item">Profilul meu</a></li>
                                    <li><a href="{{ route('customer.view.orders') }}" class="dropdown-item">Comenzile mele</a></li>
                                    <li><a href="{{ route('customer.view.settings') }}" class="dropdown-item">Setări</a></li>
                                    <li><a href="{{ route('customer.action.logout') }}" class="dropdown-item">Logout</a></li>
                                </ul>
                            </div>
                        @else
                            <!-- Utilizatorul nu este logat. -->
                            <a href="{{ route('customer.view.login') }}" class="sn_header_icontext">
                                <div class="icon">
                                    <i class="fa fa-sign-in"></i>
                                </div>
                                <span class="d-none d-lg-block">Logheaza-te</span>
                            </a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 px-lg-0">
                    <!-- LOGO -->
                    <div class="col-lg-1 col-md-4">
                        <a href="{{ route('home.page')  }}" class="sn_header_logo  mx-auto">
                            <img src="{{ asset('modules/fresciastore/images/logo.png') }}" alt="">
                        </a>
                    </div>
                    <!-- MENIU -->
                    <div class="col-lg-11 col-md-8 px-lg-0" style="margin-left: 10%;">
                        <div class="sn_header_menu">
                            <div class="container px-lg-0">
                                <ul>
                                    @if(request()->is('magazin/*') || request()->is('magazin'))
                                        <li class="menu-item d-sm-none">
                                            <a href="{{ route('shop.cart') }}">
                                                Cosul meu
                                                    <span id="cart-count-mobile" class="cart-count">
                                                        {{ count($WDCartItems) }}
                                                    </span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="menu-item d-sm-none">
                                            <a href="{{ route('shop.page') }}">MAGAZIN FRESCIA</a>
                                        </li>
                                    @endif
                                    <li class="menu-item">
                                        <a href="{{ route('magazine.page') }}">REVISTA OFERTE</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('gift-card.page') }}">CARD FIDELITATE</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('contact.page') }}">CONTACT</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>  <!-- HEADER STOP -->
