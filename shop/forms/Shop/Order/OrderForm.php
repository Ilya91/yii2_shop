<?php

namespace shop\forms\Shop\Order;

use shop\forms\CompositeForm;

/**
 * @property DeliveryForm $delivery
 * @property CustomerForm $customer
 */
class OrderForm extends CompositeForm
{
    public $note;

    public function __construct($weight, array $config = [])
    {
        $this->delivery = new DeliveryForm($weight);
        $this->customer = new CustomerForm();
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['note'], 'string'],
        ];
    }

    protected function internalForms()
    {
        return ['delivery', 'customer'];
    }
}