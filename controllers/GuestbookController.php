<?php
namespace app\controllers;


use Yii;
use app\models\Guestbook;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



class GuestbookController extends Controller
{
	
	public function behaviors()
	{
		return [
			'verbs'=>[
			'class'=>VerbFilter::className(),
			'actions'=>[
				'delete'=>['POST'],
			],
			],
		'access'=>[
		'class'=>\yii\filters\AccessControl::className(),
		'rulse'=>[
		[
		'allow'=>true,
		'roles'=>['@'],
		],
		],
		
		],
		
		];
				
		
		
	}
	
	public function actionIndex()
	{
		$data = new ActiveDataProvider([
		'query'=>Guestbook::find(),
		]);
		
		return $this->render('index',['data'=>$this->$data])
	}
	
	
	public function actionView($id)
	{
		
		return $this->render('view',['model'=>$this->findModel($id)])
	}
	
	
	public function actionCreate()
	{
	$model= new Guestbook();
	
	if($model->load(Yii::$app->request->post())&& $model->save())
		{
		return $this->redirect(['view','id'=>$model->id]);
		else
		{
			return $this->render('create',['model'=>$model],);
		}
		}
	
	}
	
	
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		return $this->redirect(['index']);
		
		
	}
	protectede function findModel($id)
	{
		if(($model = Guestbook::findOne($id)) !==null)
		{
			return $model;
					
		}
		
	else{
		
		throw new NotFoundHttpException('The request page doesn't exist.');
		
	}
		
		
	}
	
	
}







?>