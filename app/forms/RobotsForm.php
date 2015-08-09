<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\Between;

class RobotsForm extends Form
{
    /**
     * Initialize the robots form
     */
    public function initialize($entity = null, $options = array())
    {

        if (!isset($options['edit'])) {
            $element = new Text("id", array("readonly" => true));
            $this->add($element->setLabel("Id"));
        } else {
            $this->add(new Hidden("id"));
        }

        $name = new Text("name");
        $name->setLabel("Name");
        $name->setFilters(array('striptags', 'string'));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Name is required'
            ))
        ));
        $this->add($name);
        
        $type = new Text("type");
        $type->setLabel("Type");
        $type->setFilters(array('striptags', 'string'));
        $type->addValidators(array(
            new PresenceOf(array(
                'message' => 'Type is required'
            ))
        )); 
        $this->add($type);           
        
        $year = new Text("year");
        $year->setLabel("Year");
        $year->setFilters(array('int'));
        $year->addValidators(array(
	    new Between(array(
   		'minimum' => 1900,
		'maximum' => 2050,
   		'message' => 'The year must be between 1900 and 2050'
	    )),	
            new PresenceOf(array(
                'message' => 'Year is required'
            )),
            new Numericality(array(
                'message' => 'Year is required'
            ))
        ));
        $this->add($year);          
        
        $who = new Text("who");
        $who->setDefault($entity->Outo->who);
        $who->setLabel("Who");
        $who->setFilters(array('striptags', 'string'));
        $who->addValidators(array(
            new PresenceOf(array(
                'message' => 'Who is required'
            ))
        )); 
        $this->add($who);
        
    	$typeName = new Select("idx", 
			RobotType::find(), 
			array(
				'using' => array(
				'idx', 
				'typeName'
				),
				"useEmpty" => true
			)
		);
	$typeName->setLabel("Name Type");
	$typeName->addValidators(array(
		new Presenceof(array(
			'message' => 'Option required'
		))
	));

	$this->add($typeName);                
   }
}