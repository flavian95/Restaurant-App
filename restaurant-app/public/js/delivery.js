
function pickupOrDelivery() {
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
}

pickupOrDelivery();