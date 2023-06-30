<?php
/*
 * api-ned | cost-estimate.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 4:25 PM
*/
?>

@extends('nedcurier::layouts.master')
@section('content')
    <main class="estimate-the-price-page " id="main">
        <section class=" breadcumb align-center">
            <div class="container">
                <div class="row">
                    <h2 class="track-the-expedition-title">Estimeaza cost</h2>
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}" >
                            <span class="breadcumb-home">Home |</span>
                        </a>
                        <span class="breadcumb-source">Estimare costuri</span>
                    </div>
                </div>
            </div>

        </section>
        <form>
            <section id="page-content" class="page-content estimate-the-price">
                <div class="container">

                    <div class="row">

                        <div class=" square-expedition-option col-lg-3 col-md-12  pt-lg-0 content">
                            <input type="radio" id="option1" name="options" value="Option 1">
                            <div class="align-center box-option">
                                <img class="box-option" src="{{ asset('modules/nedcurier/img/box.png') }}">
                                <h4>Small</h4>
                                <p>Max. 60 x 37 x 3 cm</p>
                                <h5>27.00 lei</h5>
                            </div>
                        </div>

                        <div class=" square-expedition-option col-lg-3 col-md-12  pt-lg-0 content">
                            <input type="radio" id="option2" name="options" value="Option 2">
                            <div class="align-center box-option">
                                <img class="box-option" src="{{ asset('modules/nedcurier/img/box.png') }}">
                                <h4>Small</h4>
                                <p>Max. 60 x 37 x 10 cm</p>
                                <h5>30.99 lei</h5>
                            </div>
                        </div>

                        <div class=" square-expedition-option col-lg-3 col-md-12  pt-lg-0 content">
                            <input type="radio" id="option3" name="options" value="Option 3">
                            <div class="align-center box-option">
                                <img class="box-option" src="{{ asset('modules/nedcurier/img/box.png') }}">
                                <h4>Medium</h4>
                                <p>Max. 60 x 37 x 20 cm</p>
                                <h5>38.99 lei</h5>
                            </div>
                        </div>

                        <div class=" square-expedition-option col-lg-3 col-md-12  pt-lg-0  content">
                            <input type="radio" id="option4" name="options" value="Option 4">
                            <div class="align-center box-option">
                                <img class="box-option" src="{{ asset('modules/nedcurier/img/box.png') }}">
                                <h4>Extra large</h4>
                                <p>Max. 60 x 37 x 40 cm</p>
                                <h5>240.99 lei</h5>
                            </div>
                        </div>

                        <div class=" long-expedition-option col-lg-12 col-md-12 content">
                            <input type="radio" id="option5" name="options" value="Option 5">
                            <div class="row">

                                <div class="col-lg-3 col-md-12  pt-lg-0">
                                    <h4>Personalizat</h4>
                                </div>

                                <div class="col-lg-2 col-md-12  pt-lg-0 show-in-line">
                                    <p>Înalțime</p>
                                    <div class="show-it-on-a-single-line">
                                        <input type="text" class="form-control" name="Inaltime" id="Inaltime" required="">
                                        <span>cm</span>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-12  pt-lg-0 show-in-line">
                                    <p>Lățime</p>
                                    <div class="show-it-on-a-single-line">
                                        <input type="text" class="form-control" name="Inaltime" id="Inaltime" required="">
                                        <span>cm</span>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-12  pt-lg-0 show-in-line">
                                    <p>Lungime</p>
                                    <div class="show-it-on-a-single-line">
                                        <input type="text" class="form-control" name="Inaltime" id="Inaltime" required="">
                                        <span>cm</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12  pt-lg-0 only-on-laptop">
                                    <div class="align-right box-option">
                                        <img src="{{ asset('modules/nedcurier/img/box.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class=" long-expedition-option col-lg-12 col-md-12 content">
                            <input type="radio" id="option8" name="options" value="Option 8">
                            <div class="row">

                                <div class="col-lg-3 col-md-12  pt-lg-0">
                                    <h4>Greutate Volumetrica</h4>
                                </div>

                                <div class="col-lg-6 col-md-12  pt-lg-0 show-in-line">
                                    <p>Volumetrica</p>
                                    <div class="show-it-on-a-single-line">
                                        <input type="text" class="form-control" name="Volumetrica" id="Volumetrica" required="">
                                        <span>kg</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12  pt-lg-0 only-on-laptop">
                                    <div class="align-right box-option">
                                        <img src="{{ asset('modules/nedcurier/img/box.png') }}">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>



                    <div class="livrare-sambata col-lg-12 col-md-12 content">
                        <div class="row">
                            <div class=" livrare-sambata-child col-lg-4 col-md-12  pt-lg-0">
                                <input type="radio" id="option6" name="options" value="Option 6">
                                <h4>Livrare Sambata</h4>
                            </div>
                        </div>
                    </div>

                        <div class="livrare-dimineata col-lg-12 col-md-12 content">
                            <div class="row">
                                <div class=" livrare-dimineata-child col-lg-4 col-md-12  pt-lg-0">
                                    <input type="radio" id="option7" name="options" value="Option 7">
                                    <h4>Livrare Dimneata</h4>
                                </div>
                            </div>
                        </div>



                </div>
            </section>
            <!-- Detalii expeditor-->
{{--            <section class="expeditor-details">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <h2 class="align-center track-the-expedition-title">Detalii expeditor</h2>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-8">--}}
{{--                        <div class="row">--}}
{{--                            <div class="form-group col-md-12 ">--}}
{{--                                <label for="number">Număr de telefon</label>--}}
{{--                                <div class="show-it-on-a-single-line">--}}
{{--                                    <input placeholder="+40" type="text" name="phone-number-prefix" class="form-control"--}}
{{--                                           id="phone-number-prefix" required="" style="width: 30%;">--}}
{{--                                    <input placeholder="7xxxxxxx" type="text" name="phone-number" class="form-control"--}}
{{--                                           id="phone-number" required="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-6 mt-3 mt-md-0">--}}
{{--                                <label for="surname">Prenume</label>--}}
{{--                                <input placeholder="Introdu prenumele" type="text" class="form-control" name="surname"--}}
{{--                                       id="surname" required="">--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-6 mt-3 mt-md-0">--}}
{{--                                <label for="name">Nume</label>--}}
{{--                                <input placeholder="Introdu numele" type="text" class="form-control" name="name" id="name"--}}
{{--                                       required="">--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-12 ">--}}
{{--                                <label for="name">Email <span>(Optional)</span>--}}
{{--                                </label>--}}
{{--                                <div class="show-it-on-a-single-line">--}}
{{--                                    <input placeholder="ex: exemplu@gmail.com" type="email" name="email"--}}
{{--                                           class="form-control" id="email" required="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-6 mt-3 mt-md-0">--}}
{{--                                <label for="surname">Judet</label>--}}
{{--                                <input placeholder="Introdu judetul" type="text" class="form-control" name="judet"--}}
{{--                                       id="judet" required="">--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-6 mt-3 mt-md-0">--}}
{{--                                <label for="name">Oras</label>--}}
{{--                                <input placeholder="Introdu orasul" type="text" class="form-control" name="oras" id="oras"--}}
{{--                                       required="">--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-12 ">--}}
{{--                                <label for="name">Adresă completă</label>--}}
{{--                                <input placeholder="ex: Decebal, nr57 " type="text" name="adresa" class="form-control"--}}
{{--                                       id="adresa" required="">--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-12 ">--}}
{{--                                <div class="show-it-on-a-single-line">--}}
{{--                                    <div class="form-group col-md-4 ">--}}
{{--                                        <label for="name">Scară</label>--}}
{{--                                        <input placeholder="ex: B2 " type="text" name="scara" class="form-control"--}}
{{--                                               id="scara" required="">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group col-md-4 ">--}}
{{--                                        <label for="name">Apartament</label>--}}
{{--                                        <input placeholder="ex: Nr 16 " type="text" name="ap" class="form-control" id="ap"--}}
{{--                                               required="">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group col-md-4 ">--}}
{{--                                        <label for="name">Etaj</label>--}}
{{--                                        <input placeholder="ex: 3 " type="text" name="etaj" class="form-control" id="etaj"--}}
{{--                                               required="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-12 ">--}}
{{--                                <div class="show-it-on-a-single-line">--}}
{{--                                    <div class="form-group col-md-6 ">--}}
{{--                                        <label for="name">Alege data colectări coletului</label>--}}
{{--                                        <br>--}}
{{--                                        <input type="date" id="date" name="dte-colect">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group col-md-6 ">--}}
{{--                                        <label for="name">Alege intervalul de colectare</label>--}}
{{--                                        <br>--}}
{{--                                        <input type="time" id="time-min" name="time-colect-min"> - <input type="time"--}}
{{--                                                                                                          id="time-max"--}}
{{--                                                                                                          name="time-colect-max">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-12 ">--}}
{{--                            <textarea placeholder="Observatii" class="form-control" name="message" rows="10"--}}
{{--                                      required=""></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}


            <!-- Detalii expediție-->
            <section class="expeditor-details">
                <div class="container">
                    <div class="row">
                        <h2 class="align-center track-the-expedition-title">Detalii expediție</h2>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="form-group col-md-12 ">
                                    <label for="number">Număr de telefon</label>
                                    <div class="show-it-on-a-single-line">
                                        <input placeholder="+40" type="text" name="phone-number-prefix" class="form-control"
                                               id="phone-number-prefix" required="" style="width: 30%;">
                                        <input placeholder="7xxxxxxx" type="text" name="phone-number" class="form-control"
                                               id="phone-number" required="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                    <label for="surname">Prenume</label>
                                    <input placeholder="Introdu prenumele" type="text" class="form-control" name="surname"
                                           id="surname" required="">
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                    <label for="name">Nume</label>
                                    <input placeholder="Introdu numele" type="text" class="form-control" name="name"
                                           id="name" required="">
                                </div>
                                <div class="form-group col-md-12 ">
                                    <label for="name">Email <span>(Optional)</span>
                                    </label>
                                    <div class="show-it-on-a-single-line">
                                        <input placeholder="ex: exemplu@gmail.com" type="email" name="email"
                                               class="form-control" id="email" required="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                    <label for="surname">Judet</label>
                                    <input placeholder="Introdu judetul" type="text" class="form-control" name="judet"
                                           id="judet" required="">
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                    <label for="name">Oras</label>
                                    <input placeholder="Introdu orasul" type="text" class="form-control" name="oras"
                                           id="oras" required="">
                                </div>
                                <div class="form-group col-md-12 ">
                                    <label for="name">Adresă completă</label>
                                    <input placeholder="ex: Decebal, nr57 " type="text" name="adresa" class="form-control"
                                           id="adresa" required="">
                                </div>
                                <div class="form-group col-md-12 ">
                                    <div class="show-it-on-a-single-line">
                                        <div class="form-group col-md-4 ">
                                            <label for="name">Scară</label>
                                            <input placeholder="ex: B2 " type="text" name="scara" class="form-control"
                                                   id="scara" required="">
                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <label for="name">Apartament</label>
                                            <input placeholder="ex: Nr 16 " type="text" name="ap" class="form-control"
                                                   id="ap" required="">
                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <label for="name">Etaj</label>
                                            <input placeholder="ex: 3 " type="text" name="etaj" class="form-control"
                                                   id="etaj" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 ">
                                    <div class="show-it-on-a-single-line">
                                        <div class="form-group col-md-6 ">
                                            <label for="name">Alege data colectări coletului</label>
                                            <br>
                                            <input type="date" id="date" name="dte-colect">
                                        </div>
                                        <div class="form-group col-md-6 ">
                                            <label for="name">Alege intervalul de colectare</label>
                                            <br>
                                            <input type="time" id="time-min" name="time-colect-min"> - <input type="time"
                                                                                                              id="time-max"
                                                                                                              name="time-colect-max">
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="form-group col-md-12 ">--}}
{{--                                <textarea placeholder="Observatii" class="form-control" name="message" rows="10"--}}
{{--                                          required=""></textarea>--}}
{{--                                </div>--}}

                            </div>
                        </div>


                        <!-- SUMAR COMANDA -->
                        <div class="col-lg-4 detalii-expeditie ">
                            <div class="container">
                                <h3>Detalii expediție</h3>
                                <p>Pretul afisat este in functie de cele selectate </p>
                                <hr>
                                <p>Total de plata </p>
                                <h4>40.99 lei</h4>
                                <div class="row force-center">
                                    <div class="col-lg-5 col-md-5 squere-details-on-expedition">
                                        <p>Ref Number </p>
                                        <p><b>000085752257</b></p>
                                    </div>

                                    <div class="col-lg-5 col-md-5 squere-details-on-expedition">
                                        <p>Payment Time</p>
                                        <p><b>25 Feb 2023, 13:22</b></p>
                                    </div>

                                    <div class="col-lg-5 col-md-5 squere-details-on-expedition">
                                        <p>Metoda de plata </p>
                                        <p><b>Bank Transfer</b></p>
                                    </div>

                                    <div class="col-lg-5 col-md-5 squere-details-on-expedition">
                                        <p>Nume </p>
                                        <p><b>Antonio Roberto</b></p>
                                    </div>
                                </div>


                                <p class="get-pdf-reciep"><i class="fa fa-download" aria-hidden="true"></i> Get PDF Receipt
                                </p>
                            </div>
                        </div>

                        <div class="text-right">
                            <a href="#" class=" submit btn-get-started buton-formular-contact">Estimeaza cost</a>
                        </div>
                    </div>
                </div>
            </section>


        </form>
    </main>
@endsection


