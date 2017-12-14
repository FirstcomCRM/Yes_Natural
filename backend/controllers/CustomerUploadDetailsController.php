<?php

namespace backend\controllers;

use Yii;
use mPDF;
use common\models\CustomerUploadDetails;
use common\models\CustomerUploadDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * CustomerUploadDetailsController implements the CRUD actions for CustomerUploadDetails model.
 */
class CustomerUploadDetailsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CustomerUploadDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerUploadDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        $session['details'] = Yii::$app->request->queryParams;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CustomerUploadDetails model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CustomerUploadDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CustomerUploadDetails();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success',"Success");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CustomerUploadDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
              $model->isupdate = 1;
            $model->save(false);
            Yii::$app->session->setFlash('success',"Update Success");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CustomerUploadDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDownloadPdf(){

      ini_set('max_execution_time', 180);
      ini_set("memory_limit", "512M");

      $searchModel = new CustomerUploadDetailsSearch();
      $dataProvider = $searchModel->search(Yii::$app->session->get('details'));

      $mpdf = new mPDF('utf-8','A4-L');
      $mpdf->content = $this->renderPartial('download-pdf',[
        // 'model'=>$model,
         //'searchModel'=>$searchModel,
         'dataProvider'=>$dataProvider
       ]);

      $mpdf->simpleTables =  true;
    //  $mpdf->useSubstitutions=false;
    //  $mpdf->packTableData = true;
      $mpdf->setFooter('{PAGENO}');
      $mpdf->WriteHTML($mpdf->content);
      $mpdf->Output('Test Report'.'.pdf','I');
      exit();
    }

    /**
     * Finds the CustomerUploadDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CustomerUploadDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CustomerUploadDetails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
