<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- toastr --}}
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>      
    <script src="{{ asset('js/toastr.min.js') }}"></script>   
    <script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>     

<script>  
        @if(Session::has('message')) 
            var type = "{{ Session::get('alert-type', 'info') }}"; 
            switch (type) {
                case 'info' :
                    toastr.info("{{ Session::get('message') }}");
                    break; 
                case 'success' :
                    toastr.success("{{ Session::get('message') }}");
                    break; 
                case 'warning' :
                    toastr.warning("{{ Session::get('message') }}");
                    break; 
                case 'error' :
                    toastr.error("{{ Session::get('message') }}");
                    break;  
            }
        @endif
    </script>  

    @yield('extjs')  

</body>
</html>
