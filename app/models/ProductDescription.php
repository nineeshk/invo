<?php

use Phalcon\Mvc\Model;

/**
 * ProductDescription
 */
class ProductDescription extends Model
{
	/**
	 * @var integer
	 */
	public $id;

	public $productid;
	
	/**
	 * @var string
	 */
	public $description;

	/**
	 * ProductDescription initializer
	 */
	public function initialize()
	{
		$this->setSource("productDescription");
		$this->hasOne('productid', 'Products', 'id');
	}
}