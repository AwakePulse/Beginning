let cart = {
    'id' : 1,
};


document.onclick = event => {
    console.log(event.target.classList);
    if (event.target.classList.contains('product_link_id')) {
        plusFunction(event.target.dataset.id);
    }
}

// Увеличение кол-ва товара
const plusFunction = id => {
    cart['id']++;
    renderCart();
}

/// Прорисовка корзины с выводом в консоль
const renderCart = () => {
    console.log(cart);
}
//// Вывод корзины в консоль
renderCart();