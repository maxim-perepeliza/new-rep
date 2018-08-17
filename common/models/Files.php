<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $date_create_utc
 * @property string $date_create
 * @property string $path_upload
 * @property string $description
 * @property string $caption
 * @property int $deleted
 *
 * @property AttachmentsObjects[] $attachmentsObjects
 * @property CarGallery[] $carGalleries
 * @property SpecialServices[] $specialServices
 * @property Users[] $users
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'date_create', 'path_upload', 'description', 'caption'], 'required'],
            [['date_create_utc', 'date_create'], 'safe'],
            [['description', 'caption'], 'string'],
            [['deleted'], 'integer'],
            [['name'], 'string', 'max' => 36],
            [['type'], 'string', 'max' => 15],
            [['path_upload'], 'string', 'max' => 50],
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
            'type' => 'Type',
            'date_create_utc' => 'Date Create Utc',
            'date_create' => 'Date Create',
            'path_upload' => 'Path Upload',
            'description' => 'Description',
            'caption' => 'Caption',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentsObjects()
    {
        return $this->hasMany(AttachmentsObjects::className(), ['file_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarGalleries()
    {
        return $this->hasMany(CarGallery::className(), ['file_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialServices()
    {
        return $this->hasMany(SpecialServices::className(), ['image_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['photo_id' => 'id']);
    }
}
