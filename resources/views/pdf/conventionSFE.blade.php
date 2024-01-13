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
    <div>
        <h1>Convention de Stage de Fin d'Études</h1>

        <p>Date : {{ date('d/m/Y') }}</p>

        <p>
            <strong>Entre l'entreprise X et l'étudiant Y :</strong>
        </p>

        <p>
            Il est convenu entre l'entreprise X, représentée par [Nom du représentant], et l'étudiant Y, que ce dernier effectuera son stage de fin d'études au sein de l'entreprise conformément aux termes suivants :
        </p>

        <ol>
            <li>Durée du stage : [Nombre de mois]</li>
            <li>Objectifs du stage : [Objectifs spécifiques]</li>
            <li>Responsabilités de l'entreprise :
                <ul>
                    <li>[Description des responsabilités]</li>
                </ul>
            </li>
            <li>Responsabilités de l'étudiant :
                <ul>
                    <li>[Description des responsabilités]</li>
                </ul>
            </li>
            <!-- Ajoutez d'autres points pertinents selon vos besoins -->
        </ol>

        <p>
            Les parties conviennent que ce stage est conforme aux exigences académiques de l'établissement d'enseignement de l'étudiant.
        </p>

        <p>
            [Autres détails et conditions spécifiques]
        </p>

        <p>
            Fait à [Ville], le {{ date('d/m/Y') }}
        </p>

        <p>
            Signature de l'entreprise : ________________________
        </p>

        <p>
            Signature de l'étudiant : ________________________
        </p>
    </div>
</body>
</html>
