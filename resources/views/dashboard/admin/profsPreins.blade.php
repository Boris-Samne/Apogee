<?php 

namespace App\Models;
use Carbon\Carbon;
use App\Models\Filiere;
use App\Models\profMat;
use App\Models\Matiere;
$profMats=profMat::All();
$matieres = Matiere::All();
$matieresP=array()

?>


@extends('dashboard.admin.base')
@section('content')




<!-- tables start -->
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
<style>
    .timer{
        display: flex;
  flex-direction: row;
  justify-content: ;
  color:black;
    }
</style>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div style="  background-image: linear-gradient(195deg, #999 0%, #999 100%);" class=" border-radius-lg pt-4 pb-3">
          <center>  <h4 class="text-white text-capitalize ps-3">Professeures preinscris</h4>
              </div> 
            
              
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prenom</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Adresse</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Matieres</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de naissance</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">validation</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($profsPreins as $profPreins)
               
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img width="60px" src="" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"></h6>
                            
                          </div>
                        </div>
                      </td>
                     
                      <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{$profPreins->nomProf}}</h6>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{$profPreins->prenomProf}}</h6>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{$profPreins->email}}</h6>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{$profPreins->adrProf}}</h6>
                      </td>
                      <td class="align-middle text-center text-sm">
                       
                            @foreach($profMats as $profsMat)
                                @if ($profsMat->idProf==$profPreins->id)
                                    @foreach($matieres as $matiere)
                                        @if ($matiere->id==$profsMat->idMat)
                                        <h6 class="mb-0 text-sm"><i>.{{$matiere->intituleMat}}</i>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            
                        
                      @foreach($matieresP as $matiere)
								
                                     
                                       
					  @endforeach
                     
                      </td>
                      <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{$profPreins->dateNaissProf}}</h6>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{$profPreins->telProf}}</h6>
                      </td>
                      <td class="align-middle text-center">   
                        <a  class="btn btn-warning" href="{{ route('admin.validationProf',['id'=>$profPreins->id])}}">valider</a>
                       </td>
                    </tr>
                 
                    @endforeach
               
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    
 
      @endsection

