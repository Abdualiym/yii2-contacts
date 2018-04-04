<?php

namespace abdualiym\contacts\entities;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class Contact extends Model
{
    public static function getPreferredAnswers($id = null)
    {
        $array = [
            1 => Yii::t('contact', 'By email'),
            2 => Yii::t('contact', 'By phone')
        ];
        return $id ? ArrayHelper::getValue($array, $id, 1) : $array;
    }

    public static function getSubjects($id = null)
    {
        $array = [
            1 => Yii::t('contact', 'Internet / Interactive TV for home and office'),
            2 => Yii::t('contact', 'Telephone connection for home and office')
        ];
        return $id ? ArrayHelper::getValue($array, $id, 1) : $array;
    }

    public static function getRegions($id = null)
    {
        $array = [
            18 => Yii::t('contact', 'City of Tashkent'),
            1 => Yii::t('contact', 'Karakalpakstan Republic'),
            2 => Yii::t('contact', 'Andijan region'),
            3 => Yii::t('contact', 'Bukhara region'),
            4 => Yii::t('contact', 'Djizak region'),
            5 => Yii::t('contact', 'Djizak'),
            6 => Yii::t('contact', 'Kashkadarya region'),
            7 => Yii::t('contact', 'Karshi'),
            8 => Yii::t('contact', 'Navoi region'),
            9 => Yii::t('contact', 'Namangan region'),
            10 => Yii::t('contact', 'Samarkand region'),
            11 => Yii::t('contact', 'Samarkand'),
            12 => Yii::t('contact', 'Surkhandarya region'),
            13 => Yii::t('contact', 'Termez'),
            14 => Yii::t('contact', 'Syrdarya region'),
            15 => Yii::t('contact', 'Tashkent region'),
            16 => Yii::t('contact', 'Ferghana region'),
            17 => Yii::t('contact', 'Khorezm region'),
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

        $module = \Yii::$app->controller->module;

//        VarDumper::dump($module, 20, true);
//
//        echo "<hr>";
//
//        VarDumper::dump(\Yii::$app->controller->module, 20, true);die;

        if ($module->developmentEmail || !isset($array[$regionId][$subjectId])) {
            return $module->developmentEmail;
        } else {
            return $array[$regionId][$subjectId];
        }
    }

}