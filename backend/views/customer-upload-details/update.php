<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerUploadDetails */

$this->title = 'Update Customer Upload Details: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Customer Upload Details', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-upload-details-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
