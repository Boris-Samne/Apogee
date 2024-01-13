<?php 

namespace App\Models;
use Illuminate\Support\Facades\Session; 

?>

@extends('dashboard.admin.base')
@section('content')
   <!-- Alert-->
   <style>
.swal2-styled.swal2-confirm {
    border: 0;
    border-radius: 0.25em;
    background: initial;
    background-color: #b42606;
    color: #fff;
    font-size: 1em;
}

</style>
   @if (Session::has('success'))
    <!-- <div class="alert alert-success">
       
    </div> -->
    <script> Swal.fire(
                        
                        //   'vous avez enchérit avec success !',
                        //   'success'
                        " {{ Session::get('success') }}"
                      )
                      </script>
@endif
     
     <h3 style="font-family:'kanit',cursive"> <i class="material-icons opacity-10">table_view</i> Admin</h3><br>
     <h4> <a class="btn btn-warning" href="{{route('admin.classement')}}"  class="nav-link scrollto" onclick="event.preventDefault();document.getElementById('classement-form').submit();"> Calculer la moyenne des etudiants</a></h4>
     <form action="{{ route('admin.classement') }}" method="post" class="d-none" id="classement-form">@csrf</form>
     

  </main>
  <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
    <script type="text/javascript" src="js/script.slider.js"></script>

@endsection