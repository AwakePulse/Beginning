<?php
use yii\helpers\Html;
$this->title = "Hello";
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('js/jquery');

?>

<center><h1>Hello, user</h1></center>
<p><center>This page be a test for our new development!
    If you visited this page accidentally, please, click on button up and return on home page!</center></p>
<p><center>If you want become part of our company, please,
    <a href="http://yii2/frontend/web/index.php?r=site%2Fabout"><button class="btn btn-success">visit this page!</button>
    </a></center></p>
    <p><center>Thanks you!</center></p>
    <p>Don't click on down button!</p>
    <button><a class="prikol" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDCmX-YFyPRr2rPZH5DQASvuAlkVhS4iTkWO3R6SDDrps47VM67Ej6rmPvoWk5HmDVka4&usqp=CAU">Don't!</a></button>

<p><h2>Our developments: </h2></p>
<div class="outik"></div>

<script>
    var arr = [1,2,3,4,5,6,7,8,9,10];
    console.log(arr);

    var div = document.getElementById('.outik');

    for(let i = 0; i<=arr.length; i++) {
        let key = arr[i];
        console.log(key);
        //div.document.insertAdjacentHTML('beforebegin', 'key');
        div.push(key);
    }
</script>

<!--
</?php
// Парсировать $userp и после этого вызвать его через print_r
foreach ($userp as $user) {
    print_r($user) . '<br>';
    }

