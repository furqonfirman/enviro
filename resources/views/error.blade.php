<!DOCTYPE html>
<html>
<head>
    <title>Your Laravel View</title>
</head>
<body>
        <div class="alert alert-danger">
            {{ session('access_token') }}
        </div>

    <p>error: {{ $errorMessage }}</p><br>

</body>
</html>