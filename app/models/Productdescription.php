<?php

use Phalcon\Mvc\Model;

/**
 * ProductDescription
 */
class Productdescription extends Model
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
	 * Products initializer
	 */
	 
	#public function getSource() 
	#{
	#	return 'ProductDescription';
	#}
	 
	public function initialize()
	{
		$this->setSource("productDescription");
		$this->hasOne('productid', 'Products', 'id', array('reusable' => true));
	}
}