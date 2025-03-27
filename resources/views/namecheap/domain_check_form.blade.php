<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Domain Availability</title>
</head>
<body>

<h1>Check Domain Availability</h1>

<!-- Form to input the domain name -->
<form action="{{ route('namecheap.checkDomainAvailability') }}" method="POST">
    @csrf <!-- CSRF Token for security -->
    <label for="domain">Enter Domain Name (e.g., example.com):</label>
    <input type="text" id="domain" name="domain" required>
    <button type="submit">Check Availability</button>
</form>
<h1>Get Domain Info</h1>
<form action="{{ route('namecheap.getDomainInfo') }}" method="POST">
    @csrf
    <label for="domain">Enter Domain Name (e.g., domain1.com):</label>
    <input type="text" id="domain" name="domain" required>
    <button type="submit">Get Domain Info</button>
</form>

</body>
</html>
