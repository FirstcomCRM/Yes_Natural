<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerUploadDetails */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Customer Upload Details', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-upload-details-view">

    <div class="panel panel-default">
      <div class="panel-body">
        <p>
           <?php  echo Html::a('<i class="fa fa-arrow-left" aria-hidden="true"></i> Back', ['index'], ['class'=>'btn btn-default']) ?>
           <?php Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
           <?php Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', ['delete', 'id' => $model->id], [
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
                //'id',
                'member_code',
                'customer_name',
                'nric',
                'mobile_no',
                'email:email',
                'address:ntext',
                'address1:ntext',
                'address2:ntext',
                'sex',
                'country',
                'zipcode',

                [
                  'attribute'=>'card_expiry_date',
                  'format' => ['date', 'php:d M Y'],
                ],

                [
                  'attribute'=>'date_of_birth',
                  'format' => ['date', 'php:d M Y'],
                ],
                'details:ntext',

                [
                  'attribute'=>'date_created',
                  'format' => ['date', 'php:d M Y'],
                ],
                [
                  'attribute'=>'date_modified',
                  'format' => ['date', 'php:d M Y'],
                ],
                'isupdate',
            ],
        ]) ?>
      </div>
    </div>



</div>
