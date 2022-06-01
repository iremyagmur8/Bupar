@extends('layouts.app')
@section('content')

    @php
        use App\Http\Controllers\HomepageController
    @endphp

    <section id="page-title"
             @if(isset($cData->posts[0]->files[0]->file)) style="background: url('{{Storage::url("images/userfiles/". $cData->posts[0]->files[0]->file)}}');background-size:cover;height: 550px;
                 background-position: center center;background-repeat: no-repeat"
             @else  style="background: url('{{Storage::url("images/userfiles/". $cData->posts->files[0]->file)}}');background-size:cover;height: 550px;
                 background-position: center center;background-repeat: no-repeat" @endif>
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="page-title">
                <h1 class="text-uppercase text-medium"> @if(isset($cData->posts[0]->title)){!! $cData->posts[0]->title !!} @else {!! $cData->posts->title !!} @endif</h1>
            </div>
        </div>
    </section>


    <section class="m-t-50 postDescription">
        <div class="container">
            <h3>@if(isset($cData->posts[0]->shortdescription)){!! $cData->posts[0]->shortdescription !!} @else @isset($cData->posts->shortdescription) {!! $cData->posts->shortdescription !!}@endisset @endif </h3>
            @if(isset($cData->posts[0]->description)){!! $cData->posts[0]->description !!} @else @isset($cData->posts->description){!! $cData->posts->description !!}@endisset @endif
        </div>
    </section>

    @if($cData->posts[1])
        <section id="page-content">
            <div class="container">
                <div class="row">
                    <div class="content col-lg-12">
                        <div class="accordion accordion-simple">

                            @foreach($cData->posts as $key=>$val)
                                @if(!$loop->first)
                                    <div class="ac-item">
                                        <h5 class="ac-title">@isset($val->title){!! $val->title !!}@endisset</h5>
                                        <div class="ac-content">
                                            @isset($val->description) {!! $val->description !!}@endisset
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


@endsection
