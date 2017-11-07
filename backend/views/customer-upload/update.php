<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerUpload */

$this->title = 'Update Customer Upload: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Customer Uploads', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-upload-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
