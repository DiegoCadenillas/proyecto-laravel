let searchBar = document.body.querySelector('#search-bar');
let categoryFilter = document.body.querySelector('#category-filter');
let productsGrid = document.body.querySelector('#productos-calientes');
let products = JSON.parse(document.body.querySelector('#products-array').value);
let productImagesRoute = document.body.querySelector('#product-images-route').value;
let storeLink = document.body.querySelector('#store-link').value;

searchBar.addEventListener('change', filterProducts);
categoryFilter.addEventListener('change', filterProducts);

function filterProducts() {
    let newHTML =
        `<div class="row">`;

    for (let product of products) {
        console.log(categoryFilter.value)
        if (categoryFilter.value == null || !categoryFilter.value || product.category == categoryFilter.value) {
            if (product.name.toLowerCase().includes(searchBar.value.toLowerCase())) {
                newHTML +=
                    `  <div class="col-lg-4 col-sm-6 mb-4">` +
                    `  <div class="productos-calientes-item">` +
                    `    <a class="productos-calientes-link" href="${storeLink + '/' + product.id}">` +
                    `      <div class="productos-calientes-hover">` +
                    `        <div class="productos-calientes-hover-content">` +
                    `            <img class="productos-calientes-img" src="${(product.images[0].imgURL) ? productImagesRoute + '/' + product.images[0].imgURL : ''}" alt="${product.name}">` +
                    `        </div>` +
                    `      </div>` +
                    `            <img class="productos-calientes-img" src="${(product.images[0].imgURL) ? productImagesRoute + '/' + product.images[0].imgURL : ''}" alt="${product.name}">` +
                    `    </a>` +
                    `    <div class="productos-calientes-caption">` +
                    `      <div class="productos-calientes-caption-heading">${product.name}</div>` +
                    `      <div class="productos-calientes-caption-subheading text-muted">&euro\;${product.price}</div>` +
                    `    </div>` +
                    `  </div>` +
                    `</div>`;
            }
        }
    }
    newHTML += `</div>`;
    productsGrid.innerHTML = newHTML;
}