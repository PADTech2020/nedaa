

        <!-- heading-news-section
    ================================================== -->


<div class=" ">
    @if($post)
        <ul class=" col-md-12" >

                <li class="col-md-6 thumb-box">
                    <div class="col-md-4">
                        <a href="{{$post->url}}"><img width="100%" src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                      alt="{{$post->name}}"></a>
                    </div> <div class="col-md-8">
                        <div class="post-content">
                            <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                            <p>{{Str::words($post->description, '20')}}</p>
                        </div>
                    </div>

                </li>


        </ul>
        {{--<div class="news-post article-post" style="border-top: 1px solid #f0f0f0;--}}
    {{--padding-top: 10px;--}}
    {{--margin-top: 10px;">--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-6">--}}
                    {{--<div class="post-gallery">--}}
                        {{--<img src="{{ RvMedia::getImageUrl($post->image,  'medium' ) }}" alt="{{$post->name}}">--}}

                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-6">--}}
                    {{--<div class="post-content">--}}
                        {{--<h2>--}}
                            {{--<a href="{{$post->short_link}}">{{$post->name}} </a>--}}
                        {{--</h2>--}}
                        {{--<ul class="post-tags">--}}
                            {{--<i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}--}}
                            {{--<li><i class="fa fa-user"></i><a href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->getName() }}</a></li>--}}
                            {{--<!-- <li><i class="fa fa-eye"></i>916</li> -->--}}
                        {{--</ul>--}}
                        {{--<p>{{ $post->description }}</p>--}}
                        {{--<a href="{{ $post->url }}" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>{{__("Read More")}}</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    @endif
</div>


<!-- End heading-news-section -->

