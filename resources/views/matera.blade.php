@extends('layout.base')

@section('metapage')
    <meta name="title" content="Matera | Parador Hotel & Resort"/>
    <meta name="keywords" content="Matera Community Club"/>
    <meta name="description" content="Matera Community Club">
    <meta name="keywords" content="Matera Community Club Parador Hotel Resort">
    <meta name="author" content="Parador|Juhendy">
    <meta name="google-site-verification" content="">
    <meta name="og:title" property="og:title" content="Matera | Parador Hotels &amp; Resorts">
    <meta name="og:description" property="og:description" content="Matera Community Club">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Parador Website">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:image" itemprop="image" content="{{url('/')}}/favicon.ico">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Home | Parador Hotels &amp; Resorts">
    <meta name="twitter:site" content="paradorhotels">
    <meta name="twitter:description" content="Matera Community Club">
    <meta name="twitter:image" content="{{url('/')}}/favicon.ico">
@endsection

@section('title', 'Matera')

@section('content')

<div class='content'>
    <div id="banner">
        <section id="banner_hero" class="splide banner_hero">
            <div class="splide__track" id="auto-scroll">
                <ul class="splide__list">
                    <li class="splide__slide" data-splide-interval="5000">
                        <img id="hero" class="hero" src="" alt="Banner Hero">
                    </li>
                    <li class="splide__slide" data-splide-interval="5000">
                        <img id="hero2" class="hero" src="" alt="Banner Hero">
                    </li>
                </ul>
            </div>
        </section>
    </div>

    <div id="first">
        <h3 class="titleheader"> MATERA COMMUNITY CLUB </h3>
        <p>
            Built on a <b>4,739 sqm</b> area, including a <b>1,841</b> sqm restaurant, Matera Community Club isn’t your average <b>sports</b> and <b>social</b> facility. 
        </p>
        <p>
            It’s a <b>luxurious</b> community center, designed for enhanced recreation and social connections. 
        </p>
        <p>With a <b>modern</b>, geometric design, it seamlessly caters to high-end Matera Residences residents
        </p>
    </div>

    <div id="border-divider"></div>

    <section id="meeting_room">
        <div id="second" class="container-fluid">
            <div class="secondbody" id="secondbody">
                <h3 id="second_header" class="second_header titleheader">MEETING ROOMS & BANQUET FACILITIES</h3>
    
                <div class="col-12">
                    <div id="part_1" class="row">
                        <div class="col-lg-4 col-md-12 col-12">
                            <h3 id="second_title1" class="second_title titleheader">MULTI 1</h3>
                            <p>
                                An ideal choice for larger gatherings, <b> comfortably</b> accommodating up to 50 participants within its spacious dimensions of 10.83 meters by 9.10 meters. Whether you’re hosting a conference, seminar, or special event, this room offers ample space and comfort, ensuring a productive and engaging experience for all attendees.
                            </p>
                            <button type="button" class="btn btn-booknow enquiri_booknow" id="enquiri_booknow1" data-toggle="modal" >
                                Book Now
                            </button>
                            {{-- <div class="dimension_column">
                                <div class="dimension">
                                    <h6>Cocktail</h6>
                                    <p>50</p>
                                </div>
                                <div class="vr"></div>
                                <div class="dimension">
                                    <h6>Theatre</h6>
                                    <p>50</p>
                                </div>
                                <div class="vr"></div>
                                <div class="dimension">
                                    <h6>Classroom</h6>
                                    <p>26</p>
                                </div>
                                <div class="vr"></div>
                                <div class="dimension">
                                    <h6>Banquet</h6>
                                    <p>32</p>
                                </div>
                                <div class="vr"></div>
                                <div class="dimension">
                                    <h6>Boardroom</h6>
                                    <p>32</p>
                                </div>
                                <div class="vr"></div>
                                <div class="dimension">
                                    <h6>Hollow Square</h6>
                                    <p>24</p>
                                </div>
                                <div class="vr"></div>
                                <div class="dimension">
                                    <h6>U-Shape</h6>
                                    <p>16</p>
                                </div>
                            </div> --}}
                        </div>
                        <div id="second_image1" class="second_image col-lg-8 col-md-12 col-12">
                            <section id="second_image1_slider" class="splide second_image1_slider" aria-label="Multi 1">
                                <div class="splide__track" id="auto-scroll">
                                    <ul class="splide__list">
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi1_1" alt="multi1">
                                        </li>
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi1_2" alt="multi2">
                                        </li>
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi1_3" alt="multi3">
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                        <div class="dimension_column">
                            <div class="dimension">
                                <h6>Cocktail</h6>
                                <p>50</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Theatre</h6>
                                <p>50</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Classroom</h6>
                                <p>26</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Banquet</h6>
                                <p>32</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Boardroom</h6>
                                <p>32</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Hollow Square</h6>
                                <p>24</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>U-Shape</h6>
                                <p>16</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-12">
                    <div id="part_2" class="row">
                        <div id="second_image2" class="second_image col-lg-8 col-md-12 col-12">
                            <section id="second_image2_slider" class="splide second_image2_slider" aria-label="Multi 2">
                                <div class="splide__track" id="auto-scroll">
                                    <ul class="splide__list">
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi2_1" alt="multi1">
                                        </li>
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi2_2" alt="multi2">
                                        </li>
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi2_3" alt="multi3">
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12">
                            <h3 id="second_title2" class="second_title titleheader">MULTI 2</h3>
                            <p>
                                For more intimate meetings and events with up to 20 participants, this meeting room provides a <b> cozy and focused </b> atmosphere. With dimensions of 9.69 meters by 3.36 meters, it is perfect for workshops, small conferences, and team meetings, offering an ideal environment for effective discussions and collaboration.
                            </p>
                            <button type="button" class="btn btn-booknow enquiri_booknow" id="enquiri_booknow2" data-toggle="modal" >
                                Book Now
                            </button>
                        </div>
                        <div id="second_image2_mobile" class="second_image col-lg-8 col-md-12 col-12">
                            <section id="second_image2_slider_mobile" class="splide second_image2_slider_mobile" aria-label="Multi 2">
                                <div class="splide__track" id="auto-scroll">
                                    <ul class="splide__list">
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi2_1" alt="multi1">
                                        </li>
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi2_2" alt="multi2">
                                        </li>
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi2_3" alt="multi3">
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                        <div class="dimension_column">
                            <div class="dimension">
                                <h6>Cocktail</h6>
                                <p>50</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Theatre</h6>
                                <p>50</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Classroom</h6>
                                <p>26</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Banquet</h6>
                                <p>32</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Boardroom</h6>
                                <p>32</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Hollow Square</h6>
                                <p>24</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>U-Shape</h6>
                                <p>16</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-12">
                    <div id="part_3" class="row">
                        <div class="col-lg-4 col-md-12 col-12">
                            <h3 id="second_title1" class="second_title titleheader">SOCIAL SPACE 1</h3>
                            <p>
                                At Matera Community Club, our Social Space, spanning 8.98 meters by 9.12 meters, serves as a captivating canvas for crafting cherished memories. Whether it’s an <b> intimate </b> gathering among loved ones or a grand and joyous wedding celebration, our versatile venue is poised to transform your special moments into unforgettable treasures.
                            </p>
                            <button type="button" class="btn btn-booknow enquiri_booknow" id="enquiri_booknow3" data-toggle="modal" >
                                Book Now
                            </button>
                        </div>
                        <div id="second_image3" class="second_image col-lg-8 col-md-12 col-12">
                            <section id="second_image3_slider" class="splide second_image3_slider" aria-label="Multi 3">
                                <div class="splide__track" id="auto-scroll">
                                    <ul class="splide__list">
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi3_1" alt="multi1">
                                        </li>
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi3_2" alt="multi2">
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                        <div class="dimension_column">
                            <div class="dimension">
                                <h6>Cocktail</h6>
                                <p>50</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Theatre</h6>
                                <p>50</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Classroom</h6>
                                <p>26</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Banquet</h6>
                                <p>32</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Boardroom</h6>
                                <p>32</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Hollow Square</h6>
                                <p>24</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>U-Shape</h6>
                                <p>16</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div id="part_4" class="row">
                        <div id="second_image4" class="second_image col-lg-8 col-md-12 col-12">
                            <section id="second_image4_slider" class="splide second_image4_slider" aria-label="SOCIAL SPACE 2">
                                <div class="splide__track" id="auto-scroll">
                                    <ul class="splide__list">
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi4_1" alt="socialspace2_1">
                                        </li>
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi4_2" alt="socialspace2_2">
                                        </li>
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi4_3" alt="socialspace2_3">
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12">
                            <h3 id="second_title1" class="second_title titleheader">SOCIAL SPACE 2</h3>
                            <p>
                                At Matera Community Club, our Social Space, spanning 8.98 meters by 9.12 meters, serves as a captivating canvas for crafting cherished memories. Whether it’s an <b> intimate </b> gathering among loved ones or a grand and joyous wedding celebration, our versatile venue is poised to transform your special moments into unforgettable treasures.
                            </p>
                            <button type="button" class="btn btn-booknow enquiri_booknow" id="enquiri_booknow4" data-toggle="modal" >
                                Book Now
                            </button>
                        </div>
                        <div id="second_image4_mobile" class="second_image col-lg-8 col-md-12 col-12">
                            <section id="second_image4_slider_mobile" class="splide second_image4_slider_mobile" aria-label="SOCIAL SPACE 2">
                                <div class="splide__track" id="auto-scroll">
                                    <ul class="splide__list">
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi4_1" alt="socialspace2_1">
                                        </li>
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi4_2" alt="socialspace2_2">
                                        </li>
                                        <li class="splide__slide" data-splide-interval="5000">
                                            <img src="" id="image_multi4_3" alt="socialspace2_3">
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                        <div class="dimension_column">
                            <div class="dimension">
                                <h6>Cocktail</h6>
                                <p>50</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Theatre</h6>
                                <p>50</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Classroom</h6>
                                <p>26</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Banquet</h6>
                                <p>32</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Boardroom</h6>
                                <p>32</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>Hollow Square</h6>
                                <p>24</p>
                            </div>
                            <div class="vr"></div>
                            <div class="dimension">
                                <h6>U-Shape</h6>
                                <p>16</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="facilities">
        <div id="third" class="container-fluid">
            <div class="thirdbody" id="thirdbody">
                <h3 id="third_header" class="third_header titleheader">FACILITIES</h3>
    
                <p>
                    Matera Community Club, housed in an elegant two-story building, provides various <b> indoor and outdoor </b> sports facilities, including a swimming pool, function hall, sports hall, and more. The second floor features a gym and yoga rooms with glass walls for pool views, and also offers a mini bowling alley, and outdoor putt-putt golf enhancing the <b> unique experience</b>
                </p>

                <div class="facilities_section" id="facilities_section">
                    <div class="facilities_content">
                            <a href="/images/DSCF1494edit.webp" id="lightbox_facilities_foyer" data-toggle="lightbox" data-title="Foyer">
                                <img id="facilities_foyer" class="facilities_foyer" src="" alt="facilities foyer">
                                <h3 class="text-left titleheader">Foyer</h3>
                                <p class="text-left">
                                    The foyer offers a captivating view of the expansive swimming pool and features transparent windows that lead to the function hall…
                                </p>
                            </a>
                    </div>
                    <div class="facilities_content">
                        <a href="/images/DSCF1482edit.webp" id="lightbox_facilities_outdoor" data-toggle="lightbox" data-title="Outdoor Function Hall">
                            <img id="facilities_outdoor" class="facilities_outdoor" src="" alt="facilities outdoor">
                            <h3 class="text-left titleheader">Outdoor Function Hall</h3>
                            <p class="text-left">
                                Our outdoor function hall is the perfect venue for hosting a wide range of events and gatherings…
                            </p>
                        </a>
                    </div>
                    <div class="facilities_content">
                        <a href="/images/DSCF1392edit.webp" id="lightbox_facilities_golf" data-toggle="lightbox" data-title="Kid's Putt-Putt Golf">
                            <img id="facilities_golf" class="facilities_golf" src="" alt="facilities golf">
                            <h3 class="text-left titleheader">Kid's Putt-Putt Golf</h3>
                            <p class="text-left">
                                On the second floor, our open-air space features a delightful Putt-Putt Golf area designed for children…
                            </p>
                        </a>
                    </div>
                    <div class="facilities_content">
                        <a href="/images/DSCF1515edit.webp" id="lightbox_facilities_kid" data-toggle="lightbox" data-title="Kids Corner">
                            <img id="facilities_kid" class="facilities_kid" src="" alt="facilities kid">
                            <h3 class="text-left titleheader">Kids Corner</h3>
                            <p class="text-left">
                                At the lobby, our Kids Corner provides a direct view of the swimming pool through large windows, creating an enjoyable experience for children playing inside..
                            </p>
                        </a>
                    </div>
                    <div class="facilities_content">
                        <a href="/images/DSCF1509edit.webp" id="lightbox_facilities_billiard" data-toggle="lightbox" data-title="Billiard">
                            <img id="facilities_billiard" class="facilities_billiard" src="" alt="facilities billiard">
                            <h3 class="text-left titleheader">Billiard</h3>
                            <p class="text-left">
                                Located on the first floor and facing the Kids Corner, our Billiard Area provides a relaxed and entertaining atmosphere for enthusiasts…
                            </p>
                        </a>
                    </div>
                    <div class="facilities_content">
                        <a href="/images/DSCF1465edit.webp" id="lightbox_facilities_sport" data-toggle="lightbox" data-title="Sports Hall">
                            <img id="facilities_sport" class="facilities_sport" src="" alt="facilities sport">
                            <h3 class="text-left titleheader">Sports Hall</h3>
                            <p class="text-left">
                                Our indoor sports hall is designed with transparent sides to allow natural airflow for users, ensuring a comfortable and invigorating environment…
                            </p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="guide-toolbar">
        <ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
            <!--begin::Item-->
            <li class="nav-item mb-2" id="nav_destination" data-toggle="tooltip" title="Multi 1" data-placement="left" data-original-title="Check out more demos">
                <a class="btn btn-sm btn-icon btn-outline-secondary" data-destination="part_1" href="#">
                    <i class="dot-nav"></i>
                </a>
            </li>
            <!--end::Item-->
        
            <!--begin::Item-->
            <li class="nav-item mb-2" data-toggle="tooltip" title="Multi 2" data-placement="left" data-original-title="Layout Builder">
                        <a class="btn btn-sm btn-icon btn-outline-secondary" data-destination="part_2" href="#">
                    <i class="dot-nav"></i>
                </a>
            </li>
            <!--end::Item-->
        
            <!--begin::Item-->
            <li class="nav-item mb-2" data-toggle="tooltip" title="Social Space 1" data-placement="left" data-original-title="Documentation">
                <a class="btn btn-sm btn-icon btn-outline-secondary" data-destination="part_3" href="#">
                    <i class="dot-nav"></i>
                </a>
            </li>
            <!--end::Item-->
        
            <!--begin::Item-->
            <li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="Social Space 2" data-placement="left" data-original-title="Chat Example">
                <a class="btn btn-sm btn-icon btn-outline-secondary" data-destination="part_4" href="#">
                    <i class="dot-nav"></i>
                </a>
            </li>
            <!--end::Item-->

            <!--begin::Item-->
            <li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="Facilities" data-placement="left" data-original-title="Chat Example">
                <a class="btn btn-sm btn-icon btn-outline-secondary" data-destination="third" href="#">
                    <i class="dot-nav"></i>
                </a>
            </li>
            <!--end::Item-->
        </ul>
    </section>
    @include('enquiry_sales')
</div>

@endsection

@section('path_page_js', 'resources/js/matera.js' )
