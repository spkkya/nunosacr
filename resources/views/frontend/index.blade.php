@extends('frontend.layout')

@section('title', trans('frontend/index.title'))

@section('content')
<!-- Banner Content -->    
    <div id="ws-hero-fullscreen" class="rev_slider">
        <ul>   
            <li data-transition="fade" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000">        
                <!-- Background Image -->
                <img src="{{ asset('/img/backgrounds/home.jpg') }}" alt="Alternative Text" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10"> 

                <!-- Background Overlay -->
                <div class="tp-caption tp-shape tp-shapewrapper rs-parallaxlevel-0"  
                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                    data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                    data-width="full"
                    data-height="full"
                    data-whitespace="nowrap"
                    data-transform_idle="o:1;"
                    data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                    data-transform_out="s:300;s:300;" 
                    data-start="750" 
                    data-basealign="slide" 
                    data-responsive_offset="on" 
                    data-responsive="off"
                    style="z-index: 5;background-color:rgba(0, 0, 0, 0.30);border-color:rgba(0, 0, 0, 0.30);"> 
                </div>       

                <!-- Layer -->
                <div class="tp-caption ws-hero-title"  
                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                    data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','1']"                         
                    data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"             
                    data-mask_in="x:0px;y:0px;" 
                    data-mask_out="x:0;y:0;" 
                    data-start="1000" 
                    data-responsive_offset="on" 
                    style="z-index: 6;"><h1 class="h1-slider">Joana Lota - Le grand exposición</h1>
                </div>

                <!-- Layer -->
                <div class="tp-caption ws-hero-description"
                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                    data-y="['middle','middle','middle','middle']" data-voffset="['-50','-50','-50','-38']"             
                    data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"          
                    data-mask_in="x:0px;y:0px;" 
                    data-mask_out="x:0;y:0;" 
                    data-start="1000"            
                    data-responsive_offset="on" 
                    style="z-index: 7;"><h4>Best exhibition Ever</h4>                                
                </div>

                <!-- Button -->
                <div class="tp-caption btn ws-big-btn"
                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                    data-y="['middle','middle','middle','middle']" data-voffset="['92','92','92','76']"                                    
                    data-transform_in="y:50px;opacity:0;s:1500;e:Power4.easeInOut;"             
                    data-start="1000"                      
                    data-responsive_offset="on" 
                    data-responsive="off"
                    style="z-index: 8;">BUY NOW
                </div>
            </li>
        </ul>    
        <div class="tp-static-layers"></div>
        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>         
    </div>
    <!-- Banner Content -->    

    <!-- Exhibition Section Start -->
    <section class="ws-about-section">
        <div class="container">
            <div class="row">

                <!-- Description -->
                <div class="ws-about-content clearfix">
                    <div class="col-sm-8 col-sm-offset-2">
                        @if ($exhibitionFeatured)
                        <h3>{{ $exhibitionFeatured->title }}</h3> 
                        <div class="ws-separator"></div>
                        <p>{{ $exhibitionFeatured->description }}</p>
                        @endif
                    </div>
                </div>

                <!-- Featured Collections -->
                @if (isset($exhibitionFeaturedWorks) && count($exhibitionFeaturedWorks) > 0)
                    <div class="ws-featured-collections clearfix">
                        @foreach ($exhibitionFeaturedWorks as $work)
                            <!-- Item -->
                            <div class="col-sm-4 featured-collections-item">
                                <a href="{{ action('Frontend\WorkController@solo', $work->slug) }}">
                                    <div class="thumbnail">
                                        <img src="/upload/works/midsize/{{ $work->img }}" alt="Duma">
                                        <div class="ws-overlay">
                                        </div>
                                    </div>
                                    <div class="ws-works-caption text-center">
                                        <!-- Title -->
                                        <h4 class="ws-item-title">{{ $work->name }}</h4>
                                        <div class="ws-item-separator"></div>
                                        <!-- Price -->
                                        @if ($work->price)
                                            <div class="ws-item-price">
                                                @if ($work->discount > 0)
                                                    <del>{{ $work->price }} €</del> 
                                                    <ins>{{ $work->discount }} €</ins>
                                                @else 
                                                    <ins>{{ $work->price }} €</ins>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </section>
    <!-- Exhibition Section End -->     

    @if (count($worksOpportunity) > 0)
    <!-- Oportunities Section -->    
    <section class="ws-arrivals-section">

        <div class="ws-works-title clearfix">
            <div class="col-sm-12">
                <h3>Opportunities</h3> 
                <div class="ws-separator"></div>   
            </div>
        </div>        

        <div id="ws-items-carousel">

            @foreach ($worksOpportunity as $work)
                <!-- Item -->
                <div class="ws-works-item" data-sr='wait 0.1s, ease-in 20px'>
                    <a href="{!! action('Frontend\WorkController@solo', $work->slug) !!}">                        
                        <div class="ws-item-offer">
                            <!-- Image -->                        
                            <figure>                            
                                <img src="/upload/works/midsize/{{ $work->img }}" alt="#" class="img-responsive">
                            </figure>                    
                        </div>

                        <div class="ws-works-caption text-center">
                            <!-- Item Category -->
                            <div class="ws-item-category">{{ $work->artist_name }}</div>

                            <!-- Title -->
                            <h3 class="ws-item-title">{{ $work->name }}</h3>                        

                            <div class="ws-item-separator"></div>    

                            @if ($work->price)
                                <div class="ws-item-price">
                                    @if ($work->discount > 0)
                                        <del>{{ $work->price }} €</del> 
                                        <ins>{{ $work->discount }} €</ins>
                                    @else 
                                        <ins>{{ $work->price }} €</ins>
                                    @endif
                                </div>
                            @endif                                                    
                        </div>
                    </a>
                </div>
            @endforeach
            
        </div>
    </section>
    <!-- End Oportunities Section -->     
    @endif

    @if (count($worksNoOpportunity) > 0)
    <!-- Work Featured Start  -->
    <section class="ws-works-section">
        <div class="container">
            <div class="row">   

                <div class="ws-works-title">
                    <div class="col-sm-12">
                        <h3>Featured</h3> 
                        <div class="ws-separator"></div>   
                    </div>
                </div>

                @foreach ($worksNoOpportunity as $work)
                    
                    @include('frontend.shared.workBlock', compact('work'))

                @endforeach

            </div>
        </div>
    </section>
    @endif
    <!-- Work Featured End  -->

    @include('frontend.shared.about')
       
    @include('frontend.shared.subscribe')
    
@endsection

@section('pagescripts')
<script>

    $('.parallax-window').parallax({imageSrc: '{{ asset('/img/backgrounds/wall.jpg') }}'});

</script>
@endsection