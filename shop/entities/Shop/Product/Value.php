<?php

namespace shop\entities\Shop\Product;

use shop\entities\Shop\Characteristic;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $characteristic_id
 * @property string $value
 *
 * @property Characteristic $characteristic
 */
class Value extends ActiveRecord
{
    public static function create($characteristicId, $value)
    {
        $object = new static();
        $object->characteristic_id = $characteristicId;
        $object->value = $value;
        return $object;
    }

    public static function blank($characteristicId)
    {
        $object = new static();
        $object->characteristic_id = $characteristicId;
        return $object;
    }

    public function change($value)
    {
        $this->value = $value;
    }

    public function isForCharacteristic($id)
    {
        return $this->characteristic_id == $id;
    }

    public function getCharacteristic()
    {
        return $this->hasOne(Characteristic::className(), ['id' => 'characteristic_id']);
    }

    public static function tableName()
    {
        return '{{%shop_values}}';
    }
}