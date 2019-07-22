<?php

use yii\widgets\DetailView;

use dosamigos\google\maps\Map;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Restaurants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$coord = new LatLng(['lat' => $model->lat, 'lng' => $model->lng]);
$map = new Map([
    'center' => $coord,
    'zoom' => 14,
    'width' => '100%',
    'height' => '600',
]);

$marker = new Marker(['position' => $coord]);
$marker->attachInfoWindow(
    new InfoWindow([
        'content' => $model->name,
    ])
);
$map->addOverlay($marker);

$map->setName('gmap');
$marker->setName('gmarker');
$map->appendScript("google.maps.event.addListenerOnce(gmap, 'idle', function(){
        google.maps.event.trigger(gmarker, 'click');
    });");

?>
<div class="restaurants-view">

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
                    <h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> Restaurant Deatil</h3>
                </div>
                <div class="panel-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'name',
                            'districtName.name_en',
                            'amphureName.name_en',
                            'provinceName.name_en',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>