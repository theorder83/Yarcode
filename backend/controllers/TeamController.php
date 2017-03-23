<?php

namespace backend\controllers;

use backend\components\Controller;
use backend\controllers\actions\MoveAction;
use backend\controllers\actions\ToggleVisibleAction;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use yii\imagine\Image;

use Yii;
use common\models\Team;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TeamController implements the CRUD actions for Team model.
 */
class TeamController extends Controller
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

    public function actions()
    {
        return [
            'move' => [
                'class' => MoveAction::className(),
                'model_class' => Team::className(),
            ],
            'toggle-visible' => [
                'class' => ToggleVisibleAction::className(),
                'model_class' => Team::className(),
            ],
        ];
    }


    /**
     * Lists all Team models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Team::find()->orderBy("position"),
            'sort' => false,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Team model.
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
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Team();

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'file');

            if ($file && $file->tempName) {
                $model->file = $file;
                if ($model->validate(['file'])) {

                    $dir = Yii::getAlias('@uploads/images/');
                    Yii::$app->controller->createDirectory($dir);

                    $fileName = Yii::$app->security->generateRandomString() . '.' . $model->file->extension;
                    $model->file->saveAs($dir . $fileName);
                    $model->file = $fileName;
                    $model->image = $fileName;

                    $size = new Box(250, 250);
                    $mode = ImageInterface::THUMBNAIL_OUTBOUND;

                    $photo = Image::getImagine()->open($dir . $fileName);
                    $photo->thumbnail($size, $mode)->save($dir . $fileName, ['quality' => 100]);
                }
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'file');

            if ($file && $file->tempName) {
                $model->file = $file;
                if ($model->validate(['file'])) {

                    $dir = Yii::getAlias('@uploads/images/');
                    Yii::$app->controller->createDirectory($dir);

                    if ($model->image != null && file_exists(Yii::getAlias($dir . $model->image))) {
                        unlink(Yii::getAlias(Yii::getAlias($dir . $model->image)));
                        $model->image = '';
                    }

                    $fileName = Yii::$app->security->generateRandomString() . '.' . $model->file->extension;
                    if ($model->file->saveAs($dir . $fileName)) {
                        $model->file = $fileName;
                        $model->image = $fileName;

                        $size = new Box(250, 250);
                        $mode = ImageInterface::THUMBNAIL_OUTBOUND;

                        $photo = Image::getImagine()->open($dir . $fileName);
                        $photo->thumbnail($size, $mode)->save($dir . $fileName, ['quality' => 100]);
                    }
                }
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Team model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Team model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Team the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Team::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
