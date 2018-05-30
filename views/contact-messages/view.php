<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model abdualiym\contacts\entities\ContactMessages */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-6">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= \abdualiym\contacts\helpers\ContactHelper::statusLabel($model) ?> Обратная связь от "<?= $this->title ?>
                    "</h3>

                <div class="box-tools pull-right">
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title=""
                       data-original-title="Previous"><i class="fa fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Next"><i
                                class="fa fa-chevron-right"></i></a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="mailbox-read-info">
                    <h3>Тема: <?= \abdualiym\contacts\entities\Contact::getSubjects($model->subject_id) ?></h3>
                    <h5>От кого: <?= $model->email ?></h5>

                    <h5>Кому: <?= \abdualiym\contacts\entities\Contact::getRegions($model->region_id) ?>
                        <span class="mailbox-read-time pull-right"><?= Yii::$app->formatter->asDatetime($model->created_at) ?></span></h5>
                </div>
            </div>
            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
                <p> <?= $model->text ?></p>
            </div>
            <div class="mailbox-read-message">
                <p><?= Html::a('Fayl', Yii::getAlias('@staticUrl/app/feedback/' . $model->file), ['target' => '_blank']) ?></p>
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.box-body -->

    </div>

</div>

