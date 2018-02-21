<?php

namespace domain\modules\contact\entities;

use domain\modules\contact\ContactModule;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "contact_messages".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property int $region_id
 * @property int $subject_id
 */
class ContactMessages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['status'], 'required'],
            [['status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => ContactModule::t('contact', 'ID'),
            'created_at' => ContactModule::t('contact', 'Created At'),
            'updated_at' => ContactModule::t('contact', 'Updated At'),
            'status' => ContactModule::t('contact', 'Статус'),
            'region_id' => ContactModule::t('contact', 'REGION'),
            'subject_id' => ContactModule::t('contact', 'ADDRESS SUBJECT'),
        ];
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::className(),
        ];
    }

}
