

<?php

use App\Models\Filiere;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Register</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                  <h4>User Register</h4><hr>
                  <form action="{{ route('user.create') }}" method="post" autocomplete="off">
                  @if (Session::get('success'))
                         <div class="alert alert-success">
                             {{ Session::get('success') }}
                         </div>
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif
                    @csrf
                      <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{ old('name') }}">
                          <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                      </div>
                      <div class="form-group">
                          <label for="name">Prenom</label>
                          <input type="text" class="form-control" name="prenom" placeholder="Enter full prenom" value="{{ old('prenom') }}">
                          <span class="text-danger">@error('prenom'){{ $message }} @enderror</span>
                      </div>
                      <div class="form-group">
                          <label for="name">Contact</label>
                          <input type="text" class="form-control" name="tel" placeholder="Enter full tel" value="{{ old('tel') }}">
                          <span class="text-danger">@error('tel'){{ $message }} @enderror</span>
                      </div>
                      <div class="form-group">
                          <label for="name">date de naissance</label>
                          <input type="date" class="form-control" name="dateNaissEtu" placeholder="Enter full date de naiss" value="{{ old('dateNaissEtu') }}">
                          <span class="text-danger">@error('dateNaissEtu'){{ $message }} @enderror</span>
                      </div>
                      <div class="form-group">
                          <label for="name">Adresse</label>
                          <input type="text" class="form-control" name="adrEtu" placeholder="Enter full adress" value="{{ old('adrEtu') }}">
                          <span class="text-danger">@error('adrEtu'){{ $message }} @enderror</span>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div  class="form-input  p-b-20" >
									<label  style="float:left;"class="name">Filiere *</label><br>
									<div class="rs-select2 js-select-simple select--no-search">
										<select class="form-control"  name="filiere" id="filiere" >
											<option value="">-- Selectionner une filiere --</option>
											@foreach(Filiere::get() as $filiere)
											<option value='{{ $filiere->id }}'>{{ $filiere->intituleFil }}-cycle : {{ $filiere->cycle }}</option>
											@endforeach
										</select>
										</div> 
							</div>
                    
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                          <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                      </div>
                      <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
                        <span class="text-danger">@error('Confirm Password'){{ $message }} @enderror</span>
                    </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Register</button>
                      </div>
                      <br>
                      <a href="{{ route('user.login') }}">I already have an account</a>
                  </form>
            </div>
        </div>
    </div>
    
</body>
</html>
