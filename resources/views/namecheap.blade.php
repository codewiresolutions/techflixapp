<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available TLDs</title>
</head>
<body>

<h1>Available TLDs</h1>

<!-- If there are TLDs, display them in a list -->
@if(count($tlds) > 0)
    <ul>
        @foreach($tlds as $tld)
            <li>{{ $tld }}</li>
        @endforeach
    </ul>
@else
    <p>No TLDs found.</p>
@endif

</body>
</html>
