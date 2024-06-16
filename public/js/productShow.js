let input = document.body.querySelector('#inputQuantity');
let inputError = document.body.querySelector('#inputError');
let cartSuccess= document.body.querySelector('#successfullyAdded');
let addToCartBtn = document.body.querySelector('addToCartBtn');

input.addEventListener("change", function(event) {
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

addToCartBtn.addEventListener("click", function(event) {
    // fetch()
})