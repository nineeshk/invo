<?php

use Phalcon\Mvc\Model;

/**
 * Super
 */
class Outo extends Model
{
	/**
	 * @var integer
	 */
	protected $robotid; 	

	/**
	 * @var integer
	 */
	protected $superid;
	
	/**
	 * @var string
	 */
	protected $who;  
	
	public function getRobotid()
	{
		return $this->robotid;
	}
	
	public function setRobotid($robotid)
	{
		$this->robotid = $robotid;
	}

	public function getSuperid()
	{
		return $this->superid;
	}
	
	public function setSuperid($superid)
	{
		$this->superid = $superid;
	}
	
	public function getWho()
	{
		return $this->who;
	}
	
	public function setWho($who)
	{
		$this->who = $who;
	}
	
	
	/**
	 * Robots initializer
	 */
	public function initialize()
	{
		$this->hasOne("robotid", "Robots", "id");
	}	
}
