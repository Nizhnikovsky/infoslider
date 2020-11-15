@extends('layout.main')
@section('title',setting('site.title'). " - Prices")
@section('content')
    <div class="offset"></div>
    <div class="dark-wrapper">
        <div class="container inner">
            <h3 class="section-title text-center">Наши цены</h3>
            <div class="row">
                @foreach($prices as $price)
                <div class="col-sm-6 col-md-3">
                    <div class="pricing panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$price->title}}</h3>
                            <div class="price"><span class="price-value">{{$price->price}}</span><span> руб/слайд</span> </div>
                        </div>
                        <!--/.panel-heading -->
                        <div class="panel-body" style="height: 250px">
                            {!! $price->description !!}
                        </div>
                        <!--/.panel-body -->
                        <div class="panel-footer"> <a class="btn btn-blue sm_open" data-modal="examplePlain" data-effect="pushdown">Заказать</a></div>
                    </div>
                    <!--/.pricing -->
                </div>
                @endforeach
            </div>
            <!--/.row -->
        </div>
        <!--/.container -->
    </div>
@stop
