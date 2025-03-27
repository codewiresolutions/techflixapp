<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domain Check Result</title>
</head>
<body>
    <h1>Domain Check Result</h1>

    <p>Domain: {{ $domain }}</p>
    <p>Status: 
        @if ($isAvailable)
            <span style="color: green;">Available</span>
        @else
            <span style="color: red;">Not Available</span>
        @endif
    </p>

    @if ($isAvailable)
        <h3>Pricing Information:</h3>
        <ul>
            @foreach ($pricing as $price)
                <li>{{ $price['duration'] }} year(s) - Price: ${{ $price['price'] }} {{ $price['currency'] }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
