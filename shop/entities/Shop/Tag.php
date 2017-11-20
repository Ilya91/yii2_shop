<?php

namespace shop\entities\Shop;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property string $slug
 */
class Tag extends ActiveRecord
{
    /**
     * @param $name
     * @param $slug
     * @return static
     */
    public static function create($name, $slug)
    {
        $tag = new static();
        $tag->name = $name;
        $tag->slug = $slug;
        return $tag;
    }

    /**
     * @param $name
     * @param $slug
     */
    public function edit($name, $slug)
    {
        $this->name = $name;
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%shop_tags}}';
    }
}