<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-r7esQsk1PEKWh6Ms0mVvZWoAo3COh3WJq1q5/D5e9OrZy4A4kXaI8m3Kz4FExuJj" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-y3sA5ZFVAd12xbvX0FbfmsG1NEVIz0PnwpMQWFG8shS6U2fQ/2BqT6MIJ2g+Xp/i" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-y3sA5ZFVAd12xbvX0FbfmsG1NEVIz0PnwpMQWFG8shS6U2fQ/2BqT6MIJ2g+Xp/i" crossorigin="anonymous">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-y3sA5ZFVAd12xbvX0FbfmsG1NEVIz0PnwpMQWFG8shS6U2fQ/2BqT6MIJ2g+Xp/i" crossorigin="anonymous">
    <style>
        body {
            background-image: asset();
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            background-color=red;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        /* Ajoutez cette classe pour aligner les champs input */
        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group .form-label {
            flex: 1;
            margin-right: 10px;
        }

        .input-group .form-control {
            flex: 2;
        }
    </style>
    <title>Authentification</title>
</head>
<body >
    <div class="container" >
        <div><center><h1><a href="{{ route('admin.home') }}"><b>Appogee</b></a></h1></center></div>
                 <form action="{{ route('admin.check') }}" method="post">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="email" id="email" placeholder="Email"/>
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Mot de passe"/>
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    </div>
                     <div class="form-group">
                         <button type="submit"class="form-submit">S'identifier</button>
                     </div>
                     
                 </form>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-nvZONi1i+vpL5gBdFLFkWJ0GbhKMOfO6IR98tEJe8kSKpqREd3/LKQwGJ3SgRCdW" crossorigin="anonymous"></script>
            </div>
    </body>
            </html>
            