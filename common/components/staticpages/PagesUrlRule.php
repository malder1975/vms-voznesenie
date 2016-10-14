<?php


namespace common\components\staticpages;

use Yii;
use common\models\StaticPages;
use yii\caching\DbDependency;
use yii\web\CompositeUrlRule;
use yii\web\UrlRuleInterface;
use yii\base\InvalidConfigException;

/**
 * Description of PagesUrlRule
 *
 * @author VGRovnov
 */
class PagesUrlRule extends CompositeUrlRule {

    public $cacheComponent = 'cache';
    public $cacheID = 'PagesUrlRules';
    public $ruleConfig = ['class' => 'yii\web\UrlRule'];

    protected function createRules()
    {
        $cache = \Yii::$app->get($this->cacheComponent)->get($this->cacheID);
        if (!empty($cache))
        {
            return $cache;
        }

        $pages = StaticPages::find()->asArray()->all();

        $rules = [];
        foreach ($pages as $page) {
            $rule = [
                'pattern' => ltrim($page['alias'], '/'),
                'route' => ltrim($page['route'], '/'),
            ];

            $rule = \Yii::createObject(array_merge($this->ruleConfig, $rule));
            if (!$rule instanceof UrlRuleInterface) {
                throw new InvalidConfigException('Класс URL-Rule должен реализовать UrlRuleInterface.');
            }
            $rules[] = $rule;
        }

        $cd = new DbDependency();
        $cd->sql = 'SELECT MAX(id) FROM ' .StaticPages::tableName();

        Yii::$app->get($this->cacheComponent)->set($this->cacheID, $rules, 60,$cd);

        return $rules;
    }
    public function __wakeup()
    {
        $this->init();
    }
}
