<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CustomerUploadDetails */

$this->title = 'Create Customer Details';
//$this->params['breadcrumbs'][] = ['label' => 'Customer Upload Details', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-upload-details-create">

    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Create</h3>
      </div>
      <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
      </div>
    </div>


</div>
