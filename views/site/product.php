<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Product';
$this->params['breadcrumbs'][] = $this->title;

/**
 * Раздел подключения Js скриптов.
 */
$this->registerJsFile('/js/jquery.js');
// $this->registerJsFile('js/script.js');
// $this->registerJsFile('js/basket.js')
// $this->registerJsFile('js/localstorage.js');
$this->registerJsFile('/js/localstorage2.js');
?>

<style>
    .leftimg {
        float:left; /* Выравнивание по левому краю */
        margin: 15px 150px 15px 0; /* Отступы вокруг картинки */
    }
    .k {
        display: block;
        color: #2f2c2c;
        text-decoration: #917fec;
        text-align: center;
        border: 4px solid #5e5a5a;
        padding: 15px;
        margin: 15px 15px 15px 0;
        float: right;
        background: #fff;
    }
    .j {
        color: #9cfa00;
    }

</style>

<h1><i><?=Html::encode($product->product_name)?></i></h1>
<p><img src="<?=Html::encode($product->pic)?>" alt=<?=Html::encode($product->product_name)?> style="width:290px; height:290px" class="leftimg"></p>

<fieldset>
    <legend><b> Описание продукта </b></legend>
    <p><?=Html::encode($product->info)?></p>
</fieldset>


<button class="k"><a class="product_link_id" count = "1" data-id="<?php echo $product->ID?>">Купить</a></button>
<?=Html::encode($product->product_price)?> рублей.

<script type="text/javascript">
    let pli = document.querySelector('.product_link_id');
    
    pli.addEventListener('click', function() {
            pli.innerHTML = ('В корзине!');
    });
    if (JSON.parse(localStorage.getItem("products")) == <?php echo $product->ID?>) {
            pli.innerHTML = ('В корзине!')
        } else {
            pli.innerHTML = ('Купить')
        };
</script>