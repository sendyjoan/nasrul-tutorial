<?php

use yii\helpers\Html;
use app\models\Suppliers;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Saleses $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="saleses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

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
