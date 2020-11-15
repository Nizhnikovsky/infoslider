<div class="tp-fullscreen-container revolution">
    <div class="tp-fullscreen">
        <ul class="home-slider">
            @foreach($sliderImages as $sliderImage)
                <li data-transition="fade"><img src="{{"storage/".$sliderImage->image}}" alt=""
                                                data-bgposition="center top" data-bgfit="cover"
                                                data-bgrepeat="no-repeat"/>
                    <h1 class="tp-caption large sfr" data-x="30" data-y="263" data-speed="900" data-start="800"
                        data-easing="Sine.easeOut">{{$sliderImage->main_description}}</h1>
                    <div class="tp-caption medium sfr" data-x="30" data-y="348" data-speed="900" data-start="1500"
                         data-easing="Sine.easeOut">{{$sliderImage->second_description}}</div>
                </li>
            @endforeach
            @if($sliderVideo)
                @foreach($sliderVideo as $videoData)
                    <li data-transition="fade"><img src="{{asset("storage/".$videoData->video_image)}}" alt=""
                                                    data-bgfit="cover" data-bgposition="center top"
                                                    data-bgrepeat="no-repeat"/>
                        <div class="tp-caption large text-center sfb" data-x="center" data-y="293" data-speed="900"
                             data-start="800" data-endspeed="100" data-easing="Sine.easeOut" style="z-index: 2;">{!! $videoData->main_description !!}
                        </div>
                        <div class="tp-caption medium text-center sfb" data-x="center" data-y="387" data-speed="900"
                             data-start="1500" data-endspeed="100" data-easing="Sine.easeOut" style="z-index: 2;">{!! $videoData->second_description !!}
                        </div>
                        <div class="tp-caption tp-fade fadeout fullscreenvideo"
                             data-x="0"
                             data-y="0"
                             data-speed="1000"
                             data-start="1100"
                             data-easing="Power4.easeOut"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1500"
                             data-endeasing="Power4.easeIn"
                             data-autoplay="true"
                             data-autoplayonlyfirsttime="false"
                             data-nextslideatend="true"
                             data-dottedoverlay="twoxtwo"
                             data-volume="mute" data-forceCover="1" data-aspectratio="16:9" data-forcerewind="on"
                             style="z-index: 1;">
                            <video class="" preload="none" width="100%" height="100%"
                                   poster='{{asset("storage/".$videoData->video_image)}}'>
                                <source src='{{asset("storage/".$videoData->video)}}' type='video/mp4'/>
                            </video>
                        </div>
                    </li>
                @endforeach
            @endif
                <button class="home-slider__btn btn btn-blue sm_open"  data-modal="examplePlain" data-effect="pushdown">Связаться со мной</button>
        </ul>
        <div class="tp-bannertimer tp-bottom"></div>
    </div>
    <!-- /.tp-fullscreen-container -->
</div>
<!-- /.revolution -->
