<!-- footer
================================================== -->
<footer>
    <div class="container">
        <div class="footer-widgets-part">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget text-widget">
                        <h1><span>{{__("Nedaa Post")}}</span></h1>
                        <p>{{theme_option('who_we_are')}} </p>
                    </div>

                </div>

                <div class="col-md-3">
                    <div class="widget  links-widget">
                        <h1><span>{{__("من نحن")}}</span></h1>
                        <ul class="">

                            <li><span class="time-now"><a
                                            href="/<?=app()->getLocale()?>/contact-us">{{__('Contact Us')}}</a></span>
                            </li>
                            <li><span class="time-now"><a
                                            href="/<?=app()->getLocale()?>/about-us">{{__('About Us')}}</a></span>
                            </li>
                            <li><span class="time-now"><a
                                            href="/<?=app()->getLocale()?>/alahkam-oalshrot">{{__('الأحكام والشروط')}}</a></span>
                            </li>
                            <li><span class="time-now"><a
                                            href="/<?=app()->getLocale()?>/">{{__('سياسة الخصوصية')}}</a></span>
                            </li>
                            <li><span class="time-now"><a
                                            href="/<?=app()->getLocale()?>/">{{__('هيئة التحرير')}}</a></span>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget Subscribe-widget">
                        <h1><span>{{__("تواصل معنا")}}</span></h1>
                        <p>{{__('إشترك في قائمتنا البريدية')}}</p>
                        <form action="#">
                            <input type="/" placeholder="البريد الألكتروني" />
                            <input type="submit" value="إشترك" />
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget social-widget">
                        <h1><span>{{__('Social Media')}}</span></h1>
                        <a class="" href="/">
                            <img width="120" style="margin-bottom: 20px"
                                 src="{{ RvMedia::getImageUrl(theme_option('logo', Theme::asset()->url('images/logo.png'))) }}"
                                 alt="Nedaa Post logo"></a>
                        <br>
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
            <div class="footer-last-line">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="">

                        {!!
                        Menu::renderMenuLocation('footer-menu', [
                        'options' => ['class' => 'footer-nav'],
                        'theme' => true,
                        'view' => 'custom-menu',

                        ])
                        !!}
                    </div>
                    <div class="col-md-12">
                        <p class="no-margin fz-13 text-center"> {!! clean(theme_option('copyright')) !!} {{__("Developed by")}}
                            , <a href="https://pad-tr.com/" target="_blank">padtech</a></p>
                    </div>

                </div>
            </div>
        </div>
</footer>
<!-- End footer -->
<!-- Popup itself -->


<!-- End Container -->
{{--{!! Theme::footer() !!}--}}
<script type="text/javascript" src="/themes/nedaa-post-new/js/jquery.min.js"></script>
<script type="text/javascript" src="/themes/nedaa-post-new/js/jquery.migrate.js"></script>
<script type="text/javascript" src="/themes/nedaa-post-new/js/jquery.bxslider.min.js"></script>

<script type="text/javascript" src="/themes/nedaa-post-new/js/bootstrap.min.js"></script>

@if(app()->getLocale()=='ar')
    <script type="text/javascript" src="/themes/nedaa-post-new/js/jquery.ticker.js"></script>
@else

    <script type="text/javascript" src="/themes/nedaa-post-new/js/en-jquery.ticker.js"></script>
@endif




<script type="text/javascript" src="/themes/nedaa-post-new/js/jquery.imagesloaded.min.js"></script>
<script type="text/javascript" src="/themes/nedaa-post-new/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="/themes/nedaa-post-new/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/themes/nedaa-post-new/js/script2.js?v=<?php $date = new \DateTime('now');
echo $date->format('d.G.i'); ?>"></script>
<script type="text/javascript" src="/themes/nedaa-post-new/js/custom.js"></script>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
{!! Theme::footer() !!}
@yield('page-js-script')



        </body>

        </html>