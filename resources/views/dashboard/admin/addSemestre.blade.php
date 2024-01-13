<?php 

namespace App\Models;
use Illuminate\Support\Facades\Session; 
?>

@extends('dashboard.admin.base')
@section('content')
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
   <!-- Alert-->
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
<div  class="row mt-4">
		<div  class="col-7 p-1  bg-white border border-1 offset-2">
			<h3 style="font-family:'kanit',sans serif;" class="my-3">Ajouter une semestre</h3>

				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
                
				<form class="register-form" action="{{route('admin.insertSemestre')}}" method="post" enctype="multipart/form-data" >
                @csrf
                 <div   class="inputs" >
					<label>Intitule *</label><br>
					<input type="text" name="intituleSem" class="form-control" placeholder="Nom de la semestre" value="" id="intituleSem"><br>
                      </div>
                      <div  class="inputs" >
					<label>date Debut *</label><br>
					<input type="date" name="dateDeb"  class="form-control" placeholder="date Debut" value=""  id="dateDeb"><br>
                    </div>
                    <div  class="inputs" >
					<label>date Fin *</label><br>
					<input type="date" name="dateFin"  class="form-control" placeholder="date Fin" value=""  id="dateFin"><br>
                    </div>
                   
					<br>
					<input type="reset" class="btn btn-warning" value="recommencer">
					<input style="background-image: linear-gradient(195deg, #c95715 0%, #8b0808 100%);" type="submit" class="btn text-white ms-3" value="confirmer">
				</form>
		</div>
	</div>
		  
</body>
</html>

@endsection