<?php

namespace shop\entities\Shop;

use paulzi\nestedsets\NestedSetsBehavior;
use shop\entities\behaviors\MetaBehavior;
use shop\entities\Meta;
use shop\entities\Shop\queries\CategoryQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property Meta $meta
 *
 * @property Category $parent
 * @property Category[] $parents
 * @property Category[] $children
 * @property Category $prev
 * @property Category $next
 * @property string $headingTile
 * @property string $seoTitle
 * @property string $meta_json [json]
 * @mixin NestedSetsBehavior
 */
class Category extends ActiveRecord
{
    public $meta;

    public static function create($name, $slug, $title, $description, Meta $meta)
    {
        $category = new static();
        $category->name = $name;
        $category->slug = $slug;
        $category->title = $title;
        $category->description = $description;
        $category->meta = $meta;
        return $category;
    }

    public function edit($name, $slug, $title, $description, Meta $meta)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->title = $title;
        $this->description = $description;
        $this->meta = $meta;
    }

    public function getSeoTitle()
    {
        return $this->meta->title ?: $this->getHeadingTile();
    }

    public function getHeadingTile()
    {
        return $this->title ?: $this->name;
    }

    public static function tableName()
    {
        return '{{%shop_categories}}';
    }

    public function behaviors()
    {
        return [
            MetaBehavior::className(),
            NestedSetsBehavior::className(),
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find()
    {
        return new CategoryQuery(static::className());
    }
}