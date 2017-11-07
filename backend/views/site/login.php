<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-login">

    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
          <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Yes Natural</h3>
            </div>
            <div class="panel-body">
              <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

              <?= $form->field($model, 'password')->passwordInput() ?>

              <?php $form->field($model, 'rememberMe')->checkbox() ?>

              <div class="form-group">
                  <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
              </div>
            </div>
            <div class="panel-footer">
              <p class="text-center">@<?php echo date('Y') ?>Powered by <a href="https://www.firstcom.com.sg/">Firstcom Solutions Pte Ltd</a></p>
            </div>

          </div>

          <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>
