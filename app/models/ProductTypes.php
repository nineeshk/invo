<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Relation;

/**
 * Types of Products
 */
class ProductTypes extends Model
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * ProductTypes initializer
     */
    public function initialize()
    {
        $this->setSource("product_types");
        $this->hasMany('id', 'Products', 'product_types_id', array('foreignKey' => array( 'action' => Relation::ACTION_CASCADE)));
    }
}
