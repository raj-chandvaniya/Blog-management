
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

    <form method="POST" action="/register" class="w-25">
        @csrf

        <h3>Register</h3>

        <input class="form-control mb-2" name="name" placeholder="Name">
        <input class="form-control mb-2" name="email" placeholder="Email">
        <input type="password" class="form-control mb-2" name="password" placeholder="Password">

        <button class="btn btn-success w-100">Register</button>

        <a href="/login">Login</a>

    </form>

</body>
</html>