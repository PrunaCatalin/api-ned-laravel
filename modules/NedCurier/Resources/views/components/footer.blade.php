<?php
/*
 * api-ned | footer.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 9:01 AM
*/
?>


    <!-- ======= Footer ======= -->
<footer id="footer">

    @if(!Cookie::get('accept_cookies'))
        <div class="cookie-banner" style="position: fixed; bottom: 0; width: 100%; background-color: #363636; padding: 10px; text-align: center; z-index: 10000;">
            <p>Website-ul nostru folosește cookie-uri. <a href="#" style="color: red">Află mai multe</a></p>
            <button class="btn-get-started" id="accept-cookies">Acceptă</button>
        </div>
    @endif

    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-contact">
                    <img class="logo-img" src="{{ asset('modules/nedcurier/img/ned-logo-footer.png') }}" alt="Ned logo" title="Ned" />
                </div>
                <div class="col-lg-2 col-md-6 footer-second-column"></div>
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>About</h4>
                    <ul>
                        <li>
                            <a href="{{ route('page.homepage') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('page.personalized_services') }}">Services</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Information</h4>
                    <ul>
                        <li>
                            <a href="#">Contacts</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Mentiuni Legale </h4>
                    <ul>
                        <li>
                            <a href="{{ route('page.terms_and_conditions') }}">Termeni si conditii</a>
                        </li>
                        <li>
                            <a href="{{ route('page.privacy_policy') }}">Politica de Confidențialitate</a>
                        </li>
                        <li>
                            <a href="{{ route('page.about_cookie') }}">Politica de Cookie</a>
                        </li>
                        <li>
                            <a href="https://anpc.ro/ce-este-sal/" target="_blank">
                                <img loading="lazy" src="{{ asset('modules/nedcurier/img/anpc-img.webp') }}"
                                     style="height: 50px;">
                            </a>
                        </li>

                        <li>
                            <a href="https://ec.europa.eu/consumers/odr/main/index.cfm?event=main.home2.show&amp;lng=RO"
                               target="_blank">
                                <img loading="lazy" src="{{ asset('modules/nedcurier/img/sol-img.webp') }}"
                                     style="height: 50px;">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row contact-details-row">
                <div class="col-lg-2 col-md-6 footer-contact">
                    <h4>Contacts</h4>
                    <p>+1 5589 55488 55<br /><strong>info@example.com</strong></p>
                </div>
                <div class="col-lg-4 col-md-6 footer-contact">
                    <h4>Contacts</h4>
                    <p>1642 Washington Avenue, Jackson, MS, 39201<br /><strong>Driving derections</strong></p>
                </div>
                <div class="col-lg-3 col-md-6 footer-contact"></div>
                <div class="col-lg-3 col-md-6 footer-links footer-links-3">
                    <h4>Social</h4>
                    <div class="social-links text-center text-md-right pt-3 pt-md-0">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row copyright-wrap py-4">
            <div class="col-lg-2 col-md-6 footer-links footer-links-3"></div>
{{--            <div class="col-lg-4 col-md-6 footer-links footer-links-3">--}}
{{--                <a href="{{ route('page.terms_and_conditions') }}">--}}
{{--                    <strong>Termene si conditii</strong>--}}
{{--                </a>--}}
{{--            </div>--}}
            <div class="col-lg-3 col-md-6 footer-links footer-links-3"></div>
            <div class="col-lg-3 col-md-6 footer-links footer-links-3">
                <div class="copyright">
                    &copy; 2023 <span>Ensome.</span>. All Rights Reserved
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>
