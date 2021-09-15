@if (is_plugin_active('blog'))


@endif

        <!-- heading-news-section
    ================================================== -->


<div class="thumb-box ">
    @if($post)
        <div class="news-post article-post" style="border-top: 1px solid #f0f0f0;
    padding-top: 10px;
    margin-top: 10px;">
            <div class="row">
                <div class="col-sm-6">
                    <div class="post-gallery">
                        <img src="{{ RvMedia::getImageUrl($post->image,  'medium' ) }}" alt="{{$post->name}}">

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="post-content">
                        <h2>
                            <a href="{{$post->short_link}}">{{$post->name}} </a>
                        </h2>
                        <ul class="post-tags">
                            <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                            <li><i class="fa fa-user"></i><a href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->getName() }}</a></li>
                            <!-- <li><i class="fa fa-eye"></i>916</li> -->
                        </ul>
                        <p>{{ $post->description }}</p>
                        <a href="{{ $post->url }}" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>{{__("Read More")}}</a>
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>


<!-- End heading-news-section -->

