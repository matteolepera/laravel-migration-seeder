<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train©</title>
</head>

<body>
    <h1>Treni</h1>

    <ul>
        @foreach ($trains as $train)
            <li>
                {{ $train["company"] }}
                {{ $train["departure_station"] }}
                {{ $train["arrival_station"] }}
                {{ $train["train_code"] }}
            </li>
        @endforeach
    </ul>
</body>

</html>