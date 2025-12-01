
function hoursOfOperation() {
    const pickupBtn = document.querySelector('.btn-pickup');
    const deliveryBtn = document.querySelector('.btn-delivery');
    const hoursText = document.querySelector('.hours-of-operation');

    function activate(type) {
        if (type === 'pickup') {
            hoursText.innerText = "Hours of Operation (Takeout)";
        } else {
            hoursText.innerText = "Hours of Operation (Delivery)";
        }
    }

    pickupBtn.addEventListener('click', () => activate('pickup'));
    deliveryBtn.addEventListener('click', () => activate('delivery'));
}

hoursOfOperation();