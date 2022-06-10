<?php
use yii\helpers\Html;
$this->title = 'Basket';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('/js/localstorage.js');
$this->registerJsFile('/js/sendform.js');
$this->registerJsFile('/js/jsformsub.js');
?>
<style>
    .leftimg {
        float:left; /* Выравнивание по левому краю */
        margin: 15px 150px 15px 0; /* Отступы вокруг картинки */
    }
    #center { text-align: center; }
</style>

<div><h1>Ваша Корзина:</h1></div>
<h5><div class="div" id="divvv"></div></h5>

<!-- Проверка всего лок.хранилища на объекты в ней
<script>
    for(let i=0; i<localStorage.length; i++) {
        let key = localStorage.key(i);
        alert(`${key}: ${localStorage.getItem(key)}`);
    }
</script>
-->

<?=Html::encode($product_name)?>


<!--
<script>
    console.log(localStorage.length);
</script>
-->
<div class="fullcon">
    <a href=""><button class="btn btn-warning">Очистить всё</button></a>
    <button class="btn btn-success" data-toggle="modal" data-target="#feedbackFormModal">Купить <span id="sum"></span></button>
    <ul class="ulprice" id="ulprice"></div>
</div>

<script>
    document.querySelector('.btn-warning').onclick = () => {
    localStorage.clear();
    sessionStorage.clear();
    };
</script>

<!-- Модальное Окно -->
<div class="modal" id="feedbackFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Форма покупки</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <div>Вы приобретаете: </div>
          <div class="buying" id="buying_prod">
          </div>

      <form>
        <input type="email" id="email" name="email" placeholder="Ваш Email: " class="form-control"><br>
        <input type="text" id="name"  name="name" placeholder="Ваше ФИО: " class="form-control"><br>
        <input type="phone" id="phone"  name="phone-number" placeholder="Ваш телефон: " class="form-control"><br>
        <input type="message" id="message"  name="message" placeholder="Дополнительные пожелания: " class="form-control"><br>
        <button type="button" id="sendMail" class="btn btn-primary float-right">Купить</button>
      </form>
      <div id="errorMess"></div>
      <div id="center"><span id="centertwo" class="border border-secondary"></span></div>
    </div>
  </div>
</div>