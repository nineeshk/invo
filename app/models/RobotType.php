<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Relation;

/**
 * RobotType
 */
class RobotType extends Model
{
	/**
	 * @var string
	 */
	protected $typeName;

	/**
	 * @var integer
	 */
	protected $robotTypeIdx;
		
	public function getTypeName()
	{
		return $this->typeName;
	}
	
	public function setTypeName($typeName)
	{
		$this->typeName = $typeName;	
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
			'robot_type_idx' => 'robotTypeIdx',
			'name'		 => 'typeName'
		);
	}
	
	/**
	 * Robots initializer
	 */
	public function initialize()
	{
		$this->setSource("robot_type");
		$this->hasMany("robotTypeIdx", "robots", "robotTypeIdx");
	}
}