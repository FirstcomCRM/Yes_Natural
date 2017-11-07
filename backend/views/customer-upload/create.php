<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CustomerUpload */

$this->title = 'Create Customer Upload';
//$this->params['breadcrumbs'][] = ['label' => 'Customer Uploads', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-upload-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
