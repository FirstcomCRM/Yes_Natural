<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CustomerUploadDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Details';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-upload-details-index">


    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title ">Search</h3>
      </div>
      <div class="panel-body">
          <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
    </div>

    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">List</h3>
      </div>
      <div class="panel-body">
        <p class="text-right">
            <?= Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Create', ['create'], ['class' => 'btn btn-success']) ?>
          <?= Html::a('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF', ['download-pdf'], ['class' => 'btn btn-default', 'target'=>'_blank']) ?>
        </p>
        <div class="table-responsive">
          <?= GridView::widget([
              'dataProvider' => $dataProvider,
            //  'filterModel' => $searchModel,
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],

                  'member_code',
                  'customer_name',
                  'nric',
                  'mobile_no',
                  'email:email',
                  'address:ntext',

                  [
                    'attribute'=>'date_of_birth',
                    'format' => ['date', 'php:d M Y'],
                  ],
                //   'date_modified',
                [
                    'header'=>'Action',
                    'class'=>'yii\grid\ActionColumn',
                    'template'=>'{view}',
                ],
                //  ['class' => 'yii\grid\ActionColumn'],
              ],
          ]); ?>
        </div>

      </div>
    </div>

</div>
