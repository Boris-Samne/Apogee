
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Perle Rare|Admin</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    
     <!--Font Awesome-->
  <script src="https://kit.fontawesome.com/fa8da91e3f.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{asset('css/admin/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('css/admin/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/admin/material-dashboard.css?v=3.1.0')}}">
    
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
 
    <!-- sweetAlert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
    <style>
     /*logo */

    nav .logo h1 {
    font-size: 10px;
    margin: 30px 0;
    font-weight: 420;
    
    }

    nav .logo h1 a {
    color: #999;
    font-size: 30px;
    font-family: 'Pacifico', cursive;
    }


    nav .logo h1 a:hover {
    color: #6b0d0d;
    text-decoration: none;
    opacity: .7
    }

   nav  .logo h1 a span {
    color: #b42606;
    }

    </style>
  <body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        
        <span class="ms-1 font-weight-bold text-white"> Administration </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

        <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('admin.filieres') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">filieres</span>
        </a>
        </li>

        <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('admin.matieres') }}" > 
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">matieres</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('admin.semestres') }}">
            
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
            </div>
            
            <span class="nav-link-text ms-1">semestres</span>
        </a>
       
        <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('admin.etudiantesPreins') }}">
            
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">estudiants preinscris</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('admin.profsPreins') }}">
            
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">profs preinscris</span>
        </a>
        </li>
       
        </ul>
    </div>

    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
                    @auth
                            <a  style="  background-image: linear-gradient(195deg, #c95715 0%, #8b0808 100%);" class="btn text-white w-100" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a>
                            <form action="{{ route('admin.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                            </div>
                            <div class="login">
                            
                            
                        @else
                           
                          
                           
                        @endauth

        </div>
    </div>

    </aside>
    <main class="main-content border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
          <nav class="logo">
          <h1><a href="{{ route('admin.home') }}"><b><span>La</span>Perle</b><span>Rare</span></a></h1>
            
          </nav>
        </div>
        <div>
                         
        <form  class="form-search" style="float:left;" method="get" action="">
          <input type="search" class="form-control"  name="search" placeholder="chercher...">
          
        
        </button>
        </form>
</div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          
       
          </div>
        </div>
    </nav>
@yield('content')

