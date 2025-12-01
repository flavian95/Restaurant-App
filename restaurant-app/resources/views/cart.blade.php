
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Sushi Sapporo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .delivery-div{
        max-width: 756px;
    }
</style>
<body>

<div class="container py-4">
    <h2>Your Cart</h2>

    <div id="cart-items">

        @if(empty($cart))
            <p>Your cart is empty.</p>
        @else
            @foreach ($cart as $id => $item)
                <div class="card p-3 mb-3 cart-item" data-id="{{ $id }}">

                    <img src="{{ $item['image'] }}" class="me-3"
                     style="width:80px; height:80px; object-fit:cover; border-radius:8px;">

                    <h5 class="mb-1">{{ $item['name'] }}</h5>
                    <p class="mb-2">${{ $item['price'] }}</p>
                    
                    <div class="d-flex align-items-center">
                        <button class="btn btn-sm btn-outline-secondary qty-btn" data-change="-1">−</button>
                        <span class="mx-3 quantity">{{ $item['quantity'] }}</span>
                        <button class="btn btn-sm btn-outline-secondary qty-btn" data-change="1">+</button>

                        <button class="btn btn-danger btn-sm ms-3 remove-btn">Remove</button>
                    </div>
                </div>
            @endforeach

            <div class="mt-4 p-3 bg-light border rounded">
              <h4>Total: ${{ number_format($total, 2) }}</h4>
            </div>

        @endif

        <div class="d-flex mt-4 delivery-div">
        <button class="btn btn-dark w-50 me-2 d-flex justify-content-center align-items-center btn-pickup">
          <i class="fa-solid fa-bag-shopping me-2"></i> Pickup
        </button>
        <button class="btn btn-outline-dark w-50 d-flex justify-content-center align-items-center btn-delivery">
          <i class="fa-solid fa-motorcycle me-2"></i> Delivery
        </button>
      </div>

        <a href="/menu" class="btn btn-dark mt-3">Back to Menu</a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            let card = btn.closest('.cart-item');
            let id = card.dataset.id;

            fetch("{{ route('cart.remove') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ id })
            })
            .then(res => res.json())
            .then(data => {
                card.remove();
                updateBadge(data.cart_count);
                location.reload();
            });
        });
    });

    document.querySelectorAll('.qty-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            let card = btn.closest('.cart-item');
            let id = card.dataset.id;
            let change = parseInt(btn.dataset.change);

            fetch("{{ route('cart.update') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ id, change })
            })
            .then(res => res.json())
            .then(data => {

                if (!data.cart[id]) {
                    card.remove();
                } else {
                    card.querySelector('.quantity').innerText = data.cart[id].quantity;
                }

                updateBadge(data.cart_count);
                location.reload();
            });
        });
    });

    function updateBadge(count) {
        const badge = document.getElementById('cart-count');
        if (badge) badge.innerText = count;
    }

});
</script>
<script src="{{ asset('js/delivery.js') }}"></script>

</body>
</html>

