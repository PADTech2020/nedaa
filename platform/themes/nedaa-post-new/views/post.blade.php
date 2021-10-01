
<!-- block-wrapper-section
================================================== -->
<section class="block-wrapper article-page">
    <div class="container">
        <div class="row">

            <div class="col-md-9 col-sm-12">

                <!-- block content -->
                <div class="block-content">

                    <!-- single-post box -->
                    <div class="single-post-box">
                        <div class="title-post new-dark-style">
                            <h1>{{ $post->name }}</h1>
                            <ul class="post-tags">
                                <li><i class="fa fa-list-alt"></i><a
                                            href="{{ $post->categories->last()->url }}">{{ $post->categories->last()->name }}</a>
                                </li>
                                <li><i class="fa fa-user"></i><a
                                            href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->getName() }}</a>
                                </li>
                                <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                </li>
                                <!-- <li><i class="fa fa-eye"></i>{{ $post->views }}</li> -->
                            </ul>
                        </div>

                        <div class="post-gallery">
                            <img src="{{ RvMedia::getImageUrl($post->image) }}"
                                 alt="{{ $post->name }}">
                            <span class="image-caption">{{ $post->caption }}</span>
                        </div>

                        {!!  $post->content !!}


                        <div class="post-tags-box">
                            <ul class="tags-box">
                                @if (!$post->tags->isEmpty())
                                    <li><i class="fa fa-tags"></i><span>{{__("Tags")}}:</span></li>
                                    @foreach ($post->tags as $tag)
                                        <li><a href="{{ $tag->url }}">{{ $tag->name }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <div class="share-post-box">
                            <ul class="share-box">
                                <li><a class="facebook" target="_blank"
                                       href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i
                                                class="fa fa-facebook"></i><span></span></a></li>
                                <li><a class="twitter" target="_blank"
                                       href="https://twitter.com/share?url={{ urlencode(url()->current()) }}&text={{ $post->description }}"><i
                                                class="fa fa-twitter"></i><span></span></a></li>

                                <li><a class="whatsapp"
                                       href="whatsapp://send?text={{ url()->current() }}"
                                       data-action="share/whatsapp/share"><i
                                                class="fa fa-whatsapp" aria-hidden="true"></i><span></span></a></li>
                                <li><a class="telegram"
                                       href="javascript:window.open('https://t.me/share/url?url={{ url()->current() }}')"><i
                                                class="fa fa-telegram" aria-hidden="true"></i><span></span></a></li>
                                <li><a class="linkedin" target="_blank"
                                       href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}"><i
                                                class="fa fa-linkedin"></i><span></span></a></li>
                                <li><a class="google" target="_blank"
                                       href="mailto:?subject={{ $post->name }}&body={{ urlencode($post->url) }} <br> {{ $post->description }}"><i
                                                class="fa fa-envelope"></i><span></span></a></li>
                                @if($post->short_link)
                                    <li style="position: relative"><a id="short_link_ico2" class="linkedin"><i
                                                    class="fa fa-link"></i><span>
                                        </span></a>
                                        <div id="short_link" class="short_link"><a class="copy-link "><i
                                                        class="fa fa-copy"></i></a>
                                            <input class="text_short_link" id="text_short_link" type="text"
                                                   value="https://nedaa-post.com/article/{{ $post->short_link }}"/>
                                        </div>
                                    </li>
                                @endif

                            </ul>
                        </div>
                        @if($post->categories->last()->name == 'رأي')
                        <div style="border: 3px solid #9d2225;padding: 10px;background: #f2f2f2;font-weight: bold;">
                                     <span style="font-weight: bold; text-align:center;color: #000000;">{{__('المقالات المنشورة في "نداء بوست" تعبّر عن آراء كتابها وليس بالضرورة عن رأي الموقع.')}}
                                 </span></div><br>
                        @endif
                        <br>



                        <!-- carousel box -->
                        <div class="carousel-box owl-wrapper">
                            <div class="title-section">
                                <h1><span>{{__("You might like it.")}}</span></h1>
                            </div>
                            <div class="owl-carousel" data-num="3">

                                @foreach (get_related_posts($post->slug, 4) as $related_item)
                                    <div class="item news-post image-post3">
                                        <img src="{{ RvMedia::getImageUrl($related_item->image,'under_post') }}"
                                             alt="{{ $related_item->name }}">
                                        <div class="hover-box">
                                            <h2><a href="{{ $related_item->url }}">{{ $related_item->name }}</a></h2>
                                            <ul class="post-tags">
                                                <li>
                                                    <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- End carousel box -->
                    </div>
                </div>
                <!-- End block content -->

            </div>


            <div class="col-md-3 col-sm-4">

                <!-- sidebar -->
                <div class="sidebar large-sidebar">
                    {!! do_shortcode('[author-box id="'.$post->researcher->id.'"][/author-box]') !!}
                </div>
                <!-- End sidebar -->

            </div>

        </div>

    </div>
</section>

<!-- End block-wrapper-section -->