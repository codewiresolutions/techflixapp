<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domain Availability Check</title>
</head>
<body>

<h1>Domain Availability Check</h1>

<p>Domain: <strong>{{ $domain }}</strong></p>

@if($isAvailable)
    <p>The domain is available!</p>
@else
    <p>The domain is already taken.</p>
@endif

</body>
</html>
