<?php
    $user=Auth::guard('web')->user();
?>
@extends('dashboard.user.userBase')
@section('title', 'etudiants')
@section('mainContent')

@if (isset($results))
<img src="{{ asset('img/FSTT.png') }}" alt="Université Logo" style="width: 20%; max-height: 100px;">
<div class="container">
    <div class="row">
        <div class="col-md-1-2-3-4-5-6-7-8-9-10-12 offset-1-md-2-3-4-5-6-7-8-9-10-12" style="margin-top: 45px">
                <h4 style="color: black"><b>Notes de l'etudiant {{$user->nomEtu}}</b></h4>
        </hr>
            <div class="table-responsive">
                <table id="tableId" class="table table-bordered table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Matieres</th>
                            <th>Coef</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                            <tr>
                                <th>{{ $result->intituleMat}}</th>
                                <th>{{ $result->coef }}</th>
                                <th>{{ $result->note }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <center><a style=" background-color:rgb(255, 34, 0)" class="btn text-white w-50" href="{{ route('user.releve',['user'=>$user])}}" type="button">Telecharger Mon bulletin</a></center>    
                
            </div>
        </div>
    </div>
@else
<center>
<div class="container">
    <img src="{{ asset('img/FSTT.png') }}" alt="Université Logo" style="width: 20%; max-height: 100px;">
    <div class="">
        <div class="col-md-3 offset-1-md-3" style="margin-top: 45px">
            <h4 style="color: black"><b>Bienvenue à vous, M/mme. {{$user->nomEtu}}</b> </h4>
            <hr>
        </div>
    </div> 
</div> <a style=" background-color:rgb(255, 34, 0)" class="btn text-white w-50" href="{{ route('user.result',['user'=>$user])}}" type="button">Decouvrir vos resultats</a></center>    
@endif
@endsection
    
