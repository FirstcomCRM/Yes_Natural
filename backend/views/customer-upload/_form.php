<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\CustomerUpload */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-upload-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-panel">
      <?php $form->field($model, 'date_uploaded')->textInput() ?>

      <?= $form->field($model, 'date_uploaded')->widget(DatePicker::classname(), [
                    //  'options' => ['placeholder' => Yii::t('app', 'Starting Date')],
                    //  'attribute2'=>'to_date',

                      //'type' => DatePicker::TYPE_INPUT,
                      'type'=>3,
                      'pluginOptions' => [
                          'autoclose' => true,
                          'startView'=>'year',
                          'minViewMode'=>'months',
                          //'format' => 'mm-yyyy-dd'
                          'format' => 'yyyy-mm-dd',
                      ]
                  ]) ?>

      <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

      <?= $form->field($model, 'file')->fileInput(['accept'=>'.xlsx, .xls']) ?>

      <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-upload" aria-hidden="true"></i> Upload' : '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update',
          ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
