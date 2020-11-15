@extends('layout.main')
@section('title',setting('site.title'). $portfolio->title)
@section('meta_keywords',$portfolio->meta_keywords)
@section('meta_description',$portfolio->meta_description)
@section('content')
<div class="offset"></div>
<div class="light-wrapper">
    <div class="container inner">
        <div class="basic-slider">
            @if(isset($portfolio->images))
                <?php $images = json_decode($portfolio->images); ?>
                @foreach($images as $image)
                        <div class="item"><img src="{{asset("storage/".$image)}}" alt="" /> </div>
                @endforeach
            @endif
        </div>
        <!-- /.basic-slider -->

        <div class="divide30"></div>
        <h2 class="post-title">{{$portfolio->title}}</h2>
{{--        <div class="meta"><span class="date">14 Aug 2015</span><span>Motion Video</span><span>Client Name</span></div>--}}
        <p>{!! $portfolio->excerept !!}</p>
        <p>{!! $portfolio->body !!}</p>
    </div>
    <!-- /.container -->
</div>
<!-- /.light-wrapper -->
<div class="dark-wrapper">
    <div class="container inner2 navigation">
        <a href="/portfolio" class="btn pull-left" title="Back">Back to Portfolio</a>
    </div>
    <!-- /.container -->
</div>
@stop
