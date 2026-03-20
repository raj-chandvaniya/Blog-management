<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <form method="POST" action="/login" class="w-25">
        @csrf

        <h3>Login</h3>

        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <input class="form-control mb-2" name="email" placeholder="Email">
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror

        <input type="password" class="form-control mb-2" name="password" placeholder="Password">
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror

        <button class="btn btn-primary w-100">Login</button>

        <a href="/register">Register</a>

    </form>

</body>
</html>