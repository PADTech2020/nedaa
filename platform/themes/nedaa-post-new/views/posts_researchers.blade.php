<?php
    $posts = Botble\Blog\Models\Post::join("language_meta", function ($join) {
        $join->on("language_meta.reference_id", "=", "id")
            ->where(["language_meta.reference_type"=> 'Botble\Blog\Models\Post','language_meta.lang_meta_code'=>'ar']);
    })->where(['status' => Botble\Base\Enums\BaseStatusEnum::PUBLISHED(), 'researcher_id' => $researcher->id])->orderBy('created_at','desc')->paginate(12);

    $researcher = \Botble\Researchers\Models\Researchers::find($researcher->id);
?>

<!-- block-wrapper-section
    ================================================== -->
    <section class="block-wrapper left-sidebar">
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-sm-8">

                <!-- block content -->
                <div class="block-content">
                    
                    <div class="single-post-box">
                        <div class="about-more-autor">
                            <div class="tab-content">
                                <div class="tab-pane active" id="about-autor">
                                    <div class="autor-box">
                                        <img src="{{ get_object_image( $researcher->image, 'thumb') }}" alt="{{ $researcher->name }}">
                                        <div class="autor-content">
                                            <div class="autor-title">
                                                <h1><span>{{ $researcher->getName() }}</span></h1>
                                                <ul class="autor-social">
                                                    <li><a href="{{ $researcher->facebook }}" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="{{ $researcher->twitter }}" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="{{ $researcher->instagram }}" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                            <p>{{ str_replace("&nbsp;", "", strip_tags($researcher->summary)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- article box -->
                    <div class="article-box">
                        <div class="title-section">
                            <h1><span class="world">{{ $researcher->name }}</span></h1>
                        </div>

                        @if ($posts->count() > 0)
                            @foreach ($posts as $post)
                                <div class="news-post article-post">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="post-gallery">
                                                <img alt="{{ $post->name }}" src="{{ RvMedia::getImageUrl($post->image, 'post_main') }}">
                                                <a class="category-post world" href="{{$post->categories->first()->url}}">{{$post->categories->first()->name}}</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="post-content">
                                                <h2><a href="{{ $post->url }}">{{ $post->name }}</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}</li>
                                                    <li><i class="fa fa-user"></i><a href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->getName() }}</a></li>
                                                    <!-- <li><i class="fa fa-eye"></i>{{ $post->views }}</li> -->
                                                </ul>
                                                <p>{{ $post->description }}</p>
                                                <a href="{{ $post->url }}" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>قراءة المزيد</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        <div class="pagination-box">
                            {!! $posts->links() !!}
                        </div>
                        @else
                            <div class="alert alert-warning">
                                <p>{{ __('There is no data to display!') }}</p>
                            </div>
                        @endif

                    </div>
                    <!-- End article box -->
                </div>
                <!-- End block content -->

            </div>

            <div class="col-md-4 col-sm-4">

                <!-- sidebar -->
                <div class="sidebar large-sidebar">

                    <div class="widget social-widget">
                        <div class="title-section">
                             <h1><span>{{__("Stay in touch with us")}}</span></h1>
                        </div>
                        <ul class="social-share">
                            <li>
                                <a href="{{ theme_option('facebook') }}"  target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
                                <span class="number"></span>
                                <span>{{__("Followers")}}</span>
                            </li>
                            <li>
                                <a href="{{ theme_option('twitter') }}" target="_blank" class="twitter"><i
                                            class="fa fa-twitter"></i></a>
                                <span class="number"></span>
                                <span>{{__("Followers")}}</span>
                            </li>
                            <li>
                                <a href="{{ theme_option('telegram') }}" target="_blank" class="telegram"><i class="fa fa-telegram"></i></a>
                                <span class="number"></span>
                                <span>{{__("Followers")}}</span>
                            </li>
                        </ul>
                    </div>


                    <div class="widget tab-posts-widget">

                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active">
                                <a href="#option1" data-toggle="tab">الأكثر رواجاً</a>
                            </li>
                            <li>
                                <a href="#option2" data-toggle="tab">الأحدث</a>
                            </li>
                            <li>
                                <a href="#option3" data-toggle="tab">المميز</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="option1">
                                <ul class="list-posts">
                                    @foreach (get_popular_posts(5) as $post)
                                        <li>
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar') }}" alt="{{ $post->name }}">
                                            <div class="post-content">
                                                <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
                                                <ul class="post-tags">
                                                    <li>
                                                        <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-pane" id="option2">
                                <ul class="list-posts">
                                    @foreach (get_recent_posts(5) as $post)
                                        <li>
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar') }}" alt="{{ $post->name }}">
                                            <div class="post-content">
                                                <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
                                                <ul class="post-tags">
                                                    <li>
                                                        <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-pane" id="option3">
                                <ul class="list-posts">

                                    @foreach (get_featured_posts(5) as $post)
                                        <li>
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar') }}" alt="{{ $post->name }}">
                                            <div class="post-content">
                                                <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
                                                <ul class="post-tags">
                                                    <li>
                                                        <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="widget post-widget">
                        <a class="twitter-timeline" data-height="600" href="https://twitter.com/NEDAAPOST?ref_src=twsrc%5Etfw">
                            آخر التغريدات
                        </a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>

                </div>
                <!-- End sidebar -->

            </div>
        </div>

    </div>
</section>
<!-- End block-wrapper-section -->