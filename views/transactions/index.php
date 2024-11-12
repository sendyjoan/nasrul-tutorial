<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Products;
use app\models\Suppliers;
use yii\grid\ActionColumn;
use app\models\Transactions;
use yii\helpers\ArrayHelper;
use app\models\TransactionCategories;

/** @var yii\web\View $this */
/** @var app\models\TransactionsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transactions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transactions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            [
                'attribute' => 'transaction_category_id',
                'value' => 'transactionCategory.name',
                'filter' => ArrayHelper::map(TransactionCategories::find()->all(), 'id', 'name'),
            ],
            [
                'attribute' => 'product_id',
                'value' => 'product.name', // Assuming 'product' relation exists and has 'name' attribute
                'filter' => ArrayHelper::map(Products::find()->all(), 'id', 'name'), // Assuming Product model exists
            ],
            [
                'attribute' => 'supplier_id',
                'value' => 'supplier.name', // Assuming 'supplier' relation exists and has 'name' attribute
                'filter' => ArrayHelper::map(Suppliers::find()->all(), 'id', 'name'), // Assuming Supplier model exists
            ],
            //'sales_id',
            //'quantity',
            //'berita_acara',
            //'note:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Transactions $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
