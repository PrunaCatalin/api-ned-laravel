@extends('fresciastore::layouts.master')

@section('content')
    <!-- SLIDER START -->
    <section class="slideshow">
        <div class="slideshow-inner">
            <div class="slides">
                <div class="slide is-loaded is-active" style="">
                    <div class="slide-content" style="right: auto;">
                        <div class="caption">
                            <div class="title" style="">Slide title 1</div>
                        </div>
                    </div>
                    <div class="image-container" style="">
                        <img src="{{ asset('modules/fresciastore/images/1.png') }}" alt="" class="image">
                    </div>
                </div>
                <div class="slide is-loaded" style="right: 0px;">
                    <div class="slide-content" style="right: 0px;">
                        <div class="caption">
                            <div class="title" style="">Slide title 2</div>
                        </div>
                    </div>
                    <div class="image-container" style="">
                        <img src="{{ asset('modules/fresciastore/images/3.jpg') }}" alt="" class="image">
                    </div>
                </div>
                <div class="slide is-loaded" style="right: 0px;">
                    <div class="slide-content" style="right: 0px;">
                        <div class="caption">
                            <div class="title" style="">Slide title 3</div>
                        </div>
                    </div>
                    <div class="image-container" style="">
                        <img src="{{ asset('modules/fresciastore/images/2.jpg') }}" alt="" class="image">
                    </div>
                </div>
                <div class="slide is-loaded" style="right: 0px;">
                    <div class="slide-content" style="right: 0px;">
                        <div class="caption">
                            <div class="title" style="">Slide title 4</div>

                        </div>
                    </div>
                    <div class="image-container" style="">
                        <img src="{{ asset('modules/fresciastore/images/1.png') }}" alt="" class="image">
                    </div>
                </div>
            </div>
            <div class="pagination">
                <div class="item is-active">
                    <span class="icon">1</span>
                </div>
                <div class="item">
                    <span class="icon">2</span>
                </div>
                <div class="item">
                    <span class="icon">3</span>
                </div>
                <div class="item">
                    <span class="icon">4</span>
                </div>
            </div>
            <div class="arrows">
                <div class="arrow prev">
            <span class="svg svg-arrow-left">
              <svg version="1.1" id="svg4-Layer_1" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="26px" viewBox="0 0 14 26" enable-background="new 0 0 14 26" xml:space="preserve"> <path d="M13,26c-0.256,0-0.512-0.098-0.707-0.293l-12-12c-0.391-0.391-0.391-1.023,0-1.414l12-12c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414L2.414,13l11.293,11.293c0.391,0.391,0.391,1.023,0,1.414C13.512,25.902,13.256,26,13,26z"></path> </svg>
              <span class="alt sr-only"></span>
            </span>
                </div>
                <div class="arrow next">
            <span class="svg svg-arrow-right">
              <svg version="1.1" id="svg5-Layer_1" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="26px" viewBox="0 0 14 26" enable-background="new 0 0 14 26" xml:space="preserve"> <path d="M1,0c0.256,0,0.512,0.098,0.707,0.293l12,12c0.391,0.391,0.391,1.023,0,1.414l-12,12c-0.391,0.391-1.023,0.391-1.414,0s-0.391-1.023,0-1.414L11.586,13L0.293,1.707c-0.391-0.391-0.391-1.023,0-1.414C0.488,0.098,0.744,0,1,0z"></path> </svg>
              <span class="alt sr-only"></span>
            </span>
                </div>
            </div>
        </div>
    </section>
    <!-- SLIDER STOP -->
    <!-- TEXT SECTION AFTER SLIDER START -->
    <section class="sn_text mt-lg-8 mt-6 text-center">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 ">
                    <p> Descoperă lumea Frescia Store!
                        <br>
                        Descoperă toate mărcile noastre de top 100% italienesti și
                        scufundă-te în cele mai avantajoase oferte pentru cumpărăturile tale de
                        zi cu zi!
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- TEXT SECTION AFTER SLIDER STOP -->
    <!-- THREE ITEM START -->
    <section class="sn_three mt-2 mt-lg-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="sn_three_i col-sm-12 col-md-12 col-xl-4 mb-2 ">
                    <h2 class="p text-uppercase mb-4">Răsfoiește pliantele noastre</h2>
                    <a href="https://development.beatrice-coman.ro/pliant.html" class="w-100">
                        <div class="sn_three_i_image mb-3" style="background-image: url('{{ asset('modules/fresciastore/images/pliant.jpg') }}')"></div>
                    </a>
                    <a class="btn btn-outline-black" href="https://development.beatrice-coman.ro/pliant">răsfoiește acum</a>
                </div>
                <div class="sn_three_i col-sm-12 col-md-12 col-xl-4 mb-2">
                    <h2 class="p text-uppercase mb-4">Locația noastra</h2>
                    <a href="https://development.beatrice-coman.ro/contact.html" class="w-100">
                        <div class="sn_three_i_image mb-3"
                             style="background-image: url('{{ asset('modules/fresciastore/images/locatie.png') }}')"></div>
                    </a>
                    <a class="btn btn-outline-black" href="#">Vezi locatia noastra </a>
                </div>
                <div class="sn_three_i col-sm-12 col-md-12 col-xl-4 mb-2">
                    <h2 class="p text-uppercase mb-4">Contact rapid</h2>
                    <a href="#" class="w-100">
                        <div class="sn_three_i_image mb-3"
                             style="background-image: url('{{ asset('modules/fresciastore/images/contact.png') }}')"></div>
                    </a>
                    <a class="btn btn-outline-black" href="#">Suna acum! </a>
                </div>
            </div>
        </div>
    </section>
    <!-- THREE ITEM STOP -->
    <!-- CAR SECTION START -->
    <section class="sn_image_text py-4 py-lg-6 bg-light">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-lg-6 pr-lg-5 d-flex align-items-center">
                    <div class="sn_image_text_image"
                         style="background-image: url('{{ asset('modules/fresciastore/images/masina-transport.png') }}');"></div>
                </div>
                <div class="col-lg-6 pl-lg-5 mt-3  d-flex justify-content-center align-items-center align-items-lg-start flex-column">
                    <h2 class="sn_image_text_title">Vrei să-ți primești alimente acasă sau la birou?</h2>
                    <div class="sn_image_text_content mt-2">
                        <b>COMANDĂ ACUM CUMPĂRĂTURILE TALE ONLINE!</b>
                        <br>Comandă acum produsele tale favorite prin Fan Courier și beneficiezi de livrare gratuită pentru comenzi de peste 200 LEI!
                    </div>
                    <a href="{{ route('shop.page')  }}" class="btn btn-outline-black mt-2">INTRĂ ÎN MAGAZIN!</a>
                </div>
                <div class="sn_image_text_divider"></div>
            </div>
        </div>
    </section>
    <!-- CAR SECTION STOP -->
    <section class="sn_slider_banner my-lg-6 my-4">
        <div class="container mt-4">
            <div class="row">
                <div class="sn_slider_banner_banner col-lg-12 d-none d-lg-block">
                    <div class="sn_slider_banner_banner_image"
                         style="background-image: url('{{ asset('modules/fresciastore/images/box-limited-edition.jpg') }}');"></div>
                </div>
                <div class="sn_slider_banner_banner col-lg-6 d-lg-none d-md-none">
                    <div class="sn_slider_banner_banner_image"
                         style="background-image: url('{{ asset('modules/fresciastore/images/box-limited-edition-sm.jpg') }}');"></div>
                </div>
                <div class="sn_slider_banner_banner col-lg-6 mt-3">
                    <div class="sn_slider_banner_banner_image"
                         style="background-image: url('{{ asset('modules/fresciastore/images/box-kit.jpg') }}');"></div>
                </div>
                <div class="sn_slider_banner_banner col-lg-6 mt-3">
                    <div class="sn_slider_banner_banner_image"
                         style="background-image: url('{{ asset('modules/fresciastore/images/box-selection.jpg') }}');"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- NEWSLETTER START -->
    <section class="sn_newsletter py-3 mb-lg-10 mb-5">
        <div class="container">
            <div class="row"></div>
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-4 d-flex mb-3 mb-lg-0">
                    <div>
                        <h3>Vrei să fii la curent cu ofertele și reducerile noastre?</h3>
                        <p>Abonează-te acum la Newsletter-ul nostru!</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="sn_form" method="POST" action="https://supermercatideco.gruppoarena.it/#result_newsletter">
                        <div class="row">
                            <div class="form-group col-8">
                                <input type="email" name="newsletter_email" class="form-control" placeholder="E-mail" required="">
                            </div>
                            <div class="form-group col-4">
                                <input type="submit" value="VREAU!" class="btn btn-outline-white btn-block">
                            </div>
                            <div class="form-group col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="newsletter_privacy" class="custom-control-input" id="newsletter-consense" required="">
                                    <label class="custom-control-label" for="newsletter-consense">Sunt
                                        de acord cu prelucrarea datelor cu caracter personal pentru a primi
                                        informații despre oferte, reduceri și inițiative din lumea
                                        supermarketului Frescia Store, în conformitate cu politica GDPR.
                                        <a href="#" target="_blank" style="color:white;">Vezi Politica de confidențialitate </a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- NEWSLETTER STOP -->
    <!-- VIDEO SECTION START -->
    <section class="sn_videos mt-4 mt-lg-7 mb-lg-10 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto text-center mb-4">
                    <h2 class="p text-uppercase">Video</h2>
                    <p>Valorile noastre, sfaturi pentru rețetele tale, magazine
                        noi și toate noutățile: explorați videoclipurile noastre pentru a afla
                        totul Frescia Store.</p>
                </div>
            </div>
            <div class="row">
                <div class="sn_videos_i col-lg-6 _big mb-3">
                    <div class="sn_videos_i_image" style="background-image: url('{{ asset('modules/fresciastore/images/video-preview.jpg') }}');"></div>
                    <div class="sn_videos_i_icon">
                        <a class="sn_videos_i_link" href="https://www.youtube.com/watch?v=bmlypidMQg4">
                        </a><a class="sn_videos_i_link" href="https://youtu.be/NmVGvDjoUno">
                            <img class="small-play" src="{{ asset('modules/fresciastore/images/play.png') }}">
                        </a>

                    </div>
                    <div class="sn_videos_i_title">VIDEO 1</div>
                </div>
                <div class="sn_videos_i col-lg-6 _big mb-3">
                    <div class="sn_videos_i_image" style="background-image: url('{{ asset('modules/fresciastore/images/video-preview.jpg') }}');"></div>
                    <div class="sn_videos_i_icon">
                        <a class="sn_videos_i_link" href="https://youtu.be/NmVGvDjoUno">
                            <img class="small-play" src="{{ asset('modules/fresciastore/images/play.png') }}">
                        </a>
                    </div>
                    <div class="sn_videos_i_title">VIDEO 2</div>
                </div>
                <div class="sn_videos_i col-lg-3 _small mb-3">
                    <div class="sn_videos_i_image" style="background-image: url('{{ asset('modules/fresciastore/images/video-preview.jpg') }}');"></div>
                    <div class="sn_videos_i_icon">
                        <a class="sn_videos_i_link" href="https://youtu.be/9_dpB7B7lV8">
                        </a><a class="sn_videos_i_link" href="https://youtu.be/NmVGvDjoUno">
                            <img class="small-play" src="{{ asset('modules/fresciastore/images/play.png') }}">
                        </a>

                    </div>
                    <div class="sn_videos_i_title">VIDEO 3</div>
                </div>
                <div class="sn_videos_i col-lg-3 _small mb-3">
                    <div class="sn_videos_i_image" style="background-image: url('{{ asset('modules/fresciastore/images/video-preview.jpg') }}');"></div>
                    <div class="sn_videos_i_icon">
                        <a class="sn_videos_i_link" href="https://youtu.be/XbHWPeRezek">
                        </a><a class="sn_videos_i_link" href="https://youtu.be/NmVGvDjoUno">
                            <img class="small-play" src="{{ asset('modules/fresciastore/images/play.png') }}">
                        </a>

                    </div>
                    <div class="sn_videos_i_title">VIDEO 4</div>
                </div>
                <div class="sn_videos_i col-lg-3 _small mb-3">
                    <div class="sn_videos_i_image" style="background-image: url('{{ asset('modules/fresciastore/images/video-preview.jpg') }}');"></div>
                    <div class="sn_videos_i_icon">
                        <a class="sn_videos_i_link" href="https://youtu.be/DnldsTczZKE">
                        </a><a class="sn_videos_i_link" href="https://youtu.be/NmVGvDjoUno">
                            <img class="small-play" src="{{ asset('modules/fresciastore/images/play.png') }}">
                        </a>

                    </div>
                    <div class="sn_videos_i_title">VIDEO 5</div>
                </div>
                <div class="sn_videos_i col-lg-3 _small mb-3">
                    <div class="sn_videos_i_image" style="background-image: url('{{ asset('modules/fresciastore/images/video-preview.jpg') }}');"></div>
                    <div class="sn_videos_i_icon">
                        <a class="sn_videos_i_link" href="https://youtu.be/TLI86uszHgg">
                        </a><a class="sn_videos_i_link" href="https://youtu.be/NmVGvDjoUno">
                            <img class="small-play" src="{{ asset('modules/fresciastore/images/play.png') }}">
                        </a>

                    </div>
                    <div class="sn_videos_i_title">VIDEO 6</div>
                </div>
            </div>
            <div class="text-center">
                <a href="https://www.youtube.com/channel/UCLycjYbbZca2L8MN9emrJUA" target="_blank" class="btn btn-outline-black">VEZI MAI MULT</a>
            </div>
        </div>
    </section>
    <!-- VIDEO SECTION STOP -->
@endsection
@section("scripts")
    <script src="{{ asset('modules/fresciastore/js/slider/TweenMax.min.js') }}"></script>
    <script src="{{ asset('modules/fresciastore/js/slider/sliderTweenMax.js') }}"></script>
@endsection
