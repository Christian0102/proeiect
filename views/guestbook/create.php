<?php
use yii\helpers\Html;
$this->title = 'Create';
$this->params['breadCrumbs'][]=['label'=>'Guestbook','url'=>['index']]
$this->params['breadCrumbs'][]=$this->title;


?>
<h1><?php echo Html::encode($this->title);?><h1>

<?php

echo $this->render('form1',['model'=>$model]);

?>
