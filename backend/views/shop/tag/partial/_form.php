<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

    $action = 'create';
    $class_container = 'reg_hours_create_form';
    $class_btn = 'success';
    $button = 'Save';

Modal::begin([
    'header' => 'Create New Tag',
    'id' => 'modal_regulatory_hours_form',
    'size' => Modal::SIZE_DEFAULT,
    'options' => [
        'tabindex' => false
    ]
]);

Pjax::begin([
    'timeout' => 7000,
    'enableReplaceState' => false,
    'enablePushState' => false,
    'id' => 'regulatory_hours_form_pjax'
]);

$form = ActiveForm::begin([
    'id' => 'regulatory_hours_form',
    'action' => [
        '/shop/tag/'.$action
    ],
    'method' => 'post',
    'enableClientValidation' => true,
    'options' => [
        'data-pjax' => 1
    ]
]); ?>
    <div class="container-fluid <?= $class_container ?>">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
	            <?= $form->field($model, 'name')->textInput() ?>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12">
                <?= $form->field($model, 'slug')->textInput() ?>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="modal-footer reg_hours_modal_footer">
                    <div id="modal_loading_form">

                    </div>
                    <div id="modal_buttons" class="width_200">
                        <?= Html::submitInput($button, [
                            'class' => 'btn btn-'.$class_btn
                        ]) ?>
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<?php Pjax::end(); ?>
<?php Modal::end(); ?>