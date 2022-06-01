@extends('layouts.app')
@section('content')

    @php
        use App\Http\Controllers\HomepageController
    @endphp
    @isset($cData->contact->files[0]->file)
        <section id="page-title"
                 style="background: url('{{Storage::url("images/userfiles/". $cData->contact->files[0]->file)}}');background-size:cover;height: 550px;
                     background-position: center center;background-repeat: no-repeat">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="page-title">
                    <h1 class="text-uppercase text-medium"></h1>
                </div>
            </div>
        </section>
    @endisset
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="text-uppercase">İletişim Formu</h3>
                    <div class="m-t-10">
                        <form class="widget-contact-form" novalidate action="include/contact-form.php" role="form"
                              method="post">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">İsim</label>
                                    <input type="text" aria-required="true" name="widget-contact-form-name" required
                                           class="form-control required name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" aria-required="true" name="widget-contact-form-email" required
                                           class="form-control required email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="tel">Tel No</label>
                                    <input type="text" name="widget-contact-form-subject" required
                                           class="form-control required">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="message">Mesaj</label>
                                    <textarea type="text" name="widget-contact-form-message" required rows="5"
                                              class="form-control required"></textarea>
                                </div>

                                <button class="btn ml-1" type="submit" id="form-submit"><i
                                        class="fa fa-paper-plane"></i>&nbsp;Mesaj
                                    Gönder
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <h3 class="text-uppercase">Adres</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            @if($vars->contact->address)
                                <address>
                                    {!! nl2br($vars->contact->address )!!}
                                    <br>
                                    <a href="tel:{{$vars->contact->phone}}">Tel:</h4> {!! $vars->contact->phone !!}</a>
                                </address>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <iframe src="{{$vars->contact->googlemap}}" height="300" style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
