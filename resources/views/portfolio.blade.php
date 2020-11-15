@extends('layout.main')
@section('title',setting('site.title'). " - My Portfolio")
@section('content')
    <div class="offset"></div>
    <div class="dark-wrapper">
        <div class="container inner2">
            <h3 class="section-title text-center">Мои работы</h3>
            <p class="text-center">Nullam quis risus eget urna mollis ornare vel eu leo. Praesent commodo cursus magna,
                vel scelerisque nisl consectetur et.</p>
            <div class="divide30"></div>
            <div id="slide-portfolio" class="image-grid col3">
                <div class="items-wrapper">
                    <ul class="isotope items">
                        @foreach($pages as $key => $page)
                            <li class="item">
                                <figure class="icon-overlay"><a href="#0"
                                                                data-type="{{"slide-portfolio-item-".$key}}"><img
                                            src="{{$page->image}}" alt=""/></a></figure>
                                <div class="slide-portfolio-item-info box">
                                    <h4 class="post-title">{{$page->title}}</h4>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <!--/.items-wrapper -->
            </div>
            <!-- slide-portfolio -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.dark-wrapper -->
@stop
@section('slide')
    @foreach($pages as $key => $page)
        <div class="{{"slide-portfolio-item-content dark-wrapper slide-portfolio-item-".$key}}">
            <div class="slide-portfolio-item-detail">
                <div class="inner2">
                    <h2 class="text-center">{{$page->title}}</h2>
                    <p class="text-center">{!! $page->body !!}</p>
                    <div class="divide25"></div>
                    <ul class="basic-gallery text-center">
                        @foreach($page->getImages() as $image)
                            <li><img src="{{"/storage/".$image}}" alt=""></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    <a href="#0" class="slide-portfolio-item-content-close"><i
            class="budicon-cancel-1"></i></a> <!-- close slide portfolio content -->
@endsection
