<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\CustomerUploadDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-upload-details-form">

    <?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-1',
          //  'offset' => 'col-sm-offset-3',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
]);
 ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nric')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>

    <?php echo $form->field($model, 'date_of_birth')->widget(DatePicker::classname(), [

      'convertFormat'=>true,
      'readonly' => true,
      'pluginOptions' => [
        'autoclose'=>true,
      //  'format' => 'mm/dd/yyyy'
        'format' => 'php:Y-m-d',
      ]
    ]); ?>

    <?= $form->field($model, 'details')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'date_created')->textInput(['readOnly'=>true]) ?>

    <div class="form-group col-md-3">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Create' : 'Update',
        ['class' => $model->isNewRecord ? 'btn btn-info' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
