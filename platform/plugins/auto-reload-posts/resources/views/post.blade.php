<div class="single-post-box" style="border-bottom: 2px solid #f2f2f2;
    margin-bottom: 30px;
    padding-bottom: 15px;">
    

<div class="title-post">
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
    <img src="{{ RvMedia::getImageUrl($post->image, 'post_main') }}"
         alt="{{ $post->name }}">
    <span class="image-caption">{{ $post->caption }}</span>
</div>

{!!  $post->content !!}

</div>
