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
			<h3 style="font-family:'kanit',sans serif;" class="my-3">Ajouter une matiere</h3>

				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
                
				<form class="register-form" action="{{route('admin.insertMatiere')}}" method="post" enctype="multipart/form-data" >
                @csrf
                 <div   class="inputs" >
					<label>Intitule *</label><br>
					<input type="text" name="intituleMat" class="form-control" placeholder="Nom de la matiere" value="" id="intituleMat"><br>
                      </div>
                      <div  class="inputs" >
					<label>Coef *</label><br>
					<input type="text" name="coefMat"  class="form-control" placeholder="cycle de la matiere" value=""  id="coefMat"><br>
                    </div>
					<div  class="form-input  p-b-20" >
									<label  style="float:left;"class="name">Filiere *</label><br>
									<div class="rs-select2 js-select-simple select--no-search">
										<select class="form-control"  name="filiere" id="filiere" >
											<option value="">-- Selectionner une filiere --</option>
											@foreach(Filiere::get() as $filiere)
											<option value='{{ $filiere->id }}'>{{ $filiere->intituleFil }}</option>
											@endforeach
										</select>
										</div> 
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