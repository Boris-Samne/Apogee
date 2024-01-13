<!-- resources/views/pdf/afficher-pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher PDF</title>
</head>
<body>
    <div style="width: 100%; height: 100vh;">
        <iframe src="{{ $pdf->output() }}" frameborder="0" width="100%" height="100%"></iframe>
    </div>
</body>
</html>
