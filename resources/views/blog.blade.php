@extends('layout.main')
@section('title',setting('site.title'). " - Blog")
@section('content')
    <div class="offset"></div>
    <div class="dark-wrapper">
        <div class="container inner2">
            <div class="blog row">
                <div class="col-sm-8 blog-content">
                    <div class="blog-posts classic-view">
                        @foreach($posts as $post)
                            <div class="post">
                                <div class="box text-center">
                                    <div class="category cat9"><span><a href="#">{{$post->category->name}}</a></span></div>
                                    <h2 class="post-title"><a href="{{$post->slug}}">{{$post->title}}</a></h2>
                                    <div class="meta"><span class="date">{{$post->created_at}}</span><span
                                            class="comments"><a href="#"><i
                                                    class="icon-chat-1"></i> 15</a></span></div>
                                    <figure class="main"><a href="{{$post->slug}}"><img src="{{$post->image}}" alt=""/></a>
                                    </figure>
                                    <div class="post-content text-left">
                                        <p>{{$post->excerpt}}</p>
                                    </div>
                                    <!-- /.post-content -->
                                    <div class="post-footer"><a href="{{$post->slug}}" class="more pull-left">Continue
                                            reading</a>
                                        <ul class="social naked pull-right">
                                            <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                                            <li><a href="#"><i class="icon-s-instagram"></i></a></li>
                                        </ul>
                                        <!-- .social -->
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- .post-footer -->
                                </div>
                                <!-- /.box -->
                            </div>
                    @endforeach
                    <!-- .post -->
                        <!-- /.grid-view -->
                        <div class="pagination">
                            <ul>
                                <li><a href="@if($current_page <= 1){{"/blog?page=".($current_page)}}
                                    @else {{"/blog?page=".($current_page - 1)}} @endif"
                                       @if($current_page <= 1) style="pointer-events: none; cursor: default;"@endif>Prev</a></li>
                                @for($page = 1; $page <= $pages; $page++)
                                    <li @if($page == $current_page) class="active" @endif><a
                                            href="{{"/blog?page=".$page}}"><span>{{$page}}</span></a></li>
                                @endfor
                                <li><a href="@if($current_page == $pages){{"/blog?page=".($current_page)}}
                                    @else {{"/blog?page=".($current_page + 1)}} @endif"
                                       @if($current_page == $pages) style="pointer-events: none; cursor: default;"@endif>Next</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.pagination -->
                    </div>
                    <!-- /.blog-content -->
                </div>
                <!-- /.blog -->
                @include('layout.sidebar')
            </div>
            <!--/.container -->
        </div>
@stop
