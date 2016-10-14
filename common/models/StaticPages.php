<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%static_pages}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property integer $published
 * @property string $content
 * @property string $title_browser
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $created_at
 * @property string $updated_at
 */
class StaticPages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%static_pages}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'alias'], 'required'],
            [['published', 'mainmenu_id'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'alias', 'route', 'title_browser'], 'string', 'max' => 255],
            [['meta_keywords'], 'string', 'max' => 200],
            [['meta_description'], 'string', 'max' => 160],
            [['alias'], 'unique'],
        ];
    }

    public function getMainmenuItem()
    {
        return $this->hasOne(Mainmenu::className(), ['mainmenu_id' => 'id']);
    }
}
