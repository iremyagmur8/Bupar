@extends('layouts.app')
@section('content')

    @php
        use App\Http\Controllers\HomepageController
    @endphp
    <section id="page-title"
             @isset($cData->categories->files[0]->file) style="background: url('{{Storage::url("images/userfiles/". $cData->categories->files[0]->file)}}');background-size:cover;height: 550px;
                 background-position: center center;background-repeat: no-repeat"@endisset>
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="page-title">
                <h1 class="text-uppercase text-medium"> @isset($cData->categories->title)
                        {!! $cData->categories->title !!} @endif</h1>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <ul class="grid grid-4-columns">
                @foreach($cData->references as $key=>$val)
                    <li>
                        <a data-content="{{$val->title}}" title=""
                           data-placement="top" data-toggle="popover" data-container="body"
                           data-trigger="hover">
                            <div style="background:url('{{Storage::url("images/userfiles/". $val->files[0]->file)}}');background-size: contain;background-repeat: no-repeat;background-position: center center;height:150px"></div></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

@endsection
