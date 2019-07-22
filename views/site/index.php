<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use yii\widgets\ActiveForm;

$this->title = 'Find Restaurants';

// Start at Bangsue
$coord = new LatLng(['lat' => 13.821069, 'lng' => 100.529578]);
$map = new Map([
    'center' => $coord,
    'zoom' => 15,
    'width' => '100%',
    'height' => '600',
]);

foreach ($dataProvider->models as $item) {
    $coord = new LatLng(['lat' => $item->lat, 'lng' => $item->lng]);
    $marker = new Marker(['position' => $coord]);
    $marker->attachInfoWindow(
        new InfoWindow([
            'content' => $item->name,
        ])
    );

    $map->addOverlay($marker);
}

?>

<div class="site-index">

    <div class="row">
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-map-marker"></i> Map</h3>
                </div>
                <div class="panel-body">
                    <?= $map->display(); ?>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-search"></i> Search</h3>
                </div>
                <div class="panel-body text-center">
                    <?php $form = ActiveForm::begin([
                        'action' => ['index'],
                        'method' => 'get',
                        'options' => ['data-pjax' => true]
                    ]); ?>
                    <?= Html::activeTextInput($searchModel, 'q', ['class' => 'form-control', 'placeholder' => 'keyword,ชื่อร้าน,ที่อยู่']) ?>
                    <br><?= Html::submitButton(Yii::t('app', '<i class="glyphicon glyphicon-search"></i> Search'), ['class' => 'btn btn-sm btn-primary']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="panel-footer text-center">
                    Search by keyword, Province, Amphure, District
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> Restaurants</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <?= ListView::widget([
                            'dataProvider' => $dataProvider,
                            'layout' => "{items}\n<div alclign='center'>{pager}</div>",
                            'itemView' => '_lists',
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>