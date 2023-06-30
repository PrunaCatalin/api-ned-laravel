<?php
/*
 * api-ned | generate_awb.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/28/2023 9:54 AM
*/
?>

@extends('nedcurier::layouts.master')
@section('content')
    <main id="main">

        <section class=" breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}"><span class="breadcumb-home">Home |</span></a> <span
                            class="breadcumb-source">Genereaza AWB</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="page-content" class="page-content ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  pt-lg-0 content">
                        <h2 class="page-content-title">Genereaza AWB</h2>
                        <div class="description page-content-global">

                            <!--Begin Generate AWB-->
                            <form action="" method="post" onsubmit="" class="inline">
                                <input type="hidden" name="" value="">
                                <div id="awb-details" class="theme-container container tab-pane fade show active">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card bg-light mb-3">
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="mb-3">
                                                            <div class="title-wrap">
                                                                <div class="section-title no-margin child-title">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4 fs-14">
                                                                            Expeditor
                                                                        </div>
                                                                        <div class="form-group col-md-8">
                                                                            <select class="chosen-select"

                                                                                    id="sender_list" name=""
                                                                                    onchange="">
                                                                                <option value="">Selecteaza
                                                                                    Expeditorul
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2  fs-14">
                                                                    <label for="sender_name">Nume *:</label>
                                                                </div>
                                                                <div class="form-group col-md-10">
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           placeholder=""
                                                                           id="sender_name"
                                                                           name=""
                                                                           value=""
                                                                           required/>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="sender_county">Judet *:</label>
                                                                </div>
                                                                <div class="form-group col-md-10">
                                                                    <div class="box">
                                                                        <select class="chosen-select"
                                                                                id="sender_county" name=""
                                                                                onchange="">
                                                                            <option value="">Selecteaza Judetul</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="sender_city">Localitate *:</label>
                                                                </div>
                                                                <div class="form-group col-md-10">
                                                                    <div class="box">
                                                                        <select class="chosen-select"
                                                                                id="sender_city"
                                                                                name=""
                                                                                required>
                                                                            <option value="">Selecteaza Orasul</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="sender_street">Strada *:</label>
                                                                </div>
                                                                <div class="form-group col-md-10">
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           name=""
                                                                           id="sender_street"
                                                                           value=""
                                                                           placeholder=""
                                                                           required/>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="sender_building">Numarul:</label>
                                                                </div>
                                                                <div class="form-group col-md-10">
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           name=""
                                                                           id="sender_building"
                                                                           value=""
                                                                           placeholder=""/>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="sender_postal_code">Cod Postal
                                                                        *:</label>
                                                                </div>
                                                                <div class="form-group col-md-10">
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           name=""
                                                                           id="sender_postal_code"
                                                                           value=""
                                                                           placeholder="" required/>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="sender_contact">Contact *:</label>
                                                                </div>
                                                                <div class="form-group col-md-10">
                                                                    <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        name=""
                                                                        id="sender_contact"
                                                                        value=""
                                                                        placeholder="" required/>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="sender_phone">Telefon *:</label>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           name=""
                                                                           id="sender_phone"
                                                                           value=""
                                                                           placeholder="" required/>
                                                                </div>
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="sender_email">Email:</label>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="email" class="form-control"
                                                                           id="sender_email"
                                                                           name=""
                                                                           value=""
                                                                           placeholder="">
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card bg-light mb-3">
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="mb-3">
                                                            <div class="title-wrap">
                                                                <div class="section-title no-margin child-title">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4  fs-14">
                                                                            Destinatar
                                                                        </div>
                                                                        <div class="form-group col-md-8">
                                                                            <select class="chosen-select"

                                                                                    id="receiver_list" name=""
                                                                                    onchange="">
                                                                                <option value="">Selecteaza
                                                                                    Destinatarul
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="receiver_name">Nume *:</label>
                                                                </div>
                                                                <div class="form-group col-md-10">
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           name=""
                                                                           id="receiver_name"
                                                                           value=""
                                                                           placeholder="Nume destinatar"
                                                                           required/>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="receiver_county">Judet *:</label>
                                                                </div>
                                                                <div class="form-group col-md-10">
                                                                    <div class="box">
                                                                        <select class="chosen-select"
                                                                                id="receiver_county"
                                                                                name=""
                                                                                onchange="">
                                                                            <option value="">Selecteaza Judetul</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="receiver_city">Localitate *:</label>
                                                                </div>

                                                                <div class="form-group col-md-10">
                                                                    <div class="box">
                                                                        <select class="chosen-select"
                                                                                id="receiver_city"
                                                                                name=""
                                                                                required>
                                                                            <option value="">Selecteaza Orasul</option>

                                                                        </select>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="receiver_street">Strada:</label>
                                                                </div>
                                                                <div class="form-group col-md-10">
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           name=""
                                                                           id="receiver_street"
                                                                           value=""
                                                                           placeholder="Strada republici"
                                                                    />
                                                                </div>
                                                            </div>


                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="receiver_building">Numarul:</label>
                                                                </div>
                                                                <div class="form-group col-md-10">
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           name=""
                                                                           id="receiver_building"
                                                                           value=""
                                                                           placeholder="bl 1 , ap 105"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="receiver_postal_code">Cod Postal
                                                                        *:</label>
                                                                </div>
                                                                <div class="form-group col-md-10">
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           name=""
                                                                           id="receiver_postal_code"
                                                                           value=""
                                                                           placeholder="123123 " required/>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="receiver_contact">Contact *:</label>
                                                                </div>
                                                                <div class="form-group col-md-10">
                                                                    <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="receiver_contact"
                                                                        name=""
                                                                        value=""
                                                                        placeholder="Persoana de contact"
                                                                        required/>
                                                                </div>

                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="receiver_phone">Telefon *:</label>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           name=""
                                                                           id="receiver_phone"
                                                                           value=""
                                                                           placeholder="07123456789"
                                                                           required/>
                                                                </div>
                                                                <div class="form-group col-md-2 fs-14">
                                                                    <label for="receiver_email">Email:</label>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="email"
                                                                           class="form-control"
                                                                           name=""
                                                                           id="receiver_email"
                                                                           value=""
                                                                           placeholder="Email">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-1">
                                            <div class="card bg-light mb-3">
                                                <div class="card-body">
                                                    <div class="title-wrap">
                                                        <h2 class="section-title no-margin child-title">DETALII DE
                                                            LIVRARE</h2>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-row">
                                                            <div class="col awb-info">
                                                                <div class="section-title">CONTINUT</div>

                                                                <!--Service select for AWB create-->
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4 fs-14">
                                                                        Servicii
                                                                    </div>
                                                                    <div class="form-group col-md-8">
                                                                        <select class="chosen-select"
                                                                                id="service_name" name="">
                                                                            <option value=""></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!--\.Service select for AWB create-->

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label for="details_package">Colete:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               name=""
                                                                               id="details_package"
                                                                               placeholder="0"
                                                                               value="" required/>
                                                                    </div>

                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label for="details_envelopes">Plicuri:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               id="details_envelopes"
                                                                               name=""
                                                                               value=""
                                                                               placeholder="0" required/>
                                                                    </div>

                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label for="total_kg">Greutate totala:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               id="total_kg"
                                                                               name=""
                                                                               value=""
                                                                               placeholder="0"
                                                                               onchange=""
                                                                               required
                                                                        />
                                                                    </div>
                                                                </div>
                                                                <div class="section-title">DIMENSIUNI</div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label for="details_height">Inaltime
                                                                            pachet:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               name=""
                                                                               id="details_height"
                                                                               placeholder="7"
                                                                               value="" required/>
                                                                    </div>
                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label for="details_width">Latime
                                                                            pachet:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               id="details_width"
                                                                               name=""
                                                                               value=""
                                                                               placeholder="0" required/>
                                                                    </div>
                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label for="details_length">Lungime
                                                                            pachet:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               id="details_length"
                                                                               name=""
                                                                               value=""
                                                                               placeholder="0" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6 fs-14">
                                                                        <label for="details_valDeclared">Valoare
                                                                            declarata:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               name=""
                                                                               id="details_valDeclared"
                                                                               placeholder="0 RON"
                                                                               value=""/>
                                                                    </div>

                                                                    <!-- put on display none because client want this -->
                                                                    <div style="display: none">
                                                                        <div class="form-group col-md-6 fs-14">
                                                                            <label for="details_refundcash">Rambursare
                                                                                in numerar:</label>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <input type="text"
                                                                                   class="form-control"
                                                                                   id="details_refundcash"
                                                                                   name=""
                                                                                   placeholder="0 RON"
                                                                                   value=""/>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-md-6 fs-14">
                                                                        <label for="details_refundbank">Rambursare
                                                                            bancara:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               name=""
                                                                               id="details_refundbank"
                                                                               placeholder="0 RON"
                                                                               value=""/>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">

                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label for="details_openpackage">Deschidere
                                                                            Colet:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <input type="checkbox"
                                                                               class="form-control"
                                                                               id="details_openpackage"
                                                                               name=""
                                                                               value="1">
                                                                    </div>

                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label for="standard_is_weekend">Livrarea
                                                                            Sambata:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="form-control"
                                                                            id="standard_is_weekend"
                                                                            name=""
                                                                            value="1"
                                                                            onchange=""
                                                                        />
                                                                    </div>

                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label for="standard_is_morning">Livrare
                                                                            dimineata:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="form-control"
                                                                            id="standard_is_morning"
                                                                            name=""
                                                                            value="1"
                                                                            onchange=""
                                                                        />
                                                                    </div>

                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6 fs-14">
                                                                        <label for="details_shipmentPayer">Platitor
                                                                            Transport:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               id="details_shipmentPayer"
                                                                               name=""
                                                                               value="" readonly/>
                                                                    </div>
                                                                </div>

                                                                <div class="section-title">OBSERVATII</div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label
                                                                            for="details_observation">Observatii:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-10">
                                                                        <textarea type="text"
                                                                                  class="form-control"
                                                                                  id="details_observation"
                                                                                  name=""
                                                                                  value=""
                                                                                  placeholder="Observatii" rows="3"
                                                                        ></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col awb-info">
                                                                <div class="section-title">OPTIUNI</div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label for="details_is_confirm">Confirmare de
                                                                            primire:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <input type="checkbox"
                                                                               class="form-control"
                                                                               id="details_is_confirm"
                                                                               name=""
                                                                               value="1"
                                                                        />
                                                                    </div>

                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label for="details_refund_doc">Retur de
                                                                            documente:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <input type="checkbox"
                                                                               class="form-control"
                                                                               id="details_refund_doc"
                                                                               name=""
                                                                               value="1"
                                                                        />
                                                                    </div>


                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label for="details_bo">Retur BO:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               id="details_bo"
                                                                               name=""
                                                                               value=""/>
                                                                    </div>

                                                                    <div class="form-group col-md-2 fs-14">
                                                                        <label for="details_cec">CEC:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               id="details_cec"
                                                                               name=""
                                                                               value=""/>
                                                                    </div>
                                                                </div>

                                                                <div class="section-title">CONTINUT</div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6 fs-14">
                                                                        <label for="details_packageContent">Continut
                                                                            Colet:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               id="details_packageContent"
                                                                               name=""
                                                                               placeholder="continut"
                                                                               value=""
                                                                        />
                                                                    </div>
                                                                </div>
                                                                <div class="section-title">COST</div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6 fs-14">
                                                                        <label for="details_shippingCost">Costul de
                                                                            livrare:</label>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               id="details_shippingCost"
                                                                               name=""
                                                                               placeholder=""
                                                                               value=""
                                                                               readonly/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="hidden" id="type_of_request"
                                                                           value="generate">
                                                                    <button class="btn-get-started" type="submit"
                                                                            value="only_generate"
                                                                            name="only_generate" id="generate_awb"
                                                                            onclick="">Salveaza AWB
                                                                    </button>
                                                                    <button class="btn-get-started" type="submit"
                                                                            value="generate_and_save"
                                                                            name="generate_and_save"
                                                                            id="generate_and_save"
                                                                            onclick="">Salveaza Si Printeaza
                                                                    </button>
                                                                </div>


                                                                <div class="col-md-6" style="color: #FFFFFF;">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                Borderouri: <span></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control"
                                                                                       name="" id="" placeholder="0"
                                                                                       value="}" required=""
                                                                                       style="margin: 25px 0 0 0;"
                                                                                       readonly>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <a class="nav-link"
                                                                                   id="account-details-tab"
                                                                                   href="">
                                                                                    <button type="button"
                                                                                            class="btn-get-started">
                                                                                        Finalizeaza Borderou
                                                                                    </button>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--\.End Gnerate AWB-->

                            <!-- ======= Import List AWB Section ======= -->
                            <section id="page-content" class="page-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                                            <h2>Import Lista AWB</h2>
                                            <p class="description">
                                                Pentru importa lista AWB-uri...
                                            </p>
                                            <a href="{{ route('page.import_list_awb') }}" class="btn-get-started black">Import Lista AWB</a>
                                        </div>
                                        <div class="col-lg-6 d-flex justify-flex-end">
                                            <img
                                                src="{{ asset('modules/nedcurier/img/curierat.png') }}"
                                                class="img-fluid advice-img"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End Import List AWB Section -->

                            <!-- ======= Internal Receiver Section ======= -->
                            <section id="page-content" class="page-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 d-flex justify-flex-end">
                                            <img
                                                src="{{ asset('modules/nedcurier/img/curierat.png') }}"
                                                class="img-fluid advice-img"
                                                alt=""
                                            />
                                        </div>
                                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                                            <h2>Destinatari interni</h2>
                                            <p class="description">
                                                Pentru a urmari lista de destinatari interni...
                                            </p>
                                            <a href="{{ route('page.receiver_internal_list') }}" class="btn-get-started black">Destinatari interni</a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End Internal Receiver AWB Section -->


                            <!-- ======= External Receiver Section ======= -->
                            <section id="page-content" class="page-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                                            <h2>Destinatari externi</h2>
                                            <p class="description">
                                                Pentru a urmari lista de destinatari externi...
                                            </p>
                                            <a href="{{ route('page.receiver_external_list') }}" class="btn-get-started black">Destinatari externi</a>
                                        </div>
                                        <div class="col-lg-6 d-flex justify-flex-end">
                                            <img
                                                src="{{ asset('modules/nedcurier/img/curierat.png') }}"
                                                class="img-fluid advice-img"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End External; Receiver AWB Section -->


                        </div>
                        <img class="page-content-sign" src="{{ asset('modules/nedcurier/img/ned-sign.png') }}">
                    </div>
                </div>
            </div>
        </section>


    </main>
    <!-- End #main -->
@endsection

