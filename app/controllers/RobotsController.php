<?php

class RobotsController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Robots');
        parent::initialize();
    }

    public function indexAction()
    {
        #calling a custom caching findmethod
        $cacheSeconds = 60;
        $robots = Robots::findCached(
        array(
            "conditions" => "type = ?1",
            "order" => "name ASC",
            "limit" => 100,
            "bind" => array(
                1 => "mechanical"
            )
            ), $cacheSeconds                    
        );
        #$robots = Robots::find();
        $this->view->robots = $robots;
    }
    
    public function editAction($id)
    {
        if (!$this->request->isPost()) {
            
            $robot = Robots::findFirstById($id);
            
            if (!$robot) {
                $this->flash->error('Robot was not found');
                return $this->forward("robots/index");
            }
            $this->view->form = new RobotsForm($robot, array('edit' => true));
        }
    }

    public function saveAction()
    {
        if (!$this->request->isPost()) {
            return $this->forward("robots/index");
        }
        
        $id = $this->request->getPost("id", "int");

        $robot = Robots::findFirstById($id);
        if (!$robot) {
            $this->flash->error("Robot does not exist");
            return $this->forward("robots/index");
        }

        $form = new RobotsForm;
        $this->view->form = $form;
        
        $data = $this->request->getPost();

        if (!$form->isValid($data, $robot)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->forward('robots/edit/' . $id);
        }

        $robot->Outo->who = $data['who'];        

        if ($robot->save() == false) {
            foreach ($robot->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->forward("robots/edit/" . $id);
        }     
        
        $form->clear();
        
        $this->flash->success("Robot was updated successfully");
        return $this->forward("robots/index");   
    }	  	
    
    public function newAction()
    {
        $this->view->form = new RobotsForm(null, array('edit' => true));
    }
    
    public function createAction()
    {
        if (!$this->request->isPost()) {
            return $this->forward("robots/index");
        }
        
        $form = new RobotsForm;
        $this->view->form = $form;
        $robot = new Robots();
                
        $data = $this->request->getPost();
        
        if (!$form->isValid($data, $robot)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->forward('robots/new');
        }
        
        $robot->type = $data['type'];
        $robot->name = $data['name'];
        $robot->year = $data['year'];

        $outo = new Outo();
        $outo->who = $data['who'];
        $robot->Outo = $outo;
        
        if ($robot->save() == false) {
            foreach ($robot->getMessages() as $message) {
                $this->flash->error($message);
            }
        }
        return $this->forward("robots/index");
    }
    
    public function deleteAction($id)
    {
        $id = $this->filter->sanitize($id, "int");
        $robot = Robots::findFirstById($id);
        
        if (!$robot) {
            $this->flash->error('Robot was not found');
            return $this->forward("robots/index");
        }
        
        if (!$robot->delete())
        {
            foreach ($robot->getMessages as $message) {
                $this->flash->error($message);
            }
        }

        $this->flash->success("Robot was deleted");
        return $this->forward("robots/index");
    }
}
