<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CustomerUploadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Uploads';
//$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="customer-upload-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">List</h3>
        </div>
        <div class="panel-body">
          <p>
              <?= Html::a('<i class="fa fa-upload" aria-hidden="true"></i> Import File', ['create'], ['class' => 'btn btn-success']) ?>
          </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
              //  'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                  //  'id',
                    'date_uploaded',
                    'remarks:ntext',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
      </div>





</div>
