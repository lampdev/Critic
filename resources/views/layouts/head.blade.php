<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>CrunchCritic</title>

        <!-- Fonts 
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.2.1/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/fh-3.1.3/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.2.1/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/fh-3.1.3/datatables.min.js"></script>


        <!--Datatables
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>-->

       

    </head>

<body>
<div id="app">
    </div>
        @yield('content')

        <!-- Scripts -->

 <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

