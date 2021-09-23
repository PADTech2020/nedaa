<!doctype html>
<html lang="{{ app()->getLocale() }}" class="no-js">

<head>
    <title>{{ \SeoHelper::getTitle() }}</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Markazi+Text:wght@400;500;600;700&display=swap"
          rel="stylesheet">


    {!! Theme::header() !!}

    <link rel="stylesheet" type="text/css" href="/themes/nedaa-post-new/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/themes/nedaa-post-new/css/jquery.bxslider.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/themes/nedaa-post-new/css/magnific-popup.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/themes/nedaa-post-new/css/owl.carousel.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/themes/nedaa-post-new/css/owl.theme.css" media="screen">

    <meta name="wot-verification" content="fe3132ad710d8e69ea21"/>

    <link rel="stylesheet" type="text/css" href="/themes/nedaa-post-new/css/ekko-lightbox.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/themes/nedaa-post-new/css/ticker-style.css"/>
    <link rel="stylesheet" type="text/css" href="/themes/nedaa-post-new/css/style2.css" media="screen">
    <link rel="stylesheet" type="text/css"
          href="/themes/nedaa-post-new/css/nedaa-style.css?v=<?php $date = new \DateTime('now');
          echo $date->format('d.G.i'); ?>" media="screen">
    <link rel="stylesheet" type="text/css"
          href="/themes/nedaa-post-new/css/new-style.css?v=<?php $date = new \DateTime('now');
          echo $date->format('d.G.i'); ?>" media="screen">

    @yield('post-tr')


    @if (class_exists('Language', false) && app()->getLocale()=='en')
        <link rel="stylesheet" href="/themes/nedaa-post-new/css/en-style.css?v=<?php echo rand(1, 999) ?>">
    @endif
    <link rel="icon" type="image/png" sizes="16x16" href="/themes/nedaa-post-new/upload/ms-icon-310x310.png">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-170276153-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-170276153-1');
    </script>


</head>

<?php


?>
<body @if (class_exists('Language', false) && Language::getCurrentLocaleRTL()) dir="rtl"
      @endif class=" header2 lang-{{ app()->getLocale() }}">

<!-- Container -->
<div id="container" class="new-version">
    <header class="clearfix ">
        <!-- Bootstrap navbar -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation">

            <!-- Top line -->
            <div class="top-line">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <ul class="top-line-list">
                                <li><span class="time-now"><a>{{arabicDate(date(" M j, Y"))}}</a></span></li>
                                <li><span class="time-now"><a
                                                href="/<?=app()->getLocale()?>/contact-us">{{__('Contact Us')}}</a></span>
                                </li>
                                <li><span class="time-now"><a
                                                href="/<?=app()->getLocale()?>/about-us">{{__('About Us')}}</a></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="social-icons">
                                <li><a target="_blank" href="{{ theme_option('facebook') }}" class="facebook"><i
                                                class="fa fa-facebook"></i></a></li>
                                <li><a target="_blank" href="{{ theme_option('twitter') }}" class="twitter"><i
                                                class="fa fa-twitter"></i></a></li>
                                <li><a target="_blank" href="{{ theme_option('youtube') }}" class="youtube"><i
                                                class="fa fa-youtube"></i></a></li>
                                <li><a target="_blank" href="{{ theme_option('instagram') }}" class="instagram"><i
                                                class="fa fa-instagram"></i></a></li>
                                <li><a target="_blank" href="{{ theme_option('telegram') }}" class="telegram"><i
                                                class="fa fa-telegram"></i></a></li>
                                <li><a target="_blank" href="{{ theme_option('linkedin') }}" class="linkedin"><i
                                                class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top line -->

            <!-- Logo & advertisement -->

            <div class="logo-advertisement ">
                <div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand desktop" href="/"><img width="130"
                                                                      src="{{ RvMedia::getImageUrl(theme_option('logo', Theme::asset()->url('images/logo.png'))) }}"
                                                                      alt="Nedaa Post logo"></a>
                        <div class="search-button mobile-visible">
                            <button id="search"><i class="fa fa-search"></i></button>
                            <div class="search-popup">
                                <div class="search-bg"></div>
                                <div class="search-form">
                                    <form accept-charset="UTF-8" action="{{ route('public.search') }}" method="GET">
                                        <div class="form">
                                            <button type="submit" id="search-submit"><i class="fa fa-search"></i>
                                            </button>
                                            <input type="text" id="search" name="q" placeholder="{{__('Search Word')}}">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand mobile-visible" href="/">
                            <img width="80"
                                 src="{{ RvMedia::getImageUrl(theme_option('logo', Theme::asset()->url('images/logo.png'))) }}"
                                 alt="Nedaa Post logo"></a>
                    </div>
                    <div class="advertisement">
                        <div class="search-form">
                            <form accept-charset="UTF-8" action="{{ route('public.search') }}" method="GET">
                                <div class="form" style="height:30px">
                                    <button type="submit" id="search-submit"><i class="fa fa-search"></i>
                                    </button>
                                    <input type="text" id="search" name="q" placeholder="{{__('Search Word')}}">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Logo & advertisement -->

            <!-- navbar list container -->
            <div class="nav-list-container">
                <div class="container">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                        {!!
                        Menu::renderMenuLocation('main-menu', [
                            'options' => ['class' => 'nav navbar-nav navbar-left'],
                            'theme' => true,
                            'view' => 'custom-menu',
                        ])
                        !!}


                    </div>

                    <!-- /.navbar-collapse -->
                </div>
            </div>
            <!-- End navbar list container -->

        </nav>
        <!-- End Bootstrap navbar -->

    </header>


    <?php

    $breakingNews = \Botble\Blog\Models\Post::getBreakingNews(10);

    $newsTab = get_recent_posts(5);// \Botble\Blog\Models\Post::getNewsTap(5);
    $Trending=\Botble\Blog\Models\Post::getTrending(6);
    ?>
            <!-- ticker-news-section
================================================== -->
    <section class="ticker-news breakingNews">

        <div class="container">
            <div class="ticker-news-box">

                @if(count($breakingNews) > 0)
                    <span class="breaking-news">{{__('Breaking News')}}</span>
                    <ul id="js-news">
                        @foreach($breakingNews as $post)
                            <li class="news-item">
                                <span class="new-news">{{__("Breaking")}} </span>
                    <span class="time-news">
                        {{ date('Y/m/d h:s', strtotime($post->created_at)) }}</span> <a
                                        href="{{$post->url}}"> {{ $post->name }}</a>
                            </li>

                        @endforeach
                    </ul>
                @else
                    <span class="breaking-news">{{__('Latest News')}}</span>
                    <ul id="js-news">
                        @foreach($newsTab as $post)
                            <li class="news-item">
                    <span class="time-news">
                        {{ date('Y/m/d h:s', strtotime($post->created_at)) }}</span> <a
                                        href="{{$post->url}}"> {{ $post->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif

            </div>
        </div>
    </section>


    <section  class="ticker-news trends">

        <div class="container">
            <div class="ticker-news-box">

                @if(count($Trending) > 0)
                    <span class="breaking-news">{{__('Trending')}}</span>
                    <ul id="js-news-trends">
                        @foreach($Trending as $post)
                            <li class="news-item">

                    <span class="time-news">
                        {{ date('Y/m/d h:s', strtotime($post->created_at)) }}</span> <a
                                        href="{{$post->url}}"> {{ $post->name }}</a>
                            </li>

                        @endforeach
                    </ul>
                @endif

            </div>
        </div>
    </section>

