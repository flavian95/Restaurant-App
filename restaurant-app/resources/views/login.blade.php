
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sushi Sapporo</title>
</head>
<body>
    <h2>Login</h2>

@if ($errors->any())
    <div style="color:red;">{{ $errors->first() }}</div>
@endif

<form method="POST" action="/login">
    @csrf

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
    <a href="{{ route('register.perform') }}">Register</a>
</form>
</body>
</html>