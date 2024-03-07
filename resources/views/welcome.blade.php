<!DOCTYPE html>
<html>
<head>
    <title>Your Laravel View</title>
</head>
<body>
<div class="alert alert-danger">
            {{ session('access_token') }}
        </div>
    <p>Body Respons: {{ $body }}</p>
</body>
</html>