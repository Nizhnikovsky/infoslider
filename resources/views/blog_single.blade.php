@extends('layout.main')
@section('meta_description',$post->meta_description)
@section('meta_keywords',$post->meta_keywords)
@section('title',setting('site.title'). " - Post")
@section('content')
<div class="offset"></div>
    <div class="dark-wrapper">
        <div class="container inner2">
            <div class="blog row">
                <div class="col-sm-8 blog-content">
                    <div class="blog-posts classic-view">
                        <div class="post">
                            <div class="box text-center">
                                <div class="category cat9"><span><a href="#">Urban</a></span></div>
                                <h1 class="post-title">{{$post->title}}</h1>
                                <div class="meta"><span class="date">{{$post->created_at}}</span><span class="comments"><a href="#"><i class="icon-chat-1"></i> 15</a></span></div>
                                <figure class="main"><img src="{{$post->image}}" alt="" /></figure>
                                <div class="post-content text-left">
                                  {!! $post->body !!}
                                </div>
                                <!-- /.post-content -->
                                <div class="post-footer">
                                    <div class="meta tags pull-left"><a href="#">journal</a>, <a href="#">illustration</a>, <a href="#">design</a>, <a href="#">daily</a></div>
                                    <ul class="social naked pull-right">
                                        <li><a href="#"><i class="icon-s-instagram"></i></a></li>
                                        <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                                    </ul>
                                    <!-- .social -->
                                    <div class="clearfix"></div>
                                </div>
                                <!-- .post-footer -->
                            </div>
                            <!-- /.box -->

                        </div>
                        <!-- .post -->

                    </div>
                    <!-- /.box -->
                    <div class="divide30"></div>
                    <div class="box">
                        <div id="disqus_thread"></div>
                        <script type="text/javascript">
                            /* * * CONFIGURATION VARIABLES * * */
                            var disqus_shortname = 'infoslider';

                            /* * * DON'T EDIT BELOW THIS LINE * * */
                            (function() {
                                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                            })();
                        </script>
                        <noscript>
                            Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a>
                        </noscript>
                    </div>
                    <!-- /.box -->
                    <!-- /.classic-view -->

                </div>
                <!-- /.blog-content -->
            @include('layout.sidebar')
                <!-- /column .sidebar -->

            </div>
            <!-- /.blog -->
        </div>
        <!--/.container -->
    </div>
    <!--/.dark-wrapper -->
@stop
