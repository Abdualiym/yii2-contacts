<?php

namespace domain\modules\contact\entities;

use domain\modules\contact\ContactModule;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class Contact extends Model
{
    public static function getPreferredAnswers($id = null)
    {
        $array = [
            1 => ContactModule::t('contact', 'By email'),
            2 => ContactModule::t('contact', 'By phone')
        ];
        return $id ? ArrayHelper::getValue($array, $id, 1) : $array;
    }

    public static function getSubjects($id = null)
    {
        $array = [
            1 => ContactModule::t('contact', 'Internet / Interactive TV for home and office'),
            2 => ContactModule::t('contact', 'Telephone connection for home and office')
        ];
        return $id ? ArrayHelper::getValue($array, $id, 1) : $array;
    }

    public static function getRegions($id = null)
    {
        $array = [
            1 => ContactModule::t('contact', 'Karakalpakstan Republic'),
            2 => ContactModule::t('contact', 'Andijan region'),
            3 => ContactModule::t('contact', 'Bukhara region'),
            4 => ContactModule::t('contact', 'Djizak region'),
            5 => ContactModule::t('contact', 'Djizak'),
            6 => ContactModule::t('contact', 'Kashkadarya region'),
            7 => ContactModule::t('contact', 'Karshi'),
            8 => ContactModule::t('contact', 'Navoi region'),
            9 => ContactModule::t('contact', 'Namangan region'),
            10 => ContactModule::t('contact', 'Samarkand region'),
            11 => ContactModule::t('contact', 'Samarkand'),
            12 => ContactModule::t('contact', 'Surkhandarya region'),
            13 => ContactModule::t('contact', 'Termez'),
            14 => ContactModule::t('contact', 'Syrdarya region'),
            15 => ContactModule::t('contact', 'Tashkent region'),
            16 => ContactModule::t('contact', 'Ferghana region'),
            17 => ContactModule::t('contact', 'Khorezm region'),
            18 => ContactModule::t('contact', 'City of Tashkent'),
        ];
        return $id ? ArrayHelper::getValue($array, $id, 1) : $array;
    }

    public static function getEmailBy($regionId = 1, $subjectId = 1)
    {
        $array = [
            1 => [
                1 => '1084kktel@uztelecom.uz',
                2 => '1086kktel@uztelecom.uz',
            ],
            2 => [
                1 => '1084andtel@uztelecom.uz',
                2 => '1086andtel@uztelecom.uz',
            ],
            3 => [
                1 => '1084buhtel@uztelecom.uz',
                2 => '1086buhtel@uztelecom.uz',
            ],
            4 => [
                1 => '1084jiztel@uztelecom.uz',
                2 => '1086jiztel@uztelecom.uz',
            ],
            5 => [
                1 => '1084uzijiz@uztelecom.uz',
                2 => '1086uzijiz@uztelecom.uz',
            ],
            6 => [
                1 => '1084qashtel@uztelecom.uz',
                2 => '1086qashtel@uztelecom.uz',
            ],
            7 => [
                1 => '1084uziqash@uztelecom.uz',
                2 => '1086uziqash@uztelecom.uz',
            ],
            8 => [
                1 => '1084navtel@uztelecom.uz',
                2 => '1086navtel@uztelecom.uz',
            ],
            9 => [
                1 => '1084namtel@uztelecom.uz',
                2 => '1086namtel@uztelecom.uz',
            ],
            10 => [
                1 => '1084samtel@uztelecom.uz',
                2 => '1086samtel@uztelecom.uz',
            ],
            11 => [
                1 => '1084uzisam@uztelecom.uz',
                2 => '1086uzisam@uztelecom.uz',
            ],
            12 => [
                1 => '1084surtel@uztelecom.uz',
                2 => '1086surtel@uztelecom.uz',
            ],
            13 => [
                1 => '1084uziter@uztelecom.uz',
                2 => '1086uziter@uztelecom.uz',
            ],
            14 => [
                1 => '1084sirtel@uztelecom.uz',
                2 => '1086sirtel@uztelecom.uz',
            ],
            15 => [
                1 => '1084tashtel@uztelecom.uz',
                2 => '1086tashtel@uztelecom.uz',
            ],
            16 => [
                1 => '1084fertel@uztelecom.uz',
                2 => '1086fertel@uztelecom.uz',
            ],
            17 => [
                1 => '1084xortel@uztelecom.uz',
                2 => '1086xortel@uztelecom.uz',
            ],
            18 => [
                1 => '1084tshtt@uztelecom.uz',
                2 => '1086tshtt@uztelecom.uz',
            ],
        ];

        if (\Yii::$app->controller->module->development) {
            return \Yii::$app->controller->module->developmentEmail;
        } elseif (isset($array[$regionId][$subjectId])) {
            return $array[$regionId][$subjectId];
        } else {
            return $array[1][1];
        }
    }

}