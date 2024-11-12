<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\jui\DatePicker;
use app\models\Products;
use app\models\Suppliers;
use yii\helpers\ArrayHelper;
use yii\bootstrap5\ActiveForm;
use app\models\TransactionCategories;

/** @var yii\web\View $this */
/** @var app\models\Transactions $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transactions-form">

    <?php $form = ActiveForm::begin(
        [
            'options' => ['enctype' => 'multipart/form-data']
        ]
    ); ?>

    <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'transaction_category_id')->dropDownList(
        ArrayHelper::merge(
            ['' => 'Silahkan Pilih Kategori Transaksi'],
            ArrayHelper::map(TransactionCategories::find()->all(), 'id', 'name')
        )
    ) ?>

    <?= $form->field($model, 'product_id')->dropDownList(
        ArrayHelper::merge(
            ['' => 'Silahkan Pilih Produk'],
            ArrayHelper::map(Products::find()->all(), 'id', 'name')
        )
    ) ?>

    <?= $form->field($model, 'supplier_id')->dropDownList(
        ArrayHelper::map(Suppliers::find()->all(), 'id', 'name'),
        ['prompt' => 'Silahkan Pilih Supplier', 'id' => 'mysupplierid']
    ) ?>

    <?= $form->field($model, 'sales_id')->dropDownList([], ['prompt' => 'Pilih Sales', 'id' => 'mysalesid']) ?>

    <?= $form->field($model, 'quantity')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'berita_acara')->fileInput() ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <script>
        $(document).ready(function() {
            $('#mysupplierid').on('change', function() {
                var supplierId = $(this).val();
                $.get('<?= Url::toRoute(['suppliers/get-sales']) ?>', { supplierId: supplierId }).done(function(response) {
                    var data = JSON.parse(response); // Pastikan respons diubah menjadi objek JSON
                    var salesDropdown = $('#mysalesid');
                    salesDropdown.empty();
                    salesDropdown.append('<option value="">Pilih Sales</option>');
                    $.each(data, function(key, value) {
                        salesDropdown.append('<option value="' + key + '">' + value + '</option>');
                    });
                })
            });
        });
    </script>

</div>
