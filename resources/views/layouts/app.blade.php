<?php

function sanitize_output($buffer)
{

    $search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );

    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}

ob_start("sanitize_output");

?><!DOCTYPE html>
<html lang="tr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content="@yield('desc')">
    <link rel="apple-touch-icon" sizes="57x57" href="/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>@yield('title') {{Config::get("solaris.site.name")}}</title>
    <!-- Stylesheets & Fonts -->
    <link href="/assetWeb/polo/css/plugins.css" rel="stylesheet">
    <link href="/assetWeb/polo/css/style.css" rel="stylesheet">

    <!-- Template color -->
    <link href="/assetWeb/polo/css/color-variations/purple.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/custom.css?v={{rand(0,999)}}" rel="stylesheet">
    <script src="/assetWeb/polo/js/jquery.js"></script>
    @isset($amp)
        <link rel="amphtml" href="{{$amp}}"/> @endisset
<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{Config::get("solaris.site.google")}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{Config::get("solaris.site.google")}}');
    </script>
</head>

<body>


<!-- Body Inner -->
<div class="body-inner">

    <header id="header" data-transparent="true" data-fullwidth="false" class="dark submenu-light">
        <div class="header-inner">
            <div class="container">
                <!--Logo-->
                <div id="logo">
                    <a href="/">
                        <span class="logo-default"><img width="270" src="/images/logo.png"></span>
                        <span class="logo-dark"><img width="270" src="/images/logo.png"></span>
                    </a>
                </div>

                <div id="mainMenu-trigger"><a class="lines-button x"><span class="lines"></span></a></div>
                <!--Navigation-->
                <div id="mainMenu" class="menu-left">
                    <div class="container">
                        <nav>
                            <ul>
                                @isset( $vars->menu)
                                    @if(count($vars->menu)>0)
                                        @foreach($vars->menu as $key=>$val)
                                            <li @if(count($val->childs)>0)  class="dropdown" @endif>
                                                <span class="dropdown-arrow"></span> <a
                                                    href="@if($val->link){{$val->link}}{{$val->shortdescription}}@else{{"/".str_slug($val->title,"-")."/".$val->id.".html"}}@endif">{{$val->title}}</a>
                                                @if(count($val->childs)>0)
                                                    <ul class="dropdown-menu" style="">
                                                        @foreach($val->childs as $xKey=>$cVal)
                                                            <li @if(count($cVal->childs)>0) class="dropdown-submenu"@endif><span
                                                                    class="dropdown-arrow"></span> <a
                                                                    href="@if($cVal->link){{$cVal->link}}@else{{"/".str_slug($cVal->title,"-")."/".$cVal->id.".html"}}@endif">{{$cVal->title}}</a>
                                                                <ul class="dropdown-menu" style="">
                                                                    @foreach($cVal->childs as $sKey=>$sVal)
                                                                        <li><a
                                                                                href="@if($sVal->link){{$sVal->link}}@else{{"/".str_slug($sVal->title,"-")."/".$sVal->id.".html"}}@endif">{{$sVal->title}}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                            </li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endisset
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield("content")

    <footer id="footer" style="background-image: url('{{Storage::url("images/userfiles/". $vars->contact->files[0]->file)}}');">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <!-- Footer widget area 1 -->
                        <div class="widget  widget-contact-us">
                            <h4>İletişim Bilgileri</h4>
                            <ul class="list-icon">
                                @if($vars->contact->address)
                                    <li><a href=""><i class="fa fa-map-marker-alt"></i>{!! nl2br($vars->contact->address )!!}</a></li>
                                @endif
                                @if($vars->contact->phone)<li><a href="tel:{!! $vars->contact->phone !!}"><i class="fa fa-phone"></i>{!! $vars->contact->phone !!}</a></li>
                                @endif
                                @if($vars->contact->mail)<li><a href="mailto:{!! $vars->contact->mail !!}"><i class="far fa-envelope"></i>{!! $vars->contact->mail !!}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="widget">
                            <h4>Linkler</h4>
                            <ul class="list">
                                @foreach($vars->menu as $key=>$val)
                                    <li><a href="#">{!! $val->title !!}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="widget clearfix widget-newsletter">
                            <h4>E-Bülten</h4>
                            <p class="widget-desc">
                                {!! $vars->contact->description !!}
                            </p>
                            <form class="widget-subscribe-form p-r-40" action="include/subscribe-form.php" role="form"
                                  method="post" novalidate="novalidate">
                                <div class="input-group">
                                    <input aria-required="true" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email" type="email">
                                    <span class="input-group-btn"><button type="submit" id="widget-subscribe-submit-button" class="btn"><i class="fa fa-paper-plane"></i></button></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="social-icons social-icons-colored float-left">
                            <ul>
                                @if($vars->contact->facebook)<li class="social-facebook"><a href="{{$vars->contact->facebook}}"><i class="fab fa-facebook-f"></i></a></li>@endif
                                @if($vars->contact->twitter)<li class="social-twitter"><a href="{{$vars->contact->twitter}}"><i class="fab fa-twitter"></i></a></li>@endif
                                @if($vars->contact->instagram)<li class="social-instagram"><a href="{{$vars->contact->instagram}}"><i class="fab fa-instagram"></i></a></li>@endif
                                @if($vars->contact->youtube)<li class="social-youtube"><a href="{{$vars->contact->youtube}}"><i class="fab fa-youtube"></i></a></li>@endif
                                @if($vars->contact->linkedin)<li class="social-linkedin"><a href="{{$vars->contact->linkedin}}"><i class="fab fa-linkedin"></i></a></li>@endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="copyright-text text-right">&copy; {{date("Y")}} {{Config::get("solaris.site.name")}}
                            <a href="#" target="_blank" rel="noopener"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- end: Body Inner -->

    <div id="cookieNotify" class="modal-strip cookie-notify background-dark" data-delay="1000" data-expire="1"
         data-cookie-name="cookiebar2020_1" data-cookie-enabled="true">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-sm-center sm-center sm-m-b-10 m-t-5">
                    {{Config::get("solaris.site.cookiedesc")}}
                </div>
                <div class="col-lg-4 text-right sm-text-center sm-center">

                    <button type="button" class="btn btn-rounded btn-light btn-sm modal-confirm">
                        {{Config::get("solaris.site.cookiebutton")}}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->

    <script src="/assetWeb/polo/js/plugins.js"></script>

    <!--Template functions-->
    <script src="/assetWeb/polo/js/functions.js"></script>

    <!--Template functions-->
    <script src="/js/solaris.js"></script>

</body>

</html><?php ob_end_flush();?>
