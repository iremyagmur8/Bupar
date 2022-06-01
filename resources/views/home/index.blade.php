@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')
    @php
        use App\Http\Controllers\HomepageController
    @endphp
    <div class="body-inner">
        <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-height-xs="360">
            <!-- Slide 1 -->
            @isset($cData->place[1])
                @foreach($cData->place[1] as $key=>$val)
                    <div class="slide kenburns"
                         @isset($val->files[0]->file) @if(pathinfo($val->files[0]->file, PATHINFO_EXTENSION) == 'mp4')  data-bg-video="{{Storage::url("images/userfiles/". $val->files[0]->file)}}"
                         @else data-bg-image="{{Storage::url("images/userfiles/". $val->files[0]->file)}}" @endif @endisset>
                        <div class="bg-overlay"></div>

                        <div class="container">
                            <div class="slide-captions text-light">
                                @isset($val->title)
                                    <h1 class="slider-head" data-animate="fadeInUp" data-animate-delay="600">
                                        {!! $val->title !!}
                                    </h1>
                                @endisset
                                <div class="row">
                                    @foreach($cData->place[100] as $key2=>$val2)
                                        <div class="col-lg-4 ">
                                            <div
                                                class="icon-box box-type effect medium center process text-left py-0 my-0">
                                                <div class="icon"><a href="#"><i class="{{$val2->buttontext}}"></i></a>
                                                </div>
                                                <h3 class="m-0">{{$val2->title}}</h3>
                                                <a href="{{$val2->link}}" class="item-link">İncele <i class="icon-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        @endisset
        <!-- end: Slide 1 -->
        </div>
    </div>

    <section class="p-t-100 p-b-100 m-b-50" @isset($cData->hakkimizda->files[0]->file)
    data-bg-image="{{Storage::url("images/userfiles/". $cData->hakkimizda->files[0]->file)}}"@endisset>
        <div class="container">
            <div class="row align-items-center">
                @isset($cData->hakkimizda->files[1]->file)
                    <div class="col-lg-5">
                        <img alt="" width="100%" height="100%"
                             src="{{Storage::url("images/userfiles/". $cData->hakkimizda->files[1]->file)}}">
                        <div class="row justify-content-end">
                            <div class="col-lg-10 aboutBlockquote">
                                <div class="blockquote blockquote-fancy">
                                    <h2><i aria-hidden="true" class="fas fa-quote-left"></i>
                                        {!! $cData->hakkimizda->shortdescription !!}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset
                <div class="col-lg-6 offset-lg-1">
                    <div class="heading-text aboutText heading-section m-0 p-0">
                        <h5 class="text-uppercase">{!! $cData->hakkimizda->title !!}
                        </h5>
                        <h1>Biz Kimiz?</h1>
                        <p>{!! $cData->hakkimizda->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php($f=0)
    @foreach ($cData->place[2] as $key=>$val)
        @php($f++)
        @if($loop->iteration % 2 == 0)
            <section class="background-grey middleBack p-b-50 ">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="heading-text heading-section text-left mt-5 ml-5">
                            <h4 class="text-uppercase">
                                0{{$f}}
                            </h4>
                            <h1>{!! $val->title !!} </h1>
                            <p> {!! $val->description !!} </p>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1"
                         style="background-image: url('{{Storage::url("images/userfiles/". $val->files[0]->file)}}');border-radius:10px;background-position: center center;background-repeat: no-repeat;background-size: cover;height:450px; "></div>
                </div>
            </section>
        @else
            <section class="background-grey middleBack p-b-50 p-t-0">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-left"
                         style="background-image: url('{{Storage::url("images/userfiles/". $val->files[0]->file)}}');border-radius:10px;background-position: center center;background-repeat: no-repeat;background-size: cover;height:450px; "></div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="heading-text heading-section text-right mt-5 mr-5">
                            <h4 class="text-uppercase" style="font-family:'Rubik', Sans-serif;
                    color: lightgrey;
                    font-weight: 800;
                    letter-spacing: 2.5px;"> 0{{$f}}
                            </h4>
                            <h1>{!! $val->title !!} </h1>
                            <p> {!! $val->description !!} </p>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach

    <section class="p-t-100 p-b-100">
        <div class="parallax-container img-loaded bottomParallax"
             data-bg="{{Storage::url("images/userfiles/". $cData->category->files[0]->file)}}" data-velocity="-.140"
             style="background: url(&quot;{{Storage::url("images/userfiles/". $cData->category->files[0]->file)}}&quot;);"
             data-ll-status="loaded"></div>
        <div class="container-fluid">
            <!-- Testimonials -->
            <div class="carousel equalize testimonial testimonial-box" data-margin="20" data-arrows="false"
                 data-items="3" data-items-sm="2" data-items-xxs="1" data-equalize-item=".testimonial-item">
                @isset($cData->testimonial)
                    @foreach($cData->testimonial as $key=>$val)
                        <div class="testimonial-item">
                            <div class="quote-left"><i aria-hidden="true" class="fas fa-quote-left"></i></div>
                            @isset($val->files[0]->file)<img src="{{Storage::url("images/userfiles/". $val->files[0]->file)}}" alt="">@endisset()
                            <span>{!! $val->title !!}</span>
                            <span>{!! $val->tag !!}</span>
                            <p>{!! $val->description !!}</p>
                        </div>
                    @endforeach
                @endisset
            </div>
            <!-- end: Testimonials -->
        </div>
    </section>
    <section class="m-t-50">
        <div class="container">
            <div class="heading-text referencesText text-center">
                <h5 class="text-uppercase m-0">BUPAR - ARAŞTIRMA & DANIŞMANLIK</h5>
                <h2 class="m-0"><span>Referanslarımız</span></h2>
                <a href="/referanslarimiz" class="btn btn-outline">Tümünü Gör</a>
            </div>
            <ul class="grid grid-3-columns">
                @foreach($cData->references as $key=>$val)
                <li>
                    <a data-content="{!! $val->title !!}">
                        @isset($val->files[0]->file) <div style="background: url('{{Storage::url("images/userfiles/". $val->files[0]->file)}}');background-repeat: no-repeat;background-position: center center;background-size: contain;height:140px"></div>@endisset()
                </li>
                    @endforeach
            </ul>
        </div>
    </section>
@endsection
