<?php
use App\Models\Categorie;
?>
<!DOCTYPE html>
 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Perle Rare</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
 
   
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    
     <!--Font Awesome-->
  <script src="https://kit.fontawesome.com/fa8da91e3f.js" crossorigin="anonymous"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/owl.carousel.css">
    @yield('imagecss')
    <link rel="stylesheet" href="/css/css.css">
    
    <link rel="stylesheet" href="/css/responsive.css">
     <!-- sweetAlert-->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>
  <style>
    body{
        /* background: #f8f8f8; */
    }
  </style>
  <body>
    <nav>
        <div class="site-branding-area">
            <div class="container text-center ">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo">
                            <h1><a href=""><b>La Perle</b><span>Rare</span></a></h1>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="wrap">
                            <div class="search">
                                <form method="get" action="">
                               <input type="search" class="searchTerm"  name="search" placeholder="chercher...">
                               <button type="submit" class="searchButton">
                                 <i class="fa fa-search"></i>
                              </button>
                             </form>
                            </div>
                         </div>
                    </div>
                    <div class="col-sm">
                    <div class="login">
                        
                    @if (Route::has('user.login'))
                                  
                                  
                         @auth 
                       <div style="border:0px;float:right" class="compte"> 	

                           <div class="dropdown dropdown-small">
                                      <a style="color:#000;text-decoration:none;font-family:'pacifico';"data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle btn" href=""><span class="key"><i class="fa-solid fa-list"></i> Mon compte </span></a>
                                      <ul class="dropdown-menu">
                                          <li><a href=""><i class="fa-solid fa-circle-user"></i> Mon profile</a></li>
                                          <li><a href=""><i class="fa-solid fa-heart"></i> Mes favouris</a></li>
                                          <li><a href=""><i class="fa-solid fa-tag"></i> Mes enchères</a></li>
                                          <li><a href=""><i class="fa-solid fa-tag"></i> Mes articles</a></li>
                                          <hr>
                                          <li><a  href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-to-bracket"></i> Déconnection</a></li>
                                          <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>

                                      </ul>
                                  </div>
                         </div>
                           
                        @else
                            <i class="fa-solid fa-user"></i><a  href="{{ route('user.login') }}">s'identifier</a>
                            </div>
                            <div class="login">
                            @if (Route::has('user.register'))
                            <i class="fa-solid fa-user"></i><a href="{{ route('user.register') }}">s'inscrire</a>
                            @endif
                        @endauth
                
                    @endif
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    <!-- End site branding area -->
    
    <div style="padding-left:300px;" class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="">Acceuil</a></li>
                        <li><a href="{{ route('user.register') }}"><i class="fa-solid fa-tag"></i> fiche d'inscription</a></li>
                        <li class=""><a href=""><i class="fa-solid fa-wand-magic-sparkles" style="color: #373839;"></i>Enchérir</a></li>
                        @auth
                        
                        <li class=""><a href="">Mettre en vendre</a></li>
                            @else
                            
                            <li><a href="">Mettre en vendre</a></li>
                            @endauth
                            @auth
                           
        <li class=""><a href="">favouris</a></li>

                       
                        @endauth
                        <li class="dropdown dropdown-small ">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href=""><span class="key">Categories </span></a>
                            <ul class="dropdown-menu">
                           
                                <li><a href=""></a></li>
                              
                            </ul>
                        </li>
                        <li class=""><a href="#apropos">A Propos</a></li>
                       
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
</nav>
@yield('content')
@yield('footer')
