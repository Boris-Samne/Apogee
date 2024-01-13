@extends('dashboard.user.userBase')
@section('title', 'Documents')
@section('mainContent')

<center><a style=" background-color:rgb(255, 34, 0); margin=10px" class="btn text-white w-50" href="{{ route('user.docs',['doc'=>1])}}" type="button"><span style="color:black;">Telecharger Ma Convention
 de stage de fin d'etude</span></a></center>       
<center><a style=" background-color:rgb(208, 255, 0) ; margin-top=100px" class="btn text-white w-50" href="{{ route('user.docs',['doc'=>2])}}" type="button"><span style="color:black;">Telecharger Ma Convention
    de stage d'initiation</span></a></center>    
<center><a style=" background-color:rgb(0, 94, 255) ; margin-top=100px" class="btn text-white w-50" href="{{ route('user.docs',['doc'=>3])}}" type="button"><span style="color:black;">Telecharger Mon Diplome</span></a></center>
<center><a style=" background-color:rgb(255, 0, 208) ; margin-top=100px" class="btn text-white w-50" href="{{ route('user.docs',['doc'=>4])}}" type="button"><span style="color:black;">Telecharger Mon attestation d'inscription</span></a></center>  
<center><a style=" background-color:rgb(255, 0, 144); margin-top=100px" class="btn text-white w-50" href="{{ route('user.docs',['doc'=>5])}}" type="button"><span style="color:black;">Telecharger Ma fiche d'assurance</span></a></center>  
                
@endsection