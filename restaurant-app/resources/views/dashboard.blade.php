
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sushi Sapporo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    
    <div class="container mt-5">
    <h2>My Dashboard</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('dashboard.update') }}">
        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $profile->name) }}" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $profile->phone) }}" required>
        </div>

        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $profile->address) }}" required>
        </div>

        <div class="mb-3">
            <label>Current Password</label>
            <input type="password" name="current_password" class="form-control" placeholder="Enter current password">
        </div>

        <div class="mb-3">
            <label>New Password</label>
            <input type="password" name="new_password" class="form-control" placeholder="Enter new password">
        </div>

        <div class="mb-3">
            <label>Confirm New Password</label>
            <input type="password" name="new_password_confirmation" class="form-control" placeholder="Confirm new password">
        </div>

        <div class="text-center mt-3 mb-3 d-flex">
            <a href="{{ url('/menu') }}" class="text-decoration-none">Back to menu</a>
        </div>

        <button type="submit" class="btn btn-primary mb-3">Update Profile</button>

    </form>

<h3 class="mt-5">My Orders</h3>

@if($orders->isEmpty())
    <p>You have no orders yet.</p>
@else
    @foreach($orders as $order)
        <div class="card mb-3">
          <div class="card-header">
            Order #{{ $loop->iteration }} — 
            Type: {{ $order->order_type }} — 
            Created at: {{ \Carbon\Carbon::parse($order->created_at)->timezone('Europe/Bucharest')->format('g:i A') }}
          </div>

          <ul class="list-group list-group-flush">
                @foreach($order->items as $item)
                    <li class="list-group-item">
                        {{ $item->name }} — Quantity: {{ $item->pivot->quantity }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endif

</div>

</body>
</html>