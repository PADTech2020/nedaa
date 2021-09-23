@if (is_plugin_active('blog'))
<?php
    $slider = Botble\Blog\Models\Post::getSlider(5);
    $latest_articles_top = Botble\Blog\Models\Post::getLatestNews(4);
?>


@endif
<div class="container hero-slider">
    <div class="row">
        <div class="col-md-6">
            <div class="news-holder">

                <div class="news-preview">

                    @foreach($slider as $slide)
                        <div class="news-content @if($loop->first) top-content @endif">
                            <img src="{{ RvMedia::getImageUrl($slide->image,'post_big_main' ) }}">
                            <div class="resume">
                                <a href="{{$slide->url}}" class="title">{{$slide->name}}</a>
                                <ul class="post-tags">
                                    <li><i class="fa fa-list-alt"></i><a
                                                href="{{ $slide->categories->last()->url }}">{{ $slide->categories->last()->name }}</a>
                                    </li>
                                    <li><i class="fa fa-user"></i><a
                                                href="/articles/{{ $slide->researcher->id }}">{{ $slide->researcher->getName() }}</a>
                                    </li>
                                    <li style="color:#999;"><i class="fa fa-clock-o"></i> {{ time_elapsed_string( $slide->published_at) }}
                                    </li>
                                    <!-- <li><i class="fa fa-eye"></i>{{ $slide->views }}</li> -->
                                </ul>
                                <br>
                                <p>{{$slide->description}}</p><br>
                            </div>
                        </div><!-- .news-content -->
                    @endforeach
                </div><!-- .news-preview -->
                <div class="news-headlines">
                    <ul class="">
                        @foreach($slider as $slide)
                            <li class="@if($loop->first) selected @endif ">{{$slide->name}}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-md-6 pd-5">
            @foreach($latest_articles_top as $slide)
                <div class="col-md-6 news-post standard-post">
                    <div class="standard-post-box">
                        <div class="post-gallery">
                            <img src="{{ RvMedia::getImageUrl($slide->image,'item_post' ) }}" alt="">
                        </div>
                        <div class="post-content">
                            <div class="hero-info">
                                <div class="category">
                                    {{ $slide->categories->last()->name }}
                                </div>
                                <div class="date">
                                    {{ time_elapsed_string( $slide->published_at) }}
                                </div>
                            </div>
                            <h2><a href="{{$slide->url}}">{{$slide->name}}</a></h2>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

</div>
<!-- .news-holder -->

