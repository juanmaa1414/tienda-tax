function addCloseListeners() {
    (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
        const $notification = $delete.parentNode;

        $delete.addEventListener('click', () => {
          $notification.parentNode.removeChild($notification);
        });
    });
}

document.addEventListener('DOMContentLoaded', function (e) {
    
    document.querySelector('#addToCart').addEventListener("click", function (e) {
        let productId = document.querySelector('.product').getAttribute('data-product-id');
        
        let submitData = {
            email: sessionData.givenEmail,
            productId: productId
        };
        
        submitAddToCart(submitData);
        
        document.querySelector('#notificationArea').innerHTML += `
        <div class="notification is-success">
            <button class="delete"></button>
            Agregaste el producto a tu carrito.
        </div>`;
        addCloseListeners();
    });
    
});

async function submitAddToCart(data) {
    const response = await fetch(document.location.origin + '/api/purchases/addToCart', {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    });
}

