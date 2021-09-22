
<?php
    $researcher = \Botble\Researchers\Models\Researchers::find($post->researcher->id);
?>
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

                        @if($post->categories->last()->name == 'رأي')
                            <div class="about-more-autor">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="about-autor">
                                        <div class="autor-box">
                                            <img src="{{ get_object_image( $researcher->image, 'thumb') }}"
                                                 alt="{{ $researcher->getName() }}">
                                            <div class="autor-content">
                                                <div class="autor-title">
                                                    <h1><a href="/articles/{{ $researcher->id }}">{{ $researcher->getName() }}</a></h1>
                                                    <ul class="autor-social">
                                                        <li><a href="{{ $researcher->facebook }}" class="facebook"><i
                                                                        class="fa fa-facebook"></i></a></li>
                                                        <li><a href="{{ $researcher->twitter }}" class="twitter"><i
                                                                        class="fa fa-twitter"></i></a></li>
                                                        <li><a href="{{ $researcher->instagram }}" class="instagram"><i
                                                                        class="fa fa-instagram"></i></a></li>
                                                    </ul>
                                                </div>
                                                <p>{{ str_replace("&nbsp;", "", strip_tags($researcher->summary)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

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

                            <a href="https://news.google.com/publications/CAAqBwgKMNeppgswv7S-Aw?hl=ar&gl=AE&ceid=AE%3Aar"
                               target="_blank" rel="noopener noreferrer nofollow"
                               class="articlestyled__GoogleNewsPage-uiz36o-39 imPYrJ"><span> {{__("Follow  Nedaa Post on Google News")}}  </span><img
                                        src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDIzLjAuMSwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiIFsKCTwhRU5USVRZIG5zX2V4dGVuZCAiaHR0cDovL25zLmFkb2JlLmNvbS9FeHRlbnNpYmlsaXR5LzEuMC8iPgoJPCFFTlRJVFkgbnNfYWkgImh0dHA6Ly9ucy5hZG9iZS5jb20vQWRvYmVJbGx1c3RyYXRvci8xMC4wLyI+Cgk8IUVOVElUWSBuc19ncmFwaHMgImh0dHA6Ly9ucy5hZG9iZS5jb20vR3JhcGhzLzEuMC8iPgoJPCFFTlRJVFkgbnNfdmFycyAiaHR0cDovL25zLmFkb2JlLmNvbS9WYXJpYWJsZXMvMS4wLyI+Cgk8IUVOVElUWSBuc19pbXJlcCAiaHR0cDovL25zLmFkb2JlLmNvbS9JbWFnZVJlcGxhY2VtZW50LzEuMC8iPgoJPCFFTlRJVFkgbnNfc2Z3ICJodHRwOi8vbnMuYWRvYmUuY29tL1NhdmVGb3JXZWIvMS4wLyI+Cgk8IUVOVElUWSBuc19jdXN0b20gImh0dHA6Ly9ucy5hZG9iZS5jb20vR2VuZXJpY0N1c3RvbU5hbWVzcGFjZS8xLjAvIj4KCTwhRU5USVRZIG5zX2Fkb2JlX3hwYXRoICJodHRwOi8vbnMuYWRvYmUuY29tL1hQYXRoLzEuMC8iPgpdPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9ImxvZ29feDVGX25ld3NfeDVGXzE5MnB4IiB4bWxuczp4PSImbnNfZXh0ZW5kOyIgeG1sbnM6aT0iJm5zX2FpOyIgeG1sbnM6Z3JhcGg9IiZuc19ncmFwaHM7IgoJIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNjU1MC44IDUzNTkuNyIKCSBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2NTUwLjggNTM1OS43IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPG1ldGFkYXRhPgoJPHNmdyAgeG1sbnM9IiZuc19zZnc7Ij4KCQk8c2xpY2VzPjwvc2xpY2VzPgoJCTxzbGljZVNvdXJjZUJvdW5kcyAgYm90dG9tTGVmdE9yaWdpbj0idHJ1ZSIgaGVpZ2h0PSI1MzU5LjciIHdpZHRoPSI2NTUwLjgiIHg9Ii0zNDA4LjQiIHk9Ii0yNzc1LjkiPjwvc2xpY2VTb3VyY2VCb3VuZHM+Cgk8L3Nmdz4KPC9tZXRhZGF0YT4KPGc+Cgk8cGF0aCBmaWxsPSIjMEM5RDU4IiBkPSJNNTIxMC44LDM2MzUuN2MwLDkxLjItNzUuMiwxNjUuOS0xNjcuMSwxNjUuOUgxNTA3Yy05MS45LDAtMTY3LjEtNzQuNy0xNjcuMS0xNjUuOVYxNjUuOQoJCUMxMzM5LjksNzQuNywxNDE1LjEsMCwxNTA3LDBoMzUzNi44YzkxLjksMCwxNjcuMSw3NC43LDE2Ny4xLDE2NS45VjM2MzUuN3oiLz4KCTxwb2x5Z29uIG9wYWNpdHk9IjAuMiIgZmlsbD0iIzAwNEQ0MCIgcG9pbnRzPSI1MjEwLjgsODkyIDM4ODUuMyw3MjEuNCA1MjEwLjgsMTA3NyAJIi8+Cgk8cGF0aCBvcGFjaXR5PSIwLjIiIGZpbGw9IiMwMDRENDAiIGQ9Ik0zMzM5LjMsMTgwLjlMMTMzMiwxMDc3LjJsMjIxOC41LTgwNy41di0yLjJDMzUxMS41LDE4My45LDM0MTYuNSwxNDQuOSwzMzM5LjMsMTgwLjl6Ii8+Cgk8cGF0aCBvcGFjaXR5PSIwLjIiIGZpbGw9IiNGRkZGRkYiIGQ9Ik01MDQzLjgsMEgxNTA3Yy05MS45LDAtMTY3LjEsNzQuNy0xNjcuMSwxNjUuOXYzNy4yYzAtOTEuMiw3NS4yLTE2NS45LDE2Ny4xLTE2NS45aDM1MzYuOAoJCWM5MS45LDAsMTY3LjEsNzQuNywxNjcuMSwxNjUuOXYtMzcuMkM1MjEwLjgsNzQuNyw1MTM1LjcsMCw1MDQzLjgsMHoiLz4KCTxwYXRoIGZpbGw9IiNFQTQzMzUiIGQ9Ik0yMTk4LjIsMzUyOS4xYy0yMy45LDg5LjEsMjMuOCwxODAsMTA2LDIwMmwzMjc1LjgsODgxYzgyLjIsMjIsMTY5LTMyLjksMTkyLjgtMTIybDc3MS43LTI4ODAKCQljMjMuOS04OS4xLTIzLjgtMTgwLTEwNi0yMDJsLTMyNzUuOC04ODFjLTgyLjItMjItMTY5LDMyLjktMTkyLjgsMTIyTDIxOTguMiwzNTI5LjF6Ii8+Cgk8cG9seWdvbiBvcGFjaXR5PSIwLjIiIGZpbGw9IiMzRTI3MjMiIHBvaW50cz0iNTgwNi40LDI2MzguMSA1OTc4LjcsMzY4NC44IDU4MDYuNCw0MzI4LjEgCSIvPgoJPHBvbHlnb24gb3BhY2l0eT0iMC4yIiBmaWxsPSIjM0UyNzIzIiBwb2ludHM9IjM5MDAuOCw3NjQuMSA0MDU1LjIsODA1LjYgNDE1MSwxNDUxLjYgCSIvPgoJPHBhdGggb3BhY2l0eT0iMC4yIiBmaWxsPSIjRkZGRkZGIiBkPSJNNjQzOC42LDE0MDguMWwtMzI3NS44LTg4MWMtODIuMi0yMi0xNjksMzIuOS0xOTIuOCwxMjJsLTc3MS43LDI4ODAKCQljLTEuMyw0LjgtMS42LDkuNy0yLjUsMTQuNWw3NjUuOS0yODU4LjJjMjMuOS04OS4xLDExMC43LTE0NCwxOTIuOC0xMjJsMzI3NS44LDg4MWM3Ny43LDIwLjgsMTIzLjgsMTAzLjMsMTA4LjUsMTg3LjZsNS45LTIxLjkKCQlDNjU2OC41LDE1MjEsNjUyMC44LDE0MzAuMSw2NDM4LjYsMTQwOC4xeiIvPgoJPHBhdGggZmlsbD0iI0ZGQzEwNyIgZD0iTTQ3NzguMSwzMTc0LjRjMzEuNSw4Ni43LTguMSwxODEuNC04OCwyMTAuNUwxMjMzLjQsNDY0M2MtODAsMjkuMS0xNzEuMi0xOC0yMDIuNy0xMDQuN0wxMC45LDE3MzYuNQoJCWMtMzEuNS04Ni43LDguMS0xODEuNCw4OC0yMTAuNUwzNTU1LjYsMjY3LjljODAtMjkuMSwxNzEuMiwxOCwyMDIuNywxMDQuN0w0Nzc4LjEsMzE3NC40eiIvPgoJPHBhdGggb3BhY2l0eT0iMC4yIiBmaWxsPSIjRkZGRkZGIiBkPSJNMjQsMTc3MS44Yy0zMS41LTg2LjcsOC4xLTE4MS40LDg4LTIxMC41TDM1NjguNywzMDMuMWM3OS4xLTI4LjgsMTY5LDE3LjEsMjAxLjUsMTAyCgkJbC0xMS45LTMyLjZjLTMxLjYtODYuNy0xMjIuOC0xMzMuOC0yMDIuNy0xMDQuN0w5OC45LDE1MjZjLTgwLDI5LjEtMTE5LjYsMTIzLjgtODgsMjEwLjVsMTAxOS44LDI4MDEuOGMwLjMsMC45LDAuOSwxLjcsMS4zLDIuNwoJCUwyNCwxNzcxLjh6Ii8+Cgk8cGF0aCBmaWxsPSIjNDI4NUY0IiBkPSJNNTgwNi40LDUxOTIuMmMwLDkyLjEtNzUuNCwxNjcuNS0xNjcuNSwxNjcuNWgtNDcyN2MtOTIuMSwwLTE2Ny41LTc1LjQtMTY3LjUtMTY3LjVWMTYxOS4xCgkJYzAtOTIuMSw3NS40LTE2Ny41LDE2Ny41LTE2Ny41aDQ3MjdjOTIuMSwwLDE2Ny41LDc1LjQsMTY3LjUsMTY3LjVWNTE5Mi4yeiIvPgoJPHBhdGggZmlsbD0iI0ZGRkZGRiIgZD0iTTQ5MDMuOCwyODY2SDM0ODkuNHYtMzcyLjJoMTQxNC40YzQxLjEsMCw3NC40LDMzLjMsNzQuNCw3NC40djIyMy4zCgkJQzQ5NzguMiwyODMyLjYsNDk0NC45LDI4NjYsNDkwMy44LDI4NjZ6Ii8+Cgk8cGF0aCBmaWxsPSIjRkZGRkZGIiBkPSJNNDkwMy44LDQyODAuM0gzNDg5LjR2LTM3Mi4yaDE0MTQuNGM0MS4xLDAsNzQuNCwzMy4zLDc0LjQsNzQuNHYyMjMuMwoJCUM0OTc4LjIsNDI0Nyw0OTQ0LjksNDI4MC4zLDQ5MDMuOCw0MjgwLjN6Ii8+Cgk8cGF0aCBmaWxsPSIjRkZGRkZGIiBkPSJNNTEyNy4xLDM1NzMuMUgzNDg5LjR2LTM3Mi4yaDE2MzcuN2M0MS4xLDAsNzQuNCwzMy4zLDc0LjQsNzQuNHYyMjMuMwoJCUM1MjAxLjUsMzUzOS44LDUxNjguMiwzNTczLjEsNTEyNy4xLDM1NzMuMXoiLz4KCTxwYXRoIG9wYWNpdHk9IjAuMiIgZmlsbD0iIzFBMjM3RSIgZD0iTTU2MzguOSw1MzIyLjVoLTQ3MjdjLTkyLjEsMC0xNjcuNS03NS40LTE2Ny41LTE2Ny41djM3LjJjMCw5Mi4xLDc1LjQsMTY3LjUsMTY3LjUsMTY3LjUKCQloNDcyN2M5Mi4xLDAsMTY3LjUtNzUuNCwxNjcuNS0xNjcuNVY1MTU1QzU4MDYuNCw1MjQ3LjEsNTczMSw1MzIyLjUsNTYzOC45LDUzMjIuNXoiLz4KCTxwYXRoIG9wYWNpdHk9IjAuMiIgZmlsbD0iI0ZGRkZGRiIgZD0iTTkxMS45LDE0ODguOGg0NzI3YzkyLjEsMCwxNjcuNSw3NS40LDE2Ny41LDE2Ny41di0zNy4yYzAtOTIuMS03NS40LTE2Ny41LTE2Ny41LTE2Ny41CgkJaC00NzI3Yy05Mi4xLDAtMTY3LjUsNzUuNC0xNjcuNSwxNjcuNXYzNy4yQzc0NC40LDE1NjQuMiw4MTkuOCwxNDg4LjgsOTExLjksMTQ4OC44eiIvPgoJPHBhdGggZmlsbD0iI0ZGRkZGRiIgZD0iTTIyMjMuOSwzMjM4LjJ2MzM1LjdoNDgxLjdjLTM5LjgsMjA0LjUtMjE5LjYsMzUyLjgtNDgxLjcsMzUyLjhjLTI5Mi40LDAtNTI5LjUtMjQ3LjMtNTI5LjUtNTM5LjcKCQlzMjM3LjEtNTM5LjcsNTI5LjUtNTM5LjdjMTMxLjcsMCwyNDkuNiw0NS4zLDM0Mi43LDEzNGwwLDAuMmwyNTQuOS0yNTQuOWMtMTU0LjgtMTQ0LjMtMzU2LjctMjMyLjgtNTk3LjctMjMyLjgKCQljLTQ5My4zLDAtODkzLjMsMzk5LjktODkzLjMsODkzLjNzMzk5LjksODkzLjMsODkzLjMsODkzLjNjNTE1LjksMCw4NTUuMy0zNjIuNyw4NTUuMy04NzNjMC01OC41LTUuNC0xMTQuOS0xNC4xLTE2OS4ySDIyMjMuOXoiLz4KCTxnIG9wYWNpdHk9IjAuMiI+CgkJPHBhdGggZmlsbD0iIzFBMjM3RSIgZD0iTTIyMzMuMiwzNTczLjl2MzcuMmg0NzIuN2MzLjUtMTIuMiw2LjUtMjQuNiw5LTM3LjJIMjIzMy4yeiIvPgoJCTxwYXRoIGZpbGw9IiMxQTIzN0UiIGQ9Ik0yMjMzLjIsNDI4MC4zYy00ODcuMSwwLTg4Mi45LTM4OS45LTg5Mi44LTg3NC43Yy0wLjEsNi4yLTAuNSwxMi40LTAuNSwxOC42CgkJCWMwLDQ5My40LDM5OS45LDg5My4zLDg5My4zLDg5My4zYzUxNS45LDAsODU1LjMtMzYyLjcsODU1LjMtODczYzAtNC4xLTAuNS03LjktMC41LTEyQzMwNzYuOSwzOTI5LjUsMjc0MC42LDQyODAuMywyMjMzLjIsNDI4MC4zCgkJCXoiLz4KCQk8cGF0aCBmaWxsPSIjMUEyMzdFIiBkPSJNMjU3NS45LDI5ODEuM2MtOTMuMS04OC42LTIxMS4xLTEzNC0zNDIuNy0xMzRjLTI5Mi40LDAtNTI5LjUsMjQ3LjMtNTI5LjUsNTM5LjdjMCw2LjMsMC43LDEyLjQsMC45LDE4LjYKCQkJYzkuOS0yODQuMiwyNDIuNC01MjEuMSw1MjguNi01MjEuMWMxMzEuNywwLDI0OS42LDQ1LjMsMzQyLjcsMTM0bDAsMC4ybDI3My41LTI3My41Yy02LjQtNi0xMy41LTExLjMtMjAuMS0xNy4xTDI1NzYsMjk4MS41CgkJCUwyNTc1LjksMjk4MS4zeiIvPgoJPC9nPgoJPHBhdGggb3BhY2l0eT0iMC4yIiBmaWxsPSIjMUEyMzdFIiBkPSJNNDk3OC4yLDI4MjguN3YtMzcuMmMwLDQxLjEtMzMuMyw3NC40LTc0LjQsNzQuNEgzNDg5LjR2MzcuMmgxNDE0LjQKCQlDNDk0NC45LDI5MDMuMiw0OTc4LjIsMjg2OS45LDQ5NzguMiwyODI4Ljd6Ii8+Cgk8cGF0aCBvcGFjaXR5PSIwLjIiIGZpbGw9IiMxQTIzN0UiIGQ9Ik00OTAzLjgsNDI4MC4zSDM0ODkuNHYzNy4yaDE0MTQuNGM0MS4xLDAsNzQuNC0zMy4zLDc0LjQtNzQuNHYtMzcuMgoJCUM0OTc4LjIsNDI0Nyw0OTQ0LjksNDI4MC4zLDQ5MDMuOCw0MjgwLjN6Ii8+Cgk8cGF0aCBvcGFjaXR5PSIwLjIiIGZpbGw9IiMxQTIzN0UiIGQ9Ik01MTI3LjEsMzU3My4xSDM0ODkuNHYzNy4yaDE2MzcuN2M0MS4xLDAsNzQuNC0zMy4zLDc0LjQtNzQuNHYtMzcuMgoJCUM1MjAxLjUsMzUzOS44LDUxNjguMiwzNTczLjEsNTEyNy4xLDM1NzMuMXoiLz4KCTxyYWRpYWxHcmFkaWVudCBpZD0iU1ZHSURfMl8iIGN4PSIxNDc2LjQwMzgiIGN5PSI0MzQuMjM2NCIgcj0iNjM3MC41NjMiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj4KCQk8c3RvcCAgb2Zmc2V0PSIwIiBzdHlsZT0ic3RvcC1jb2xvcjojRkZGRkZGO3N0b3Atb3BhY2l0eTowLjEiLz4KCQk8c3RvcCAgb2Zmc2V0PSIxIiBzdHlsZT0ic3RvcC1jb2xvcjojRkZGRkZGO3N0b3Atb3BhY2l0eTowIi8+Cgk8L3JhZGlhbEdyYWRpZW50PgoJPHBhdGggZmlsbD0idXJsKCNTVkdJRF8yXykiIGQ9Ik02NDM4LjYsMTQwOC4xbC0xMjI3LjctMzMwLjJ2LTkxMmMwLTkxLjItNzUuMi0xNjUuOS0xNjcuMS0xNjUuOUgxNTA3CgkJYy05MS45LDAtMTY3LjEsNzQuNy0xNjcuMSwxNjUuOXY5MDguNEw5OC45LDE1MjZjLTgwLDI5LjEtMTE5LjYsMTIzLjgtODgsMjEwLjVsNzMzLjUsMjAxNS40djE0NDAuMwoJCWMwLDkyLjEsNzUuNCwxNjcuNSwxNjcuNSwxNjcuNWg0NzI3YzkyLjEsMCwxNjcuNS03NS40LDE2Ny41LTE2Ny41di04MjYuOWw3MzguMy0yNzU1LjJDNjU2OC41LDE1MjEsNjUyMC44LDE0MzAuMSw2NDM4LjYsMTQwOC4xegoJCSIvPgo8L2c+Cjwvc3ZnPgo="
                                        loading="lazy" height="25" alt="Google News"></a>


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
                        [image-ad][/image-ad]
                        <br>






                        <!-- carousel box -->
                        <div class="carousel-box owl-wrapper">
                            <div class="title-section">
                                <h1><span>{{__("You might like it.")}}</span></h1>
                            </div>
                            <div class="owl-carousel" data-num="3">

                                @foreach (get_related_posts($post->slug, 6) as $related_item)
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

                        <!-- contact form box -->
                        @if (theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes')
                            <div class="contact-form-box">
                                {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments')) !!}
                            </div>
                            @endif
                                    <!-- End contact form box -->

                    </div>


                    [auto-reload-posts][/auto-reload-posts]
                    <!-- End single-post box -->

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