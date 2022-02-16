<?php

namespace app\controllers;

use app\models\Contact;
//use app\model\Upload;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Product;
use GuzzleHttp\Psr7\UploadedFile;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
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
        ];
    }

    /**
     * {@inheritdoc}
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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
 
    public function actionList(){ 
        $rows= Product ::find()->all();
        return $this->render('list',['rows'=>$rows]);
    }
    public function actionData_list(){

        return $this->render('data_list');
    }
    public function actionInfo()
    {
        $products = Product::find();
        if ($sort = Yii::$app->request->get('sort')){
            if (isset($sort['columnName'])){
                $products->orderBy([$sort['columnName']=>$sort['direction']==='asc' ? SORT_ASC : SORT_DESC]);
            }
        }
        if ($pagination = Yii::$app->request->get('pagination')) {
            $products->offset($pagination['page'] * $pagination['limit'])
                ->limit($pagination['limit']);
        }

        if ($search = Yii::$app->request->get('search')) {
            $products->andWhere(["OR",
                ['like', 'email', $search],
                ['like', 'name_first', $search],
                ]);
        }
        return $this->asJson([
            'list' => $products->asArray()->all()
        ]);
    }

    public function actionEdit(){
        return $this->render('edit');
    }
    public function actionUpdate($id)
    {
        $model = Product::findOne($id);
        if ($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect(['view','id'=>$id]);
        }
        return $this->render('edit',['model'=>$model]);
    
    }
    public function actionAdd(){
        $model = new Product();
        if ($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect(['view','id'=>$model->id]);
        }
        return $this->render('edit',['model'=>$model]);
    }
    public function actionDelete($id){
        $model = Product::findOne($id);
        if ($model) $model->delete();
        return $this->redirect(['products2','id'=>$id]);
    }
    public function actionView($id){
        $model = Product::findOne($id);
        return $this->render('view',['model'=>$model]);
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
