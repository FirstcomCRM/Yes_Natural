<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerUploadDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-upload-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-panel">
      <?= $form->field($model, 'ic_no')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'phone_no')->textInput() ?>

      <?= $form->field($model, 'email_id')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

      <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-pencil" aria-hidden="true"></i> Create' : '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update',
          ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
