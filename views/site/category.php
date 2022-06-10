<?php
use yii\helpers\Html;
$this->title = 'category';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('/js/category.js')

?>
<html>
    <body>
        <form>
            <div class="search-line">
                <input type="text" id="search-line-id" placeholder="Поиск..." class="search-line-class" title="Поиск по сайту">
                <button type="submit" id="search-submit" class="search-submit">
                    <img src="https://cdn-icons-png.flaticon.com/512/751/751463.png" alt="lupa" 
                    style="width:25px; height:25px"></button>
            </div>
        </form>
        <aside>
            <ul class="site-bar">
                <div>Категории</div>
                <button type="button" class="btn btn-dark" id="main">На главную</button>
            </ul>
        </aside>
        <main class="content">
            <h4><div class="catg_name"></div></h4>
            <div class="conteiner">

            </div>
        </main>
    </body>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
</html>