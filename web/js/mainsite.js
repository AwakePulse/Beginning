let ren = 1
let div = document.querySelector('.conteiner');

$.post("/mainrendering",
{data: ren}, 
function(response){
    console.log(response);
    let reschill = response.rendering
    
    $.each(reschill, function(key, value) {
        let chapter_div = document.createElement('div')

        chapter_div.className = ("chapter");
        chapter_div.innerHTML = ('<a class = "chapter_class" href = http://frontend/product/' + value.ID + '><img src =' + value.pic + 
        ' style="width:70px; height40px" class ="imgchap">' + '</br><k>' + value.product_name + '</br>' + value.product_price + ' рублей.</k></a>');
        div.appendChild(chapter_div);
    });
});

let buttons = document.querySelectorAll('.btn-dark');

buttons.forEach(button => {
    button.addEventListener('click', function(){
        window.localStorage.setItem('category', button.getAttribute('data-catg'));
        window.location.href = 'http://frontend/category'; //Если нужно будет сделать именно с определением (/category/и категория, присвоить button.getAtt... к переменной и передавать её. Тогда в контроллере в catsetting сделать выбор по категориям!!!)
    });
});





/*let buttons = document.querySelectorAll('.btn-dark');
let div = document.querySelector('.conteiner');

buttons.forEach(button => {
    button.addEventListener('click', ()=>{
        
    });
});








/*let ruble = document.getElementById('do-50k-rub');
let station = document.getElementById('Pristavki');
let access = document.getElementById('accessories');
let oculus = document.getElementById('oculus');

let arrprod = [];

let div = document.querySelector('.conteiner');

if (ruble.addEventListener('input', ()=> {
    if (ruble.checked) {
        arrprod.push(event.target.dataset.catg);
        console.log(arrprod);
        $.post("/mainprod",  
        {data: arrprod}, 
        function (response) {
            console.log(response);
        })
    } else {
        arrprod.splice(event.target.dataset.catg)
    };
        
}));

if (station.addEventListener('input', ()=> {
    if (station.checked) {
        arrprod.push(event.target.dataset.catg);
        console.log(arrprod);
        $.post("/mainprod",  
        {data: arrprod}, 
        function (response) {
            console.log(response);
            let chill = response.catg_prod;
            console.log(chill)

            $.each(chill, function(key, value) {

                var prod_div = document.createElement('form')

                prod_div.className = ('prod_categories')
                prod_div.innerHTML = ('<img src = ' + value.pic + ' style="width:70px; height40px"' + ' <br> <a href = http://frontend/product/' + value.ID + '>' + value.product_name + '</a> <br>' + value.product_price + ' рублей')
                div.appendChild(prod_div);
            });
        })
    } else {
        arrprod.splice(event.target.dataset.catg)
        window.location.reload();
    };
        
}));

if (oculus.addEventListener('input', ()=> {
    if (oculus.checked) {
        arrprod.push(event.target.dataset.catg);
        console.log(arrprod);
        $.post("/mainprod",  
        {data: arrprod}, 
        function (response) {
            console.log(response);
            let chill = response.catg_prod;

            $.each(chill, function(key, value) {

                var prod_div = document.createElement('div')

                prod_div.className = ('prod_categories')
                prod_div.innerHTML = ('<img src = ' + value.pic + ' style="width:70px; height40px"' + ' <br> <a href = http://frontend/product/' + value.ID + '>' + value.product_name + '</a> <br>' + value.product_price + ' рублей')
                div.appendChild(prod_div);
            });
        })
    } else {
        arrprod.splice(event.target.dataset.catg)
        window.location.reload();
    };
        
}));*/