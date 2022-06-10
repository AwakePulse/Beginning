let catg = localStorage.getItem('category');
let div = document.querySelector('.conteiner')
let catgName = document.querySelector('.catg_name')

if (catg == 'Pristavki'){
    catgName.append("Приставки")
} else if (catg == 'accessories') {
    catgName.append("Аксессуары")
} else if (catg == 'oculus') {
    catgName.append("Очки")
} else {
    catgName.append("Товары до 50 тысяч!")
};


$.post('/categorysetting',
{data: catg},
function (response){
    console.log(response);
    let catgchill = response.category
    console.log(catgchill);

    if (catgchill.length == 0) {
        div.innerHTML = '<h1>Пока пусто! :(</h1>'
    }

    $.each(catgchill, function(key, value) {
        let chapter_div = document.createElement('div')

        chapter_div.className = ("chapter");
        chapter_div.innerHTML = ('<a class = "chapter_class" href = http://frontend/product/' + value.ID + '><img src =' + value.pic + 
        ' style="width:70px; height40px" class ="imgchap">' + '</br><k>' + value.product_name + '</br>' + value.product_price + ' рублей.</k></a>');
        div.appendChild(chapter_div);
    });
});

let mainbut = document.getElementById('main');

mainbut.addEventListener('click', function(){
    window.location.href = 'http://frontend/main';
});