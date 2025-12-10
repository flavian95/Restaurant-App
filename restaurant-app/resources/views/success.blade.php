
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success - Sushi Sapporo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        setTimeout(() => {
            window.location.href = '/menu';
        }, 10000);
    </script>
</head>
<body>
<div class="container text-center py-5">
    <div class="card p-4 shadow-sm">
        <h2 class="text-success mb-3"><i class="fa-solid fa-check-circle"></i> Order Submitted Successfully!</h2>
        <p>Order #{{ $order->id }} has been received. You can check your <a href="{{ route('dashboard.show') }}">dashboard</a> for details.</p>

        <a href="/menu" class="btn btn-primary mt-4">Back to Menu</a>

        <p class="mt-3 text-muted">You will be redirected to the menu automatically in 10 seconds.</p>
    </div>
</div>
</body>
</html>