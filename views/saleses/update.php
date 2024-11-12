<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Saleses $model */

$this->title = 'Update Saleses: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Saleses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="saleses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
