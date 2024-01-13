<?php 

namespace App\Models;
use Carbon\Carbon;
use App\Models\Filiere;
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
          <center>  <h4 class="text-white text-capitalize ps-3">Etudiantes preinscris</h4>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Filiere</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de naissance</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">validation</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($etudiantesPreins as $etudiantePreins)
               
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
                      <h6 class="mb-0 text-sm">{{$etudiantePreins->nomEtu}}</h6>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{$etudiantePreins->prenomEtu}}</h6>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{$etudiantePreins->email}}</h6>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{$etudiantePreins->adrEtu}}</h6>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @php
                        $id_filier=$etudiantePreins->filiere
                        @endphp
                      @foreach(Filiere::get() as $filiere)
								@if  ($filiere->id ==  $id_filier)
                                     <h6 class="mb-0 text-sm">{{$filiere->intituleFil}}:
                                        cycle - {{$filiere->cycle}}</h6>
                                 @endif
					  @endforeach
                     
                      </td>
                      <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{$etudiantePreins->dateNaissEtu}}</h6>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">{{$etudiantePreins->telEtu}}</h6>
                      </td>
                      <td class="align-middle text-center">   
                        <a  class="btn btn-warning" href="{{ route('admin.validationUser',['id'=>$etudiantePreins->id])}}">valider</a>
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

