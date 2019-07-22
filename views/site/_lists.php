<?php

use yii\helpers\Html;

?>

<?= Html::a('<i class="glyphicon glyphicon-star"></i> ' . $model->name, ['restaurants/view', 'id' => $model->id], ['id' => 'btn-click', 'class' => 'list-group-item']) ?>