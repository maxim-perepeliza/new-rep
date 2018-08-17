<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string $name
 * @property string $date_create_utc
 * @property int $deleted
 *
 * @property Locations[] $locations
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date_create_utc'], 'safe'],
            [['deleted'], 'integer'],
            [['name'], 'string', 'max' => 36],
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
            'date_create_utc' => 'Date Create Utc',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Locations::className(), ['country_id' => 'id']);
    }
}
