<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Guestbook', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestbook-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ip',
            'browser',
            'name',
            'email:email',
            'homepage',
            'message:ntext',
            'image',
            'file',
        ],
    ]) ?>

</div>
