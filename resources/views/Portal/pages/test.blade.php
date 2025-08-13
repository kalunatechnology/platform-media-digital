<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ asset('css/style_artikel_page.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/media_query.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/modernizr-3.5.0.min.js') }}"></script>
</head>

<body>
    <style>
        .banner-section {
            font-family: 'Sora', sans-serif;
            background-image: url('{{ asset('images/artikel-bg.jpg') }}');
            background-position: center;
            background-size: cover;
            color: #000;
            padding: 150px;
        }

        .banner-section h2 {
            color: #000000;
        }

        .fh5co_suceefh5co_height_position_absolute_font .custom-title a {
            font-size: 30px !important;
            /* Normal view font size */
        }

        .fh5co_suceefh5co_height_position_absolute_font_2 .custom-title2 a {
            font-size: 12px !important;
            /* Normal view font size */
        }

        @media (max-width: 768px) {
            .banner-top {
                padding-top: 100px;
            }

            .konten1 {
                padding: 20px;
                margin-left: 0;
            }

            .container-konten {
                margin-bottom: 20px;
            }

            .banner-section {
                padding: 50px;
            }

            .banner-section h2 {
                font-size: 15px;
            }

            .fh5co_suceefh5co_height_position_absolute_font .custom-title a {
                font-size: 14px !important;
                /* Smaller font size for screens 768px and below */
            }

            .fh5co_suceefh5co_height_position_absolute_font_2 .custom-title2 a {
                font-size: 10px !important;
                /* Smaller font size for screens 768px and below */
            }

        }

    </style>
    <section class="banner-section">
        <div class="row text-right my-4 banner-top">
            <h2><b>DESTINASI IMPIAN </b></h2>
            <h2><span style="color: #000000;"><b>TIPS TERBAIK</b></span></h2>
            <h2><b>PENGALAMAN TAK TERLUPAKAN</b></h2>
        </div>
    </section>
    <div class="container-fluid paddding mb-5">
        <div class="row mx-0">

            {{-- Dummy untuk get_new --}}
            <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
                <div class="fh5co_suceefh5co_height">
                    <img src="{{ asset('images/dummy-new1.jpg') }}" alt="img" />
                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                    <div class="fh5co_suceefh5co_height_position_absolute_font">
                        <div>
                            <a style="text-decoration: none" class="color_fff">
                                <i class="fa-regular fa-calendar-days"></i>&nbsp;&nbsp;10 April 2025
                            </a>
                        </div>
                        <div class="custom-title">
                            <a href="#" class="fh5co_good_font">
                                Judul Utama Dummy 1
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Dummy untuk get_new2 --}}
            <div class="col-md-6">
                <div class="row">

                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2">
                            <img src="{{ asset('images/dummy-new2.jpg') }}" alt="img" />
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div>
                                    <a style="text-decoration: none" class="color_fff">
                                        <i class="fa-regular fa-calendar-days"></i>&nbsp;&nbsp;11 April 2025
                                    </a>
                                </div>
                                <div class="custom-title2">
                                    <a href="#" class="fh5co_good_font_2">
                                        Judul Artikel Dummy 2
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2">
                            <img src="{{ asset('images/dummy-new3.jpg') }}" alt="img" />
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div>
                                    <a style="text-decoration: none" class="color_fff">
                                        <i class="fa-regular fa-calendar-days"></i>&nbsp;&nbsp;12 April 2025
                                    </a>
                                </div>
                                <div class="custom-title2">
                                    <a href="#" class="fh5co_good_font_2">
                                        Judul Artikel Dummy 3
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid pt-3">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Pilihan Editor</div>
            </div>
            <div class="owl-carousel owl-theme js" id="slider1">

                <div class="item px-2">
                    <div class="fh5co_latest_trading_img_position_relative">
                        <div class="fh5co_latest_trading_img">
                            <img src="{{ asset('images/dummy-editor1.jpg') }}" alt=""
                                class="fh5co_img_special_relative" />
                        </div>
                        <div class="fh5co_latest_trading_img_position_absolute"></div>
                        <div class="fh5co_latest_trading_img_position_absolute_1">
                            <a href="#" class="text-white title-topik">
                                Judul Artikel Pilihan 1
                            </a>
                            <div class="fh5co_latest_trading_date_and_name_color">
                                Editor Dummy - 03 Januari 2025
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item px-2">
                    <div class="fh5co_latest_trading_img_position_relative">
                        <div class="fh5co_latest_trading_img">
                            <img src="{{ asset('images/dummy-editor2.jpg') }}" alt=""
                                class="fh5co_img_special_relative" />
                        </div>
                        <div class="fh5co_latest_trading_img_position_absolute"></div>
                        <div class="fh5co_latest_trading_img_position_absolute_1">
                            <a href="#" class="text-white title-topik">
                                Judul Artikel Pilihan 2
                            </a>
                            <div class="fh5co_latest_trading_date_and_name_color">
                                Penulis Contoh - 04 Januari 2025
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item px-2">
                    <div class="fh5co_latest_trading_img_position_relative">
                        <div class="fh5co_latest_trading_img">
                            <img src="{{ asset('images/dummy-editor3.jpg') }}" alt=""
                                class="fh5co_img_special_relative" />
                        </div>
                        <div class="fh5co_latest_trading_img_position_absolute"></div>
                        <div class="fh5co_latest_trading_img_position_absolute_1">
                            <a href="#" class="text-white title-topik">
                                Judul Artikel Pilihan 3
                            </a>
                            <div class="fh5co_latest_trading_date_and_name_color">
                                Editor Test - 05 Januari 2025
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid fh5co_video_news_bg pb-4">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4 ">Jelajah Alam Indonesia</div>
            </div>
            <div>
                <div class="owl-carousel owl-theme" id="slider3">
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe id="video" width="100%" height="200"
                                        src="https://www.youtube.com/embed/qjP4QdZK7tc?si=QxeI-L6I7zWgeEpt"
                                        frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide">
                                    <img src="images/ariel-lustre-208615.jpg" alt="" />
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide"
                                    id="play-video">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                    <span class="">Wonderful Indonesia | Bali </span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe id="video_2" width="100%" height="200"
                                        src="https://www.youtube.com/embed/1V_4-f5Ocy4?si=Me_zu1y1SxLJdr1f"
                                        frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_2">
                                    <img src="images/39-324x235.jpg" alt="" /></div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_2"
                                    id="play-video_2">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                    <span class="">Wonderful Indonesia | Yogyakarta</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe id="video_3" width="100%" height="200"
                                        src="https://www.youtube.com/embed/HZVuxztLDwI?si=mRsOsKQ4G038qu4U"
                                        frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_3">
                                    <img src="images/joe-gardner-75333.jpg" alt="" /></div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_3"
                                    id="play-video_3">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                    <span class="">Visit KarimunJawa | KarimunJawa</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe id="video_4" width="100%" height="200"
                                        src="https://www.youtube.com/embed/ruKqXQ2KtH4?si=ZhVixFQoszSs1Kpw"
                                        frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_4">
                                    <img src="images/vil-son-35490.jpg" alt="" />
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_4"
                                    id="play-video_4">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                    <span class="">Wonderful Indonesia | East Java</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Jelajahi Artikel</div>
                    </div>

                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img">
                                    <img src="{{ asset('images/dummy-thumbnail.jpg') }}" alt="" />
                                </div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="#" class="fh5co_magna py-2">
                                Judul Artikel Dummy 1
                            </a><br>
                            <a class="fh5co_mini_time py-3"> Penulis Dummy - 01 Januari 2025 </a>
                            <div class="fh5co_consectetur">
                                Ini adalah deskripsi singkat artikel dummy yang hanya digunakan sebagai contoh tampilan.
                            </div>
                        </div>
                    </div>

                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img">
                                    <img src="{{ asset('images/dummy-thumbnail2.jpg') }}" alt="" />
                                </div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="#" class="fh5co_magna py-2">
                                Judul Artikel Dummy 2
                            </a><br>
                            <a class="fh5co_mini_time py-3"> Penulis Contoh - 02 Januari 2025 </a>
                            <div class="fh5co_consectetur">
                                Deskripsi singkat artikel dummy kedua yang menampilkan ringkasan isi konten.
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Kategori</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        <a href="#" class="fh5co_tagg">Kategori A</a>
                        <a href="#" class="fh5co_tagg">Kategori B</a>
                        <a href="#" class="fh5co_tagg">Kategori C</a>
                        <a href="#" class="fh5co_tagg">Kategori D</a>
                        <a href="#" class="fh5co_tagg">Kategori E</a>
                    </div>
                </div>

            </div>
            <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
                <div class="col-12 text-center pb-4 pt-4">
                    {{-- {{ $data['get_artikel']->links() }} --}}
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
    </script>
    <!-- Waypoints -->
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
