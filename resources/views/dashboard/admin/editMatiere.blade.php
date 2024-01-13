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
<div class="row ">
		<div class="col-7  bg-white border border-1 offset-2">
			<h3 style="font-family:'kanit', sans-serif;" class="my-3">Editer une matiere</h3>
			
            			
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form class="container" action="{{route('admin.updateMatiere', $matiere->id)}}" method="post" enctype="multipart/form-data" >
                @csrf

                @method('PUT')
					<label>Intitule </label><br>
					<input type="text" name="intituleMat" class="form-control" id="intituleMat"  value="{{$matiere->intituleMat}}"><br>

					<label>Coef </label><br>
					<input type="text" name="coefMat"  class="form-control" value="{{$matiere->coefMat}}" id="coefMat" ><br>
                   
                 
					<br>
					<br>
					<input type="reset" class="btn btn-warning" value="recommencer">
					<input  style="background-image: linear-gradient(195deg, #c95715 0%, #8b0808 100%);" type="submit" class="btn text-white ms-3" value="Editer ">
				</form>
		</div>
	</div>
		 
</body>
</html>

@endsection




