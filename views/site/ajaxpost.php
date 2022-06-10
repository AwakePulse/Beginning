<?php
/*use yii\helpers\Html;

$data = [
    "id" => $_POST["iD"]
];

$id_num = "id";

$id_prod = \frontend\models\Products::find($id_num)
    ->select([
        'product_name',
        'product_price'
    ])
    ->one();
    return $this->render('id_prod', ['id_prod' => $id_prod]);