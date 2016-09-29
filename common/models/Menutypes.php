<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%menutypes}}".
 *
 * @property integer $id
 * @property string $type
 *
 * @property Mainmenu[] $mainmenus
 */
class Menutypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menutypes}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'string', 'max' => 50],
        ];
    }

    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainmenus()
    {
        return $this->hasMany(Mainmenu::className(), ['menutype_id' => 'id']);
    }
}
