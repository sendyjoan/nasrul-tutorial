<?php

use yii\bootstrap5\Html;
use app\models\Suppliers;
use app\models\Categories;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Products $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::merge(
            ['' => 'Silahkan pilih kategori'],
            ArrayHelper::map(Categories::find()->all(), 'id', 'name')
        )
    ) ?>
    
    <?= $form->field($model, 'supplier_id')->dropDownList(
        ArrayHelper::merge(
            ['' => 'Silahkan pilih supplier'],
            ArrayHelper::map(Suppliers::find()->all(), 'id', 'name')
        )
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
