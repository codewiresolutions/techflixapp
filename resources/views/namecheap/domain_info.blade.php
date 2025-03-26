<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domain Information</title>
</head>
<body>

<h1>Domain Information for: {{ $domain }}</h1>

<ul>
    <li><strong>Domain Name:</strong> {{ $domainInfo->DomainName }}</li>
    <li><strong>Registrar:</strong> {{ $domainInfo->Registrar }}</li>
    <li><strong>Status:</strong> {{ $domainInfo->Status }}</li>
    <li><strong>Creation Date:</strong> {{ $domainInfo->CreationDate }}</li>
    <li><strong>Expiration Date:</strong> {{ $domainInfo->ExpirationDate }}</li>
    <!-- Add more fields as necessary -->
</ul>

<br>
<a href="{{ route('namecheap.showDomainCheckForm') }}">Check Another Domain</a>

</body>
</html>
