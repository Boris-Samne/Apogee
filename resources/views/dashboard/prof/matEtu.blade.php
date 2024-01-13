@extends('dashboard.prof.profBase')
@section('title', 'Liste Des Etudiants')
@section('mainContent')
<div class="container">
    <div class="row">
        <div class="col-md-1-2-3-4-5-6-7-8-9-10-12 offset-1-md-2-3-4-5-6-7-8-9-10-12" style="margin-top: 45px">
                <h4>Liste des étudiants de la classe n°{{$id}}</h4>
                <h4 style="color: blue">@if(isset($notif)) {{$notif}} @endif </h4>
        </hr>
        <form action="{{ route('RegisterMark',['id'=>$id])}}" method="POST">
            @csrf
            <button class="btn btn-outline-success" type="submit">Enregistrer</button>
            </hr>
            <div class="table-responsive" style="margin-top: 10px">
                <table id="tableId" class="table table-bordered table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Apogee</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etudiants as $etudiant)
                            <tr>
                                <th>{{ $etudiant->id }}</th>
                                <th>{{ $etudiant->nomEtu }}</th>
                                <th>{{ $etudiant->prenomEtu }}</th>
                                <th>{{ $etudiant->email }}</th>
                                <th><input type="number" name="note{{$etudiant->id}}" placeholder="{{ $etudiant->note}}"></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
                
            </div>
        </div>
    </div>
@endsection