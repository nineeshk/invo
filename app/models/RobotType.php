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
#	protected $typeName;

	/**
	 * @var integer
	 */
#	protected $idx;
		
/*	public function getTypeName()
	{
		return $this->typeName;
	}
	
	public function setTypeName($typeName)
	{
		$this->typeName = $typeName;	
	}

	public function getIdx()
	{
		return $this->idx;
	}
	
	public function setIdx($idx)
	{
		return $this->idx = $idx;
	}
*/
	public $idx;
	public $typeName;
		
	public function columnMap()
	{
		return array(
			'idx' => 'idx',
			'name'		 => 'typeName'
		);
	}
	
	/**
	 * Robots initializer
	 */
	public function initialize()
	{
		$this->setSource("robot_type");
		$this->hasMany("idx", "robots", "robotTypeIdx", array('foreignKey' => array('action' => Relation::ACTION_CASCADE)));
		
		#$this->belongsTo("robotTypeIdx", "robots", "robotTypeIdx", array('foreignKey' => array('action' => Relation::ACTION_CASCADE)));
	}
}