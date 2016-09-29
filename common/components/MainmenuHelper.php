<?php


namespace common\components;

use common\models\Mainmenu;

/**
 * Description of MainmenuHelper
 *
 * @author VGRovnov
 */
class MainmenuHelper
{




    public function getTopMenuData()
    {

        $data = Mainmenu::find()->where(['visible' => 1, 'menutype_id' => 1])->indexBy('id')->asArray()->all();
        return $data;

        //debug($data);


//return $menuItems;
    }

    public static function viewTopMenuItems($parent_id=0)
    {
        $itemsArr = self::getTopMenuData();
        if (empty($itemsArr['parent_id']))
        {
            return;
        }
        for ($i = 0; $i < count($itemsArr['parent_id']); $i++)
        {
            $result[] = [
                'label' => $itemsArr[$parent_id][$i]['name'],
                'url' => $itemsArr[$parent_id][$i]['id'],
                'linkOptions' => $itemsArr[$parent_id][$i]['name'],
                'items' => self::viewTopMenuItems($itemsArr[$parent_id][$i]['id']),

            ];
        }
        //debug($result);
        return $result;
    }

    public function getMenuItemTree($dataset) {
        $tree = [];

        foreach ($dataset as $id => &$node)
        {
            if (!$node['parent_id'])
            {
                $tree['id'] = &$node;
            }
 else {
     $dataset[$node['parent_id']]['childs'][$id] = &$node;
 }
        }
        return $tree;
    }

    public function getTree() {
        $datatree = MainmenuHelper::getTopMenuData();
        $tree = MainmenuHelper::getMenuItemTree($datatree);
        //debug($data);
        debug($tree);
    }

    public function getNavItems() {
        $dataset = MainmenuHelper::getTopMenuData();
        $tree = MainmenuHelper::getMenuItemTree($dataset);
        $menuItems = [];
        foreach ($tree as $menuItem) {
            $menuItems[] = [
                'label' => $menuItem['name'],
                'url' => $menuItem['id'],

                'items' => '',

            ];
        }
        debug($menuItems);
    }


}
