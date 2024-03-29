<!DOCTYPE html>
<html lang="en"> 
<head>
     
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}"> 
    
    <!-- FontAwesome JS-->
    <script defer src="{{asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/portal.css')}}">
    <script src="https://d3js.org/d3.v6.min.js"></script>

    <title>IDMPSCI</title> 
</head>


<body class="app">
    
    <header class="app-header fixed-top"> 	 {{-- ini untuk header atas, tapi nutupin logo portal --}}
        <div class="app-header-inner">   {{-- biar ketengah dan tidak kena sidebar --}}
            @include('layout.sidebaradmin')
            @include('layout.headeradmin')
        </div>
        
    </header>


    @yield('isi')
                
            


    <!-- Javascript -->          
    <script src="{{asset('assets/plugins/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>  
    
    <!-- Charts JS -->
    <script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script> 
    <script src="{{asset('assets/js/index-charts.js')}}"></script> 
        
    <!-- Page Specific JS -->
    <script src="{{asset('assets/js/app.js')}}"></script> 
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html> 