<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerUploadDetails */

$this->title = 'Update Customer Details: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Customer Upload Details', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-upload-details-update">


    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Update</h3>
      </div>
      <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
      </div>
    </div>



</div>
