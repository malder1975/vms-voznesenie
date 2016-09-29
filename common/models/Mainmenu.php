<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%mainmenu}}".
 *
 * @property integer $id
 * @property integer $menutype_id
 * @property string $parent_id
 * @property string $name
 * @property integer $visible
 * @property string $description
 * @property string $keywords
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Menutypes $menutype
 */
class Mainmenu extends ActiveRecord
{

    public $data;
    public $tree;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mainmenu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menutype_id', 'parent_id', 'visible', 'created_at', 'updated_at'], 'integer'],
            [['name', 'created_at', 'updated_at'], 'required'],
            [['name', 'title', 'description', 'keywords'], 'string', 'max' => 255],
            [['menutype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menutypes::className(), 'targetAttribute' => ['menutype_id' => 'id']],
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenutype()
    {
        return $this->hasOne(Menutypes::className(), ['id' => 'menutype_id']);
    }

    private static function getLeftTopMenuItems()
{
	$items = array();
	$resultAll = MainMenu::find()->where(['visible' => 1, 'menutype_id' => 1])->indexBy('id')->all();

	foreach($resultAll as $result)
	{
		if(empty($items[$result->parent_id]))
		{
		$items[$result->parent_id] = array();
		}
		$items[$result->parent_id][] = $result->attributes;
	}
	return $items;
}

private static function getRightTopMenuItems()
{
	$items = array();
	$resultAll = MainMenu::find()->where(['visible' => 1, 'menutype_id' => 3])->indexBy('id')->all();

	foreach($resultAll as $result)
	{
		if(empty($items[$result->parent_id]))
		{
		$items[$result->parent_id] = array();
		}
		$items[$result->parent_id][] = $result->attributes;
	}
	return $items;
}

public static function viewLeftTopMenuItems($parentId=0)
{
	$arrItems = MainMenu::getLeftTopMenuItems();
	if(empty($arrItems[$parentId])) {return;}
	for($i = 0; $i<count($arrItems[$parentId]); $i++)
	{
		$result[] = [
			'label' => $arrItems[$parentId][$i]['name'],
			'url' => [$arrItems[$parentId][$i]['link']],
			'linkOptions'=> ['title'=>$arrItems[$parentId][$i]['title']],
			'items' => MainMenu::viewLeftTopMenuItems($arrItems[$parentId][$i]['id']),

		];
	}
	return $result;
}

public static function viewRightTopMenuItems($parentId=0)
{
	$arrItems = MainMenu::getRightTopMenuItems();
	if(empty($arrItems[$parentId])) {return;}
	for($i = 0; $i<count($arrItems[$parentId]); $i++)
	{
		$result[] = [
			'label' => $arrItems[$parentId][$i]['name'],
			'url' => [$arrItems[$parentId][$i]['link']],
			'linkOptions'=> ['title'=>$arrItems[$parentId][$i]['title']],
			'items' => MainMenu::viewRightTopMenuItems($arrItems[$parentId][$i]['id']),

		];
	}
	return $result;
}


private static function getMiddleMenuItems()
{
	$items = array();
	$resultAll = MainMenu::find()->where(['visible' => 1, 'menutype_id' => 2])->indexBy('id')->all();

	foreach($resultAll as $result)
	{
		if(empty($items[$result->parent_id]))
		{
		$items[$result->parent_id] = array();
		}
		$items[$result->parent_id][] = $result->attributes;
	}
	return $items;
}

public static function viewMiddleMenuItems($parentId=0)
{
	$arrItems = MainMenu::getMiddleMenuItems();
	if(empty($arrItems[$parentId])) {return;}
	for($i = 0; $i<count($arrItems[$parentId]); $i++)
	{
		$result[] = [
			'label' => $arrItems[$parentId][$i]['name'],
			'url' => [$arrItems[$parentId][$i]['link']],
			'linkOptions'=> ['title'=>$arrItems[$parentId][$i]['title']],
			'items' => MainMenu::viewMiddleMenuItems($arrItems[$parentId][$i]['id']),

		];
	}
	return $result;
}

    private static function getTopMenuData()
    {
        $items = [];
        $data = Mainmenu::find()->where(['visible' => 1, 'menutype_id' => 1])->indexBy('id')->all();

        foreach ($data as $item) {

            if(empty ($items[$item->parent_id]))
            {
                $items[$item->parent_id] = [];

            }
            else
            {
                $items[$item->parent_id][] = $item->attributes;
            }

        }

        return $items;
        //return $menuItems;
    }








}
