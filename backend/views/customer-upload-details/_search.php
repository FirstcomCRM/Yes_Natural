<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerUploadDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-upload-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'ic_no') ?>

    <?= $form->field($model, 'phone_no') ?>

    <?= $form->field($model, 'email_id') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'customer_upload_id') ?>

    <?php // echo $form->field($model, 'date_uploaded') ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i> Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('<i class="fa fa-undo" aria-hidden="true"></i> Reset',['index'],['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
