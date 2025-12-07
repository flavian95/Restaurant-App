
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Sushi Sapporo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        @if (!Auth::check())
        <a href="{{ route('login.perform') }}"
        style="background-color:#dc3545; color: white"
        onmouseover="this.style.backgroundColor='black', this.style.color='white'"
        onmouseout="this.style.backgroundColor='#dc3545'"
        class="btn mt-5 me-2">
        Login
        <i class="fa-solid fa-right-to-bracket"></i>
        </a>
        @endif
        <button class="btn btn-danger w-100 mt-4 fw-bold" id="place-order-btn">
           Place Order
        </button>


        <a href="/menu" class="btn btn-dark mt-5 ms-2">Back to Menu</a>
    </div>
</div>

<script>
    
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            let card = btn.closest('.cart-item');
            let id = card.dataset.id;

            const csrf = document.querySelector('meta[name="csrf-token"]').content;

            fetch('/cart/remove', {
                   method: 'POST',
                   headers: {
                       'Content-Type': 'application/json',
                       'X-CSRF-TOKEN': csrf
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

            const csrf = document.querySelector('meta[name="csrf-token"]').content;

            fetch('/cart/update', {
                   method: 'POST',
                   headers: {
                       'Content-Type': 'application/json',
                       'X-CSRF-TOKEN': csrf
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

})

const pickupBtn = document.querySelector('.btn-pickup');
    const deliveryBtn = document.querySelector('.btn-delivery');

    function activate(active, inactive) {
        active.classList.add('btn-dark');
        active.classList.remove('btn-outline-dark');

        inactive.classList.remove('btn-dark');
        inactive.classList.add('btn-outline-dark');
    }

pickupBtn.addEventListener('click', () => activate(pickupBtn, deliveryBtn));
deliveryBtn.addEventListener('click', () => activate(deliveryBtn, pickupBtn));

</script>
<script src="{{ asset('js/delivery.js') }}"></script>

</body>
</html>

