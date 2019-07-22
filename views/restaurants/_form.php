<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use faryshta\widgets\JqueryTagsInput;
use yii\helpers\ArrayHelper;
use app\models\Provinces;

?>

<div class="restaurants-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <div class="row">
        <div class="col-sm-4 col-md-4">
            <?=
                $form->field($model, 'province')->dropdownList(
                    ArrayHelper::map(Provinces::find()->all(), 'id', 'name_en'),
                    [
                        'id' => 'ddl-province',
                        'prompt' => 'Select Province...',
                    ]
                );
            ?>
        </div>
        <div class="col-sm-4 col-md-4">
            <?=
                $form->field($model, 'amphure')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'ddl-amphur'],
                    'data' => $amphure,
                    'pluginOptions' => [
                        'depends' => ['ddl-province'],
                        'placeholder' => 'Select Amphure...',
                        'url' => Url::to(['province-dropdown/get-amphur']),
                    ],
                ]); ?>
        </div>
        <div class="col-sm-4 col-md-4">
            <?=
                $form->field($model, 'district')->widget(DepDrop::classname(), [
                    'data' => $district,
                    'pluginOptions' => [
                        'depends' => ['ddl-province', 'ddl-amphur'],
                        'placeholder' => 'Select District...',
                        'url' => Url::to(['province-dropdown/get-district']),
                    ],
                ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-6"><?= $form->field($model, 'lat')->textInput() ?></div>
        <div class="col-sm-6 col-md-6"><?= $form->field($model, 'lng')->textInput() ?></div>
    </div>

    <?= $form->field($model, 'keyword')->textInput()->widget(JqueryTagsInput::className()) ?>

    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Save' : '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>