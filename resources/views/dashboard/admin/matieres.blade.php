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
     
     <h3 style="font-family:'kanit',cursive"> <i class="material-icons opacity-10">table_view</i> matieres</h3><br>
     <h4> <a class="btn btn-warning" href="{{ route('admin.addMatiere') }}"> ajouter Matiere</a></h4>
     
     <div class="row mt-4">
     @foreach(Matiere::get() as $matiere)
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="chart border-radius-lg py-3 pe-1">
                    <a href=""></a>
                </div>
            </div>
            <div class="card-body">
              <h5 class="mb-0 ">Matiere : {{$matiere->intituleMat}}</h5>
              <p class="text-sm "> Coef : {{$matiere->coefMat}} </p>
              <hr class="dark horizontal">
              <div >
                <a style=" background-image: linear-gradient(195deg, #b25e2a 0%, #eaa505 100%);" class="btn text-white w-50" href="{{ route('admin.editMatiere',['id'=>$matiere->id])}}" type="button">Editer</a>
                <a style=" background-image: linear-gradient(195deg, #c95715 0%, #8b0808 100%);" class="btn text-white w-50" href="{{ route('admin.deleteMatiere',['id'=>$matiere->id])}}" type="button">supprimer</a>
               </div>
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm">Crée le  {{$matiere->created_at}}</p>
                <br>
                <i class="material-icons text-sm my-auto me-1">schedule</i>

                <p class="mb-0 text-sm">Editée le {{$matiere->updated_at}}</p>
            
        
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>

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