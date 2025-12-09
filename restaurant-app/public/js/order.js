
function order(){
    const pickupBtn = document.querySelector('.btn-pickup');
    const deliveryBtn = document.querySelector('.btn-delivery');
    let orderType = 'PICKUP';

pickupBtn.addEventListener('click', () => {
    orderType = 'PICKUP';
});

deliveryBtn.addEventListener('click', () => {
    orderType = 'DELIVERY';
});

document.getElementById('place-order-btn').addEventListener('click', () => {
    if (!orderType) {
        alert('Please choose Pickup or Delivery');
        return;
    }

    const csrf = document.querySelector('meta[name="csrf-token"]').content;

    fetch('/order/place', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf
        },
        body: JSON.stringify({ order_type: orderType })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert('Order placed successfully!');
            window.location.href = '/menu';
        } else {
            alert(data.message);
        }
    });
});
}

order();