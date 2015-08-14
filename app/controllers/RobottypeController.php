<?php

class RobottypeController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Robot Type');
        parent::initialize();
    }

    public function indexAction()
    {
        $cacheSeconds = 20;
        $robottype = RobotType::findCached(array(
            "key" => "RobotType.Cached"
        ), $cacheSeconds);
        $this->view->robottype = $robottype;
    }
    
    public function deleteAction($id)
    {
        $id = $this->filter->sanitize($id, "int");
        $robotTypeIdx = $id;

        if ($robotTypeIdx == "") {
            $this->flash->error('Robot Type not found');
            return $this->forward("robottype/index");
        }
        
        $robotType = RobotType::findFirstByidx($robotTypeIdx);
        
        if (!$robotType) {
            $this->flash->error('Robot Type not found');
            return $this->forward("robottype/index");
        }
        
        if (!$robotType->delete()) {
            foreach ($robotType->getMessages() as $message) {
                $this->flash->error($message);
            }
        }

        $this->flash->success('Robot Type deleted');
        return $this->forward("robottype/index");
    }
}
