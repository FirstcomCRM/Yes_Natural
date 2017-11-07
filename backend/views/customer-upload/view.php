<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerUpload */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Customer Uploads', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-upload-view">

  <br>
  <div class="panel panel-default">
    <div class="panel-body">
      <p>
        <?php  echo Html::a('<i class="fa fa-arrow-left" aria-hidden="true"></i> Back', ['index'], ['class'=>'btn btn-default']) ?>
          <?= Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
          <?= Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', ['delete', 'id' => $model->id], [
              'class' => 'btn btn-danger',
              'data' => [
                  'confirm' => 'Are you sure you want to delete this item?',
                  'method' => 'post',
              ],
          ]) ?>
      </p>

      <?= DetailView::widget([
          'model' => $model,
          'attributes' => [
              'id',
              'date_uploaded',
              'remarks:ntext',
          ],
      ]) ?>
    </div>
  </div>




</div>
