<?php

use App\Http\Controllers\ProfController;
use App\Models\Matiere;
use App\Models\Note;
use App\Models\User;
use App\Models\Prof;

 $prof = auth()->guard('prof')->user();

$matieres = Note::where('idProf', $prof->id)
    ->join('matieres', 'notes.id', '=', 'matieres.id')
    ->select('matieres.*')
    ->distinct()
    ->get();

    $etudiants = User::join('notes', 'users.id', '=', 'notes.idEtu')
        ->select('users.*', 'notes.note as note', 'notes.idEtu as idEtu ')
        ->where('notes.idMat', '=', $prof->id)
        ->get();

    $matieres=Matiere::join('prof_mats', 'matieres.id', '=','prof_mats.idMat' )
                        ->select('matieres.*', 'prof_mats.idProf as idProf')
                        ->where('prof_mats.idProf', '=', $prof->id)
                        ->get();
// Retrieve etudiants (students)
$etudiants = User::all();

            // Iterate through matieres to find the selected class
            foreach ($matieres as $matiere) {
                $buttonName = $matiere->id;
        
                // Check if the button with the name was clicked
                if (request()->has($buttonName)) {
                    // Set the selected class name
                    $selectedClassName = $request->input('selectedClassName');
                    break; // No need to continue checking once found
                }
            
}

// $selectedClassName = Session()->get('selectedClassName');
?>
@extends('dashboard.prof.profBase')
@section('title', 'Professeur')
@section('mainContent')
    <div class="container">
        <img src="{{ asset('img/FSTT.png') }}" alt="Université Logo" style="width: 20%; max-height: 100px;">
        <div class="row">
            <div class="col-md-3 offset-1-md-3" style="margin-top: 45px">
                <h4>Bienvenue à vous, Pr. <b>{{$prof->nomProf}}</b> </h4>
                <hr>
            </div>
        </div> 
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-1-2-3-4-5-6-7-8-9-10-12 offset-1-md-2-3-4-5-6-7-8-9-10-12" style="margin-top: 45px">
    @if(isset($matieres))
    <h1>Listes de vos classes</h1>
    <h5>Listes de vos classes, cliquez sur une classe pour afficher la liste des etudiants</h5>
        @csrf
        @foreach ($matieres as $matiere)
            <a style=" background-color:rgb(2, 220, 180)" class="btn text-white w-50" href="{{ route('chooseClasse',['id'=>$matiere->id])}}" type="button"> {{ $matiere->intituleMat }}</a>
            
        @endforeach
    </div>
</div>
</div>
    @endif
@endsection


