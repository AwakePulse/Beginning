let count;
if (localStorage.getItem('products') && localStorage.getItem('products') != 0) {
    count = JSON.parse(localStorage.getItem('products'))
} else {
    count = []
}

this.keyName = 'products';

// Получаю ID'шник кнопки.
document.querySelector('.product_link_id').onclick = () => {
    getItemId(event.target.dataset.id);
}

// Убираю object Object из localStorage
localStorage.setItem(this.keyName, JSON.stringify(count));
id = JSON.parse(localStorage.getItem(this.keyName));

// Добавление товара в корзину
const getItemId = id => {
    count.push(id);
    
    let Duplic = [];
    count.forEach((element) => {
        if (!Duplic.includes(element)) {
            Duplic.push(element);
        }
    });
   
    localStorage.setItem(this.keyName, JSON.stringify(Duplic));
}




/* Жалкая попытка
let products = [];
this.keyName = 'products';

var newProduct = 0;

document.querySelector('.product_link_id').onclick = () => {
    getItemId(event.target.dataset.id);
}
    
const getItemId = id => {
    newProduct[id]++;
    let savee = localStorage.setItem(this.keyName, JSON.stringify(id));

    function Gtss () {
        tich = 1;
        products[products + _tich] = savee;
        tich++;
    };
}

ВОТ это топич. Работает всё :D

let products = [];

localStorage.setItem('products', JSON.stringify(products));
const data = JSON.parse(localStorage.getItem('products'))
*/










/* ФУНКЦИЯ ПРИБАВЛЕНИЯ ПО КЛИКУ!
let count = 0;

document.querySelector('.product_link_id').onclick = () => {
    count++;
    console.log(localStorage.setItem('product', count));
}

/* function clearCart() {
    if (event.target.classList.contains('btn-success')) {
        localStorage.clear(count);
        count = 0;
        document.textContent = count
    }
} */