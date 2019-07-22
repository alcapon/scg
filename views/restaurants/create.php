<?php

use yii\helpers\Html;

$this->title = 'Create Restaurants';
$this->params['breadcrumbs'][] = ['label' => 'Restaurants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurants-create">

    <div class="panel panel-primary">
        <div class="panel-heading"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> <b>Add new Restaurants</b></div>
        <div class="panel-body">
            <?=
                $this->render('_form', [
                    'model' => $model,
                    'amphure' => [],
                    'district' => [],
                ])
            ?>
        </div>

    </div>