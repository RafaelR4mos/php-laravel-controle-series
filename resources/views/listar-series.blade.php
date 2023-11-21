<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series</title>
</head>
<body>
    <h1>Listagem de séries</h1>
    <hr>

    <ul>
        @foreach($series as $serie)
        <li> {{ $serie }}</li>
        @endforeach
    </ul>
</body>
</html>
