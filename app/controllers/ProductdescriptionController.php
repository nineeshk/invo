<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

/**
 * ProductDescription
 *
 * Manage CRUD operations for product description
 */
class ProductdescriptionController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Product Description');
        parent::initialize();
    }
    
    public function indexAction()
    {
        $res = Productdescription::find();
        print_r($res);
    }
}