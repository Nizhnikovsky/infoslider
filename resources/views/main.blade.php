@extends('layout.main')
@section('title',setting('site.title'))
@section('meta_keywords',setting('site.site_keywords'))
@section('meta_description',setting('site.description'))
@section('navbar')
    @include('layout.navbar_light')
@stop
@section('content')
    @include('layout.slider')
    <div class="light-wrapper">
        <div class="container inner">
            <div class="thin">
                <h3 class="section-title text-center">Мои специализации</h3>
{{--                <p class="text-center">Nullam quis risus eget urna mollis ornare vel eu leo. Praesent commodo cursus--}}
{{--                    magna,--}}
{{--                    vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec--}}
{{--                    ullamcorper nulla non metus auctor fringilla. Donec sed odio dui.</p>--}}
            </div>
            <!-- /.thin -->
            <div class="divide10"></div>
            <div class="row">
                @foreach($specialties as $specialty)
                    <div class="col-sm-4">
                        <div class="caption-overlay">
                            <figure><a href="#"><img src="{{"storage/".$specialty->image}}" alt=""/> </a></figure>
                            <div class="caption bottom-right">
                                <div class="title">
                                    <h3 class="main-title layer">{{$specialty->name}}</h3>
                                </div>
                                <!--/.title -->
                            </div>
                            <!--/.caption -->
                        </div>
                    </div>
            @endforeach
            <!-- /column -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /.light-wrapper -->

    <div class="dark-wrapper">
        <div class="container inner">
            <div class="thin">
                <h3 class="section-title text-center">Мои последние работы</h3>
                <p class="text-center"></p>
            </div>
            <!-- /.thin -->
            <div class="divide10"></div>
            <div class="cbp-panel">
                <div id="js-filters-mosaic" class="cbp-filter-container text-center">
                    @foreach($specialties as $specialty)
                        <div data-filter=".{{$specialty->slug}}" class="cbp-filter-item"> {{$specialty->name}}</div>
                    @endforeach
                </div>
                <div id="js-grid-mosaic" class="cbp">
                    @foreach($portfolios as $portfolio)
                        <div class="cbp-item {{$portfolio->specialty->slug}}"><a class="cbp-caption fancybox-media"
                                                                                 data-rel="portfolio"
                                                                                 href="{{$portfolio->uri}}"
                                                                                 data-title-id="title-1">
                                <div class="cbp-caption-defaultWrap"><img src="{{$portfolio->image}}" alt=""/></div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title"><span class="cbp-plus"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <!--/.cbp-caption-activeWrap -->
                            </a>
                            <div id="title-1" class="hidden">
                                <h3>{{$portfolio->title}}</h3>
                                <p>{{$portfolio->excerept}}</p>
                            </div>
                            <!-- /.hidden -->
                        </div>
                    @endforeach
                </div>
                <!--/.cbp -->

            </div>
            <!--/.cbp-panel -->
            <div class="divide30"></div>
            <div id="js-grid-mosaic-more" class="cbp-l-loadMore-text">
                <a href="/portfolio" class="btn btn-icon" rel="nofollow">Load More</a>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.dark-wrapper -->

    <div class="light-wrapper">
        <div class="col-image">
            <div class="bg-wrapper col-md-6">
                <div class="bg-holder" style="background-image: url({{"storage/".$about_me->image}});"></div>
            </div>
            <!--/.bg-wrapper -->
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-md-offset-7 inner-col">
                        <h3 class="section-title">{!! $about_me->title !!}</h3>
                        <p>{!! $about_me->description !!}}</p>
                        <!-- /.progress-list -->
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!--/.container -->
        </div>
        <!--/.col-image -->

    </div>
    <!-- /.light-wrapper -->

    <div class="dark-wrapper">
        <div class="container inner">
            <h3 class="section-title text-center">Интересные статьи</h3>
            <div class="divide10"></div>
            <div class="carousel-wrapper">
                <div class="carousel carousel-boxed blog">
                    @foreach($posts as $post)
                        <div class="item post">
                            <figure class="main"><img src="{{$post->image}}" alt=""/></figure>
                            <div class="box text-center">
                                <div class="category cat9"><span><a href="#">{{$post->category->name}}</a></span></div>
                                <h4 class="post-title"><a href="{{$post->slug}}">{{$post->title}}</a></h4>
                                <div class="meta"><span class="date">{{$post->cteated_at}}</span></div>
                                <p style="overflow: hidden;height: 60px;word-wrap: break-word;">{{$post->excerpt}}</p>
                            </div>
                            <!-- /.box -->
                        </div>
                @endforeach
                <!-- /.post -->
                </div>
                <!-- /.post -->
            </div>
            <!--/.carousel -->
        </div>
        <!--/.carousel-wrapper -->
    </div>
    <!--/.container -->

    <div class="parallax parallax3 inverse-wrapper customers">
        <div class="container inner text-center">
            <h3 class="section-title">Отзывы</h3>
            <div class="testimonials owl-carousel thin">
                @foreach($reviews as $review)
                    <div class="item">
                        <blockquote>
                            <p>{!! $review->review_description !!}<small class="meta">{{$review->reviewer}}</small></p>
                        </blockquote>
                    </div>
                @endforeach
            <!-- /.item -->
            </div>
            <!-- /.testimonials -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.dark-wrapper -->
    <div class="light-wrapper">
        <div class="container inner">
            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <h2>Мой Instagram</h2>
                    <p>{!! $insta_feed->description !!}</p>
                    <div class="divide10"></div>
                    <a href="{{$insta_feed->link}}" class="btn btn-icon"><i class="icon-s-instagram"></i>
                        Посетить</a></div>
                <!--/column -->
                <div class="col-sm-8 col-md-9">
                    <div class="image-grid col5">
                        <div class="items-wrapper">
                            <div id="instafeed" class="isotope items" data-limit="5"></div>

                            <!--/.isotope -->
                        </div>
                        <!--/.items-wrapper -->
                    </div>
                    <!--/.image-grid -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!--/.container -->
    </div>
@stop
