<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Products;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\Transactions;
use app\models\TransactionsSearch;
use yii\web\NotFoundHttpException;
use app\models\TransactionCategories;

/**
 * TransactionsController implements the CRUD actions for Transactions model.
 */
class TransactionsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Transactions models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TransactionsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transactions model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Transactions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Transactions();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $file = UploadedFile::getInstance($model, 'berita_acara');
            $fileName = $file->baseName . '.' . $file->extension;
            $filePath = Yii::getAlias('@webroot') . '/uploads/' . $fileName;

            if($file->saveAs($filePath)){
                $model->berita_acara = $fileName;

                // Logic stock products
                $product = Products::findOne($model->product_id);
                $transaction = TransactionCategories::findOne($model->transaction_category_id);
                if($transaction->name == 'Transaksi Masuk'){
                    $product->stock += $model->quantity;
                } elseif ($transaction->name == 'Transaksi Keluar') {
                    $product->stock -= $model->quantity;
                } else {
                    $product->stock = $product->stock;
                }
                $product->save();

                $model->save();
            }
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Transactions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $file = UploadedFile::getInstance($model, 'berita_acara');
            if ($file) {
                $fileName = $file->baseName . '.' . $file->extension;
                $filePath = Yii::getAlias('@webroot') . '/uploads/' . $fileName;
                if ($file->saveAs($filePath)) {
                    $model->berita_acara = $fileName;
                }
            }

            // Logic stock products
            $product = Products::findOne($model->product_id);
            $transaction = TransactionCategories::findOne($model->transaction_category_id);
            if ($transaction->name == 'Transaksi Masuk') {
                $product->stock += $model->quantity;
            } elseif ($transaction->name == 'Transaksi Keluar') {
                $product->stock -= $model->quantity;
            } else {
                $product->stock = $product->stock;
            }
            $product->save();

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            // 'saleses' => Saleses::find('supplier_id', $model->sales->supplier_id)->all(),
        ]);
    }

    /**
     * Deletes an existing Transactions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Transactions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Transactions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transactions::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
