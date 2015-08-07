<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Relation;

/**
 * Robots
 */
class Robots extends Model
{
	/**
	 * @var integer
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @var integer
	 */
	protected $year;
	
	/**
	 * @var integer
	 */
	protected $robotTypeIdx;
		
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = $id;	
	}

	public function getName()
	{
		return $this->name;
	}
	
	public function setName($name)
	{
		$this->name = $name;
	}
	
	public function getType()
	{
		return $this->type;
	}
	
	public function setType($type)
	{
		$this->type = $type;
	}
	
	public function getYear()
	{
		return $this->year;
	}
	
	public function setYear($year)
	{
		$this->year = $year;
	}
	
	public function getRobotTypeIdx()
	{
		return $this->robotTypeIdx;
	}
	
	public function setRobotTypeIdx($robotTypeIdx)
	{
		return $this->robotTypeIdx = $robotTypeIdx;
	}
	
	public function columnMap()
	{
		return array(
			'id'		 => 'id',
			'name'		 => 'name',
			'type'		 => 'type',
			'year'		 => 'year',
			'robot_type_idx' => 'robotTypeIdx'
		);
	}
	
	/**
	 * Robots initializer
	 */
	public function initialize()
	{
		#$this->belongsTo('product_types_id', 'ProductTypes', 'id', array(
		#	'reusable' => true
		#));
		$this->hasOne("id", "Outo", "robotid", array('foreignKey' => array('action' => Relation::ACTION_CASCADE)));
		$this->belongsTo("robotTypeIdx", "RobotType", "robotTypeIdx");
		#$this->hasOne("id", "Outo", "robotid");
	}
}