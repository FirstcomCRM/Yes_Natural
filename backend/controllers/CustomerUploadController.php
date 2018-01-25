<?php

namespace backend\controllers;

use Yii;
use common\models\CustomerUpload;
use common\models\CustomerUploadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
/**
 * CustomerUploadController implements the CRUD actions for CustomerUpload model.
 */
class CustomerUploadController extends Controller
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
     * Lists all CustomerUpload models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerUploadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CustomerUpload model.
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
     * Creates a new CustomerUpload model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CustomerUpload();

        if ($model->load(Yii::$app->request->post())  ) {

            //$model->save()
            $model->file = UploadedFile::getInstance($model,'file');
            $model->validate();
            if (!empty($model->file)) {
              $filename= $model->upload();
              $model->save(false);
              $model->importExcel($filename);
            }
            Yii::$app->session->setFlash('success',"File sucessfully uploaded");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CustomerUpload model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {

            $model->save(false);
            Yii::$app->session->setFlash('success',"File sucessfully updated");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CustomerUpload model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDownload(){
        $filename = 'sample_customer.xlsx';
        $path = Yii::getAlias('@webroot');
        $path1 = Yii::getAlias('@template');
        $new_path = $path.'/'.$path1.'/'.$filename;
        Yii::$app->response->sendFile($new_path);
    }

    /**
     * Finds the CustomerUpload model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CustomerUpload the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CustomerUpload::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
