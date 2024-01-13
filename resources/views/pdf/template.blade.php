<!-- resources/views/pdf/resultats.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de l'Étudiant</title>
</head>
<style>
    body {
        margin: 0;
    }

    .container {
        display: flex;
    }

    .left-image,
    .right-image {
        width: 20%;
        max-width: 50%;
        height: 100px; 
    }
    .right-image {
        align-self: flex-end ;
        align-items: flex-end;
    }
    .left-image{
        align-self: flex-start;
        align-items: flex-start;
    }

    table{
        margin: auto;
        width: 100%;
    }

    tr{
        width: 50%;
    }
</style>
<body>
    <div class="container">
        <img src="img/FSTT.png" alt="Université Logo" class="left-image"><img src="img/fac.png" alt="Université Logo" class="right-image">
    </div>

    <u><h1>Releve de notes</h1></u>
    <header>
        <h2 style="color: rgb(255, 149, 0)"><u>Faculté des Sciences et Techniques de Tanger</u></h2>
        <p><u><b>Etudiant:</b></u> {{ $user->nomEtu}} {{ $user->prenomEtu }}</p>
        <p><u><b>Né le:</b></u> {{ $user->dateNaissEtu }}</p>
        {{-- <p>Filière: {{ $etudiant->filiere }}</p>
        <p>Semestre: {{ $etudiant->semestre }}</p> --}}
        <p>Date de Délivrance: {{ now()->format('Y-m-d') }}</p>
    </header>
    <table border="1">
        
        <thead>
            <tr>
                <th>Matière/Module</th>
                <th>Coefficient</th>
                <th>Note</th>
                <th>Note Pondérée</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $resultat)
                <tr>
                    <td>{{ $resultat->intituleMat}}</td>
                    <td>{{ $resultat->coef }}</td>
                    <td>{{ $resultat->note }}</td>
                    <td>{{ $resultat->note*$resultat->coef }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">Moyenne</td>
                <td>{{ $moyenne }}</td>
            </tr>
            <tr>
                <td colspan="3">Résultat Final</td>
                <td>
                    @if ($moyenne >= 10)
                        validé
                    @else
                        Non validé
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
