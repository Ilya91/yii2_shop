<?php

use shop\entities\Shop\Tag;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\assets\TagsAsset;
use backend\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\Shop\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

AppAsset::register($this);
TagsAsset::register($this);
$this->title = 'Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
	<?php Pjax::begin([
		'id' => 'regulatory_hours_grid_pjax'
	]); ?>
    <p>
		<?= Html::button('Create new tag', [
			'class' => 'btn btn-success create',
			'link' => '/shop/tag/create'
		]) ?>
    </p>
    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    [
                        'attribute' => 'name',
                        'value' => function (Tag $model) {
                            return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    'slug',
                    ['class' => ActionColumn::class],
                ],
            ]); ?>
        </div>
    </div>
	<?php Pjax::end(); ?>
</div>
<?php
    $model = new Tag();
?>
<?= $this->render('partial/_form', ['model' => $model]) ?>