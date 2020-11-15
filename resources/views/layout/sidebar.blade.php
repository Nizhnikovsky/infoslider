<aside class="col-sm-4 sidebar">
    <div class="sidebox widget">
        <h3 class="widget-title">Обо мне</h3>
        <figure><img src="style/images/art/about2.jpg" alt=""/></figure>
        <p>{!! $about->short_description !!}</p>
        <ul class="social">
            <li><a href="#"><i class="icon-s-instagram"></i></a></li>
            <li><a href="#"><i class="icon-s-facebook"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="sidebox widget">
        <h3 class="widget-title">Популярное</h3>
        <ul class="post-list">
            @foreach($popularPosts as $post)
            <li>
                <div class="icon-overlay"><a href="{{$post->slug}}"><img src="{{$post->image}}"
                                                                        alt=""/> </a></div>
                <div class="meta">
                    <h5><a href="{{$post->slug}}">{{$post->title}}</a></h5>
                    <em><span class="date">3th Oct 2012</span></em></div>
            </li>
            @endforeach
        </ul>
        <!-- /.post-list -->
    </div>

    <div class="sidebox widget">
        <h3 class="widget-title">Категории</h3>
        <ul class="tag-list">
            @foreach($tags as $tag)
            <li><a href="{{"/blog/".$tag->id}}" class="btn">{{$tag->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- /.widget -->
</aside>
<!-- /column .sidebar -->
