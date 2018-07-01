<?php
namespace app\models;

use Yii;
use yii\imagine\Image;
use Imagine\Image\Box;
use yii\db\ActiveRecord;
class Guestbook extends ActiveRecord
{
	public $fileImg;
	public $fileup;
	public $verCode;
	
	public static function tableName()
	{
		return 'guestbook';
			
		
	}
	
	public function rules()
	{
		return
		[
		[['name','email','message','verCode'],'required'],
		['name','match','pattern'=>'/^[a-z][0-9]+$'],
		[['message'],'string'],
		['email','email'],
		['homepage','url','defaultScheme'=>'http'],
		['verCode','captcha'],
		[['fileImg'],'file','extensions'=>['jpg','jpeg','png']],
		[['fileup'],'file','extensions'=>['txt'],'maxSize'=>1024*100],
		[['ip','browser','name','email','homepage','image','file'],'string','max'=>255],
		
		
		
		
		];
	
	}

		public function attributeLabels()
		{
			return[
			'id'=>'ID',
			'ip'=>'IP',
			'browser'=>'Browser',
			'name'=>'Name',
			'email'=>'Email',
			'homepage'=>'Homepage',
			'message'=>'Message',
			'image'=>'Image',
			'file'=>'File',
			'verCode'=>'Verification Code',
				
			
			
			
			];
			
		}
		
		
		public function uploadImage($path)
		{
			$dir = Yii::getAlias($path);
			$uid = md5(uniqid(rand(),true));
			$gen_path = $path .$uid;
			
			if(!is_dir($gen_path))
				mkdir($gen_path,777,true);
			$fileName = $this->fileImg->baseName.'.'.$this->fileImg->extension;
			$photo = Image::getImagine()->open($this->fileImg->tempName);
			$photo->thumbail(new Box(320,240)->save($get_path . '/' . $fileName));
			$this->image='/'.$dir.$uid.'/'.$fileName;
			
									
			
			
		}
		
		
		public function uploadFile($path)
		{
			$dir = Yii::getAlias($path);
			$uid = md5(uniqid(rand(),true));
			$gen_path = $path . $uid;
			if(!is_dir($gen_path))
				mkdir($gen_path,777,true);
			$fileName=$this->fileup->baseName . '.'. $this->fileFile->extension;
			$this->fileFile->saveAs($gen_path. '/'.$fileName);
			$this->file = '/'.$dir .$uid. '/'.$fileName;
			
		}
		
	
}



?>
