<?php

namespace abdualiym\contacts\entities;

use abdualiym\contacts\ContactModule;
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
    const PROCESSING = 1;
    const COMPLETE = 0;

    // Status

    public function complete()
    {
        if ($this->isComplete()) {
            throw new \DomainException('message is complete.');
        }
        $this->status = self::COMPLETE;
    }

    public function processing()
    {
        if ($this->isProcessing()) {
            throw new \DomainException('message is processing.');
        }
        $this->status = self::PROCESSING;
    }

    public function isComplete(): bool
    {
        return $this->status == self::COMPLETE;
    }

    public function isProcessing(): bool
    {
        return $this->status == self::PROCESSING;
    }

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
            'id' => Yii::t('contact', 'ID'),
            'created_at' => Yii::t('contact', 'Created At'),
            'updated_at' => Yii::t('contact', 'Updated At'),
            'status' => Yii::t('contact', 'Статус'),
            'region_id' => Yii::t('contact', 'REGION'),
            'subject_id' => Yii::t('contact', 'ADDRESS SUBJECT'),
        ];
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
    }

}
