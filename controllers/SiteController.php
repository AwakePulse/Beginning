<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\User;
use frontend\models\Products;
use yii\web\UploadedForm;
use frontend\models\UploadForm;

/**
 * Site controller
 */
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTest(){
        $users = User::find()
            ->select([
                'username'
            ])
            ->asArray()
            ->one();
        return print_r($users, true);
    }
/*
    public function actionHello()
    {
        $userp = User::find()
            ->select([
                'username'
            ])
            ->asArray()
            ->all();
        return $this->render('Hello', [
            'userp' => $userp
        ]);
    }
*/
    public function actionHello()
    {
        return $this->render('Hello');
    }
    public function actionPas()
    {

    }

    public function actionProduct($id)
    {
        $product = Products::find()
            ->select([
                'ID',
                'product_name',
                'product_price',
                'info',
                'pic',
            ])
            ->where([
                'ID' => $id
            ])
            ->one();
        return $this->render('product', [
            'product' => $product
        ]);
    }

    public function actionBasket()
    {
        return $this->render('Basket');
    }

/*    public function actionBasket()
    {
        $id_prod = Products::find()
            ->select([
                'product_name',
                'product_price',
            ])
            ->one();
        return $this->render('Basket', ['id_prod' => $id_prod]);
    }
*/

    public function actionAnswer()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $data = Yii::$app->request->post();
        $data = $data['data'];

        $id_prod = Products::find()
        ->select([
            'product_name',
            'product_price',
            'ID',
            'pic',
        ])
        ->where([
            'ID' => $data
        ])
        ->all();
//        var_dump($id_prod);
//        return;
        return [
            'id_prod' => $id_prod
        ];
    }

    public function actionMain()
    {
        //\Yii::$app->response->format = \yii\web\Response::FORMAT;

        $all_prod = Products::find()
        ->select([
            'product_name',
            'product_price',
            'pic',
        ])
        //->asArray()
        ->all();
        return $this->render('mainsite', [
            'all_prod' => $all_prod
        ]);
    }

    public function actionMainrendering()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $data = Yii::$app->request->post();
        $data = $data['data'];

        $rendering = Products::find()
        ->select([
            'ID',
            'product_name',
            'product_price',
            'pic',
        ])
        ->where([
            'availability' => $data
        ])
        ->all();
        //var_dump($rendering);
        //return;
        return [
            'rendering' => $rendering
        ];
    }

    public function actionCategory()
    {
        return $this->render('category');
    }

    public function actionCategorysetting()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $data = Yii::$app->request->post();
        $data = $data['data'];

        $category = Products::find()
        ->select([
            'ID',
            'product_name',
            'product_price',
            'pic',
        ])
        ->where([
            'categories' => $data
        ])
        ->all();
        return [
            'category' => $category
        ];
    }

    /* Для закоменченных категорий в mainsite.js (через if которые) 
    public function actionMainprod()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $data = Yii::$app->request->post();
        $data = $data['data'];


        $catg_prod = Products::find()
        ->select([
            'ID',
            'product_name',
            'product_price',
            'pic',
        ])
        ->where([
            'categories' => $data
        ])
        ->all();
        return [
            'catg_prod' => $catg_prod
        ];
    }
    */

    /**
     * Logs in a user.
     *
     * @return mixed
     */
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
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
