let input = document.body.querySelector('#inputQuantity');
let inputError = document.body.querySelector('#inputError');
let cartSuccess = document.body.querySelector('#successfullyAdded');
let addToCartBtn = document.body.querySelector('#addToCartBtn');

input.addEventListener("change", function (event) {
    if (input.value < 0 || 99 < input.value) {
        input.value = 0;
        if (!inputError.classList.contains('showError')) {
            inputError.classList.add('showError');
            inputError.innerHTML = 'Sólo se pueden pedir hasta 99 unidades, y más de 0.';
            setTimeout(() => {
                inputError.innerHTML = '';
                inputError.classList.remove('showError');
            }, 5000)
        }
    }
})

addToCartBtn.addEventListener("click", addToCartBtnClick);

function addToCartBtnClick() {
    let cookie = document.cookie.split(';').find((cookie) => cookie.indexOf('cartItems') >= 0);

    let cartItems = (cookie != null && cookie != undefined && cookie.indexOf('=') < cookie.length - 1) ? cookie.substring(cookie.indexOf('=') + 1) : '';

    document.cookie = 'cartItems=' + cartItems + ((cartItems.length != 0) ? ':' : '') + input.value + '_' + addToCartBtn.value + ';Max-Age=604800;path=/';

    addToCartBtn.removeEventListener("click", addToCartBtnClick);

    if (!cartSuccess.classList.contains('showError')) {
        cartSuccess.classList.add('showSuccess');
        cartSuccess.innerHTML = 'Producto añadido al carrito exitósamente.';
        setTimeout(() => {
            cartSuccess.innerHTML = '';
            cartSuccess.classList.remove('showSuccess');
            addToCartBtn.addEventListener("click", addToCartBtnClick);
        }, 3000)
    };
}