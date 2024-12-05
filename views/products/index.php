<?php

use app\models\ProductsModel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'salon_id',
            'name',
            'price',
            'description:ntext',
            //'image',
            //'status',
            //'stock',
            //'created_at',
            //'updated_at',
            //'discount',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductsModel $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
