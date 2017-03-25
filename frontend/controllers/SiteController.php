<?php
namespace frontend\controllers;

use common\models\About;
use common\models\Clients;
use common\models\Project;
use common\models\Service;

use common\models\Team;
use frontend\models\ContactForm;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use frontend\models\SignupForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $services = Service::find()->orderBy('position')->onCondition(['visible' => 1])->all();
        $clients = Clients::find()->orderBy('position')->onCondition(['visible' => 1])->all();
        $team = Team::find()->orderBy('position')->onCondition(['visible' => 1])->all();
        $about = About::find()->orderBy('position')->onCondition(['visible' => 1])->all();
        $projects = Project::find()->orderBy('position')->onCondition(['visible' => 1])->all();


        return $this->render('index', [
            'services' => $services,
            'clients' => $clients,
            'team' => $team,
            'about' => $about,
            'projects' => $projects,
        ]);
    }


    public function actionMail()
    {
        $model = new ContactForm();

        if ($model->load(\Yii::$app->request->post(), '') && $model->contact()) {

        } else {
            throw new BadRequestHttpException();
        }
    }

}
