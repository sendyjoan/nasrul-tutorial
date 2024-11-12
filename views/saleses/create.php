<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Saleses $model */

$this->title = 'Create Saleses';
$this->params['breadcrumbs'][] = ['label' => 'Saleses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saleses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
