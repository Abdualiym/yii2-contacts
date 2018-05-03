<?php

use yii\grid\GridView;
use yii\widgets\Pjax;
use abdualiym\contacts\helpers\ContactHelper;
use abdualiym\contacts\entities\Contact;

Yii::$app->formatter->locale = 'ru';

/* @var $this yii\web\View */
/* @var $searchModel abdualiym\contacts\forms\ContactMessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('contact', 'Feedback');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h4><?= $this->title ?></h4>
    </div>
    <div class="box-body no-padding">


        <div class="table-responsive mailbox-messages">

            <?php Pjax::begin(); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout'=>"<div class=\"mailbox-controls\">{summary}{pager}</div>{items}",
                'tableOptions' => [
                    'class' => 'table'
                ],
                'rowOptions'=>function ($model, $key, $index, $grid){
                    $class = ContactHelper::statusBg($model);
                    return [
                        'key'=>$key,
                        'index'=>$index,
                        'class'=>$class
                    ];
                },
                'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'status',
                        'value' => function ($model) {
                            return ContactHelper::statusLabel($model);
                        },
                        'format' => 'raw',
                        'filter' => ContactHelper::statusList(),
                        'contentOptions' => function ($model, $key, $index, $column) {
                            return ['class' => 'mailbox-star'];
                        },
                    ],
                    [
                        'attribute' => 'region_id',
                        'value' => function ($model) {
                            return Contact::getRegions($model->region_id);
                        },
                        'filter' => Contact::getRegions(),
                        'contentOptions' => function ($model, $key, $index, $column) {
                            return ['class' => 'mailbox-subject'];
                        },

                    ],


//            [
//                'attribute' => 'id',
//                'label' => Yii::t('contact', 'Регистрационный номер обращения'),
//            ],

                    [
                        'attribute' => 'name',
                        'content' => function ($model) {
                            return \yii\helpers\Html::a($model->name,['view', 'id' => $model->id]);
                        },
                    ],
                    [
                        'attribute' => 'text',
                        'content' => function ($model) {
                            return \yii\helpers\StringHelper::truncate($model->text, 120);
                        },
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => 'datetime',
                        'label' => Yii::t('contact', 'Дата'),
                        'filter' => false
                    ],
//            [
//                'attribute' => 'subject_id',
//                'value' => function ($model) {
//                    return Contact::getSubjects($model->subject_id);
//                },
//                'filter' => Contact::getSubjects()
//            ],


//            ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
