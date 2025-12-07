
function cart(){
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
};

cart();