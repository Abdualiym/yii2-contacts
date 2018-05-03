<?php

namespace abdualiym\contacts\helpers;

use abdualiym\contacts\entities\ContactMessages;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ContactHelper
{
    public static function statusList(): array
    {
        return [
            ContactMessages::PROCESSING => \Yii::t('app','Processing'),
            ContactMessages::COMPLETE => \Yii::t('app','Complete'),
        ];
    }

    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($model): string
    {
        switch ($model->status) {
            case ContactMessages::PROCESSING:
                $class = 'fa text-default fa-circle';
                $url = ['complete', 'id'=>$model->id];
                break;
            case ContactMessages::COMPLETE:
                $class = 'fa text-default fa-circle-o';
                $url = ['processing', 'id' =>$model->id];
                break;
            default:
                $class = 'label label-default';
        }

        return Html::a(Html::tag('i', '', [
            'class' => $class,
        ]),$url);
    }
    public static function statusBg($model): string
    {
        switch ($model->status) {
            case ContactMessages::PROCESSING:
                $class = 'active';
                break;
            case ContactMessages::COMPLETE:
                $class = 'Default';
                break;
            default:
                $class = 'Default';
        }

        return $class;
    }
}