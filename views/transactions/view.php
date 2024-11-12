<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Transactions $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transactions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            [
                'attribute' => 'transaction_category_id',
                'value' => $model->transactionCategory->name, // assuming 'transactionCategory' is the relation name and 'name' is the attribute to display
            ],
            [
                'attribute' => 'product_id',
                'value' => $model->product->name, // assuming 'product' is the relation name and 'name' is the attribute to display
            ],
            [
                'attribute' => 'supplier_id',
                'value' => $model->supplier->name, // assuming 'supplier' is the relation name and 'name' is the attribute to display
            ],
            [
                'attribute' => 'sales_id',
                'value' => $model->sales->name, // assuming 'sales' is the relation name and 'name' is the attribute to display
            ],
            'quantity',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => Html::img(Yii::$app->request->baseUrl . '/uploads/' . $model->berita_acara, ['alt' => 'My Image', 'width' => '200', 'height' => '200']),
            ],
            'note:ntext',
        ],
    ]) ?>

</div>
