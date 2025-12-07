
function menu() {
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            let id = button.dataset.id;
            let name = button.dataset.name;
            let price = button.dataset.price;
            let image = button.dataset.image;

            const csrf = document.querySelector('meta[name="csrf-token"]').content;

            console.log("Clicked:", id, name, price, image);

            // fetch("{{ route('cart.add') }}", {
            //     method: "POST",
            //     headers: {
            //         "Content-Type": "application/json",
            //         "X-CSRF-TOKEN": "{{ csrf_token() }}"
            //     },
            
               fetch('/cart/add', {
                   method: 'POST',
                   headers: {
                       'Content-Type': 'application/json',
                       'X-CSRF-TOKEN': csrf
                    },
                body: JSON.stringify({ id, name, price, image })
            })
            .then(res => res.json())
            .then(data => {
                console.log("Response:", data);
                if (data.success) {
                    document.getElementById('cart-count').innerText = data.cart_count;
                }
            })
            .catch(err => console.error(err));
        });
    });
}

menu();


// function menu() {
//     document.querySelectorAll('.add-to-cart').forEach(button => {
//         button.addEventListener('click', () => {
//             let id = button.dataset.id;
//             let name = button.dataset.name;
//             let price = button.dataset.price;
//             let image = button.dataset.image;

//             console.log("Clicked:", id, name, price, image);

//             fetch("{{ route('cart.add') }}", {
//                 method: "POST",
//                 headers: {
//                     "Content-Type": "application/json",
//                     "X-CSRF-TOKEN": "{{ csrf_token() }}"
//                 },
//                 body: JSON.stringify({ id, name, price, image })
//             })
//             .then(res => res.json())
//             .then(data => {
//                 console.log("Response:", data);
//                 if (data.success) {
//                     document.getElementById('cart-count').innerText = data.cart_count;
//                 }
//             })
//             .catch(err => console.error(err));
//         });
//     });
// }

// menu();