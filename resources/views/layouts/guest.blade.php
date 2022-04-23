<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="yellow-skin">
        
        <div class="preloader"></div>

        <div id="main-wrapper"> 
            
            @include('partials.nav')

                <!-- Page Heading -->
            @if (isset($header))
                <div class="page-title" style="background:#f4f4f4 url({{ asset('img/slider-5.jpg')}});" data-overlay="5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                {{ $header }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{ $slot }}
            
        @include('partials.footer')
        </div>

        @include('partials.script')
    </body>
</html>
