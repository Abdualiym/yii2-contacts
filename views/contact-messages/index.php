<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel domain\modules\contact\forms\ContactMessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \domain\modules\contact\ContactModule::t('contact', 'Feedback');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-messages-index">

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'label' => \domain\modules\contact\ContactModule::t('contact', 'Регистрационный номер обращения'),
            ],
            'name',
            'phone',
            'email',
            'text:ntext',
            [
                'attribute' => 'created_at',
                'format' => 'datetime',
                'label' => \domain\modules\contact\ContactModule::t('contact', 'Дата'),
            ],
            [
                'attribute' => 'created_at',
                'format' => 'datetime',
                'label' => \domain\modules\contact\ContactModule::t('contact', 'Дата'),
            ],
//            'updated_at',
//            'status',
            [
                'attribute' => 'region_id',
                'value' => function ($model) {
                    return \domain\modules\contact\entities\Contact::getRegions($model->region_id);
                },
            ],
            [
                'attribute' => 'subject_id',
                'value' => function ($model) {
                    return \domain\modules\contact\entities\Contact::getSubjects($model->subject_id);
                },
            ],

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
