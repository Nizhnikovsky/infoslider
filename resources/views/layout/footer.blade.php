<?php
$contacts = \App\Models\Contacts::getContacts();
$categories = \App\Models\Category::all();
$popularPosts = \App\Models\Post::all()->random(3);
?>

    <div class="container inner">
        <div class="row">
            <div class="col-sm-4">
                <div class="widget">
                    <h3 class="widget-title">Популярные статьи</h3>
                    <ul class="post-list">
                     @foreach($popularPosts as $post)
                        <li>
                            <div class="icon-overlay"> <a href="{{$post->slug}}"><img src="{{$post->image}}" alt=""> </a> </div>
                            <div class="meta">
                                <h5><a href="{{$post->slug}}">{{$post->title}}</a></h5>
                                <em><span class="date">{{$post->created_at}}</span></em> </div>
                        </li>
                        @endforeach
                    </ul>
                    <!-- /.post-list -->
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->

            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="widget-title">Категории</h4>
                    <ul class="tag-list">
                        @foreach($categories as $category)
                        <li><a href="{{"/blog/".$category->id}}" class="btn">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.widget -->

                <div class="widget">
                    <h4 class="widget-title">Мои соцсети</h4>
                    <ul class="social">
                        <li><a href="{{$contacts->fb_link}}"><i class="icon-s-facebook"></i></a></li>
                        <li><a href="{{$contacts->ln_link}}"><i class="icon-s-linkedin"></i></a></li>
                    </ul>
                    <!-- .social -->

                </div>
            </div>
            <!-- /column -->

            <div class="col-sm-4">
                <!-- /.widget -->
                <div class="widget">
                    <h4 class="widget-title">Данные для связи</h4>
                    <a class="btn btn-blue sm_open" data-modal="examplePlain" data-effect="pushdown" >Связаться со мной </a>
                    <div class="contact-info"> <i class="icon-location"></i> {{$contacts->address.','.$contacts->city}} <br />
                        <i class="icon-phone"></i>{{$contacts->phone}} <br />
                        <i class="icon-mail"></i> <a href="{{$contacts->email}}">{{$contacts->email}}</a> </div>
                </div>
                <!-- /.widget -->

            </div>
            <!-- /column -->

        </div>
        <!-- /.row -->
    </div>
    <!-- .container -->
{{--    <div class="sub-footer">--}}
{{--        <div class="container inner">--}}
{{--            <p class="text-center">© 2020 . All rights reserved. Theme by <a href="http://elemisfreebies.com">elemis</a>.</p>--}}
{{--        </div>--}}
{{--        <!-- .container -->--}}
{{--    </div>--}}
    <!-- .sub-footer -->
