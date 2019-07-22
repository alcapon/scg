<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\Provinces;

$this->title = 'Restaurants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurants-index">

    <div class="panel panel-default">
        <div class="panel-heading with-border text-right">
            <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create Restaurants', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="panel-body">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout' => "{items}\n<div alclign='center'>{pager}</div>",
                'export' => false,
                'responsive' => true,
                'hover' => true,
                'formatter' => [
                    'class' => 'yii\i18n\Formatter',
                    'nullDisplay' => '-',
                ],
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],

                    'name',
                    'districtName.name_en',
                    'amphureName.name_en',
                    [
                        'attribute' => 'province',
                        'value' => 'provinceName.name_en',
                        'filter' => ArrayHelper::map(Provinces::find()->all(), 'id', 'name_en'),
                    ],

                    ['class' => 'kartik\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>

</div>