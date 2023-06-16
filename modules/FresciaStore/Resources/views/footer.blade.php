<?php
/*
 * webdirect | footer.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 5/8/2023 5:13 PM
*/
?>
{{--@extends('fresciastore::layouts.master')--}}
<footer class="sn_footer">
    @if(!Cookie::get('accept_cookies'))
        <div class="cookie-banner" style="position: fixed; bottom: 0; width: 100%; background-color: #033503; padding: 20px; text-align: center; z-index: 10000;">
            <p>Website-ul nostru folosește cookie-uri. <a href="{{ route('page.cookie_policy') }}" style="background-color: red">Află mai multe</a>.</p>
            <button class="btn btn-outline-black" id="accept-cookies">Acceptă</button>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 mb-3 mb-md-0">
                <div class="sn_footer_logos d-none d-lg-block">
                    <a href="#" class="mb-md-7">
                        <img src="{{ asset('modules/fresciastore/images/logo-jos.png')  }}" alt="Logo Frescia Store">
                    </a>
                </div>
                <div class="sn_footer_logos-mobile d-lg-none d-md-none">
                    <a href="#" class="mb-md-7">
                        <img src="{{ asset('modules/fresciastore/images/logo-jos-mobile.png') }}" alt="Logo Frescia Store">
                    </a>
                </div>
            </div>
            <div class="container d-md-none">
                <div class="sn_footer_separator"></div>
            </div>
            <div class="col-12 d-md-none my-3">
                <div class="sn_footer_green_number">
                    <div class="sn_footer_green_number_img">
                        <img src="{{ asset('modules/fresciastore/images/tel-contact.png') }}" style="width: 100%;">
                    </div>
                    <div class="text">
                        <div>
                            <div>Numar disponibil <br> {{ $WDTools->calculateWeekDayRange(5)  }}:
                                <br>{{ $WDConfigCompany->scheduler->start }} – {{ $WDConfigCompany->scheduler->timebreak->start }}
                                <br> și {{ $WDConfigCompany->scheduler->timebreak->end }} – {{ $WDConfigCompany->scheduler->end  }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 mb-2 mb-md-0">
                <div class="sn_footer_menu">
                    <a class="sn_footer_menu_title pt-2 pt-md-0 ">Info clienti
                    </a>
                    <div class="sn_footer_menu_collapse">
                        <ul>
                            <li>
                                <a href="{{ env('APP_URL')  }}/contact">Formular contact</a>
                            </li>
                            <li>
                                <a href="{{ env('APP_URL')  }}/intrebari-frecvente">Intrebari frecvente</a>
                            </li>
                            <li>
                                <a href="{{ env('APP_URL')  }}/despre-noi">Despre Frescia Store</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sn_footer_green_number mt-5 d-none d-md-flex">
                    <div class="sn_footer_green_number_img">
                        <img src="{{ asset('modules/fresciastore/images/tel-contact.png') }}" style="width: 100%;">
                    </div>
                    <div class="text">
                        <div>
                            <div>Numar disponibil <br> {{ $WDTools->calculateWeekDayRange(5)  }}:
                                <br>{{ $WDConfigCompany->scheduler->start }} – {{ $WDConfigCompany->scheduler->timebreak->start }}
                                <br> și {{ $WDConfigCompany->scheduler->timebreak->end }} – {{ $WDConfigCompany->scheduler->end  }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 mb-2 mb-md-0">
                <div class="sn_footer_menu">
                    <a class="sn_footer_menu_title  pt-2 pt-md-0 ">Date Comerciale
                    </a>
                    <div class="sn_footer_menu_collapse ">
                        <ul>
                            <li><p>{{ $WDConfigCompany->company_name }}</p></li>
                            <li><p>{{ $WDConfigCompany->cif }}</p></li>
                            <li><p>{{ $WDConfigCompany->ro }}</p></li>
                            <li><p>{{ $WDConfigCompany->address }}</p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 mb-2 mb-md-0">
                <div class="sn_footer_menu">
                    <a href="" class="sn_footer_menu_title  pt-2 pt-md-0 ">Mentiuni Legale
                    </a>
                    <div class="sn_footer_menu_collapse">
                        <ul>
                            <li>
                                <a href="{{ env('APP_URL')  }}/termeni-si-conditii" target="">Termeni si conditii</a>
                            </li>
                            <li>
                                <a href="{{ env('APP_URL')  }}/politica-cookie" target="">Politica de Confidențialitate</a>
                            </li>
                            <li>
                                <a href="{{ env('APP_URL')  }}/politica-confidentialitate" target="">Politica de Cookie</a>
                            </li>
                            <li>
                                <a href="https://anpc.ro/ce-este-sal/" target="_blank">
                                    <img src="{{ asset('modules/fresciastore/images/anpc-img.webp') }}" style="height: 50px;">
                                </a>
                            </li>
                            <li>
                                <a href="https://ec.europa.eu/consumers/odr/main/index.cfm?event=main.home2.show&amp;lng=RO" target="_blank">
                                    <img src="{{ asset('modules/fresciastore/images/sol-img.webp') }}" style="height: 50px;">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container d-md-none">
                <div class="sn_footer_separator"></div>
            </div>
            <div class="col-12 text-center mt-4">
                <div class="sn_footer_socials mt-2">
                    <a href="https://www.facebook.com/gruppoarenadeco" target="_blank">
                        <i class="footer-icon fa fa-instagram" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.facebook.com/gruppoarenadeco" target="_blank">
                        <i class="footer-icon fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.facebook.com/gruppoarenadeco" target="_blank">
                        <i class="footer-icon fa fa-youtube" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="sn_footer_copyright mt-3">&copy;Copyright {{ date("Y") }} | Frescia Store - Italian Fine Products | Toate drepturile rezervate.</div>
            </div>
        </div>
    </div>
</footer>
