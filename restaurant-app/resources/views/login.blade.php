
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sushi Sapporo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: #f8f9fa;
        }
        .auth-card {
            max-width: 420px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .btn-red {
            background-color:#dc3545; 
            color:white;
        }
        .btn-red:hover {
            background-color:black !important;
            color:white !important;
        }
        a:hover {
            color:black !important;
        }
    </style>
</head>

<body>

<div class="auth-card">

    <h2 class="text-center mb-4">Login</h2>

    @if ($errors->any())
        <div class="alert alert-danger text-center">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-red w-100 fw-bold rounded-pill mb-2">
            Login
            <i class="fa-solid fa-right-to-bracket"></i>
        </button>

        <div class="text-center">
            <a href="{{ route('register.perform') }}" class="text-decoration-none">
                Create an account
            </a>
        </div>

         <div class="text-center mt-3">
            <a href="{{ url('/menu') }}" class="text-decoration-none">Back to menu</a>
        </div>

    </form>
</div>

</body>
</html>