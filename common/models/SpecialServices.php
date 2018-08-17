<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "special_services".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $image_id
 * @property string $date_create_utc
 * @property string $date_modified
 * @property int $deleted
 *
 * @property Files $image
 */
class SpecialServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'special_services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['image_id', 'deleted'], 'integer'],
            [['date_create_utc', 'date_modified'], 'safe'],
            [['name'], 'string', 'max' => 36],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Files::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'image_id' => 'Image ID',
            'date_create_utc' => 'Date Create Utc',
            'date_modified' => 'Date Modified',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Files::className(), ['id' => 'image_id']);
    }
}
