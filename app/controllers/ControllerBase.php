<?php

use Phalcon\Mvc\Controller;
use Phalcon\Translate\Adapter\NativeArray;

class ControllerBase extends Controller
{
    protected function initialize()
    {
    	if ($this->session->has("langkey")) {
            $languagekey = $this->session->get("langkey");
        } else {
            $languagekey = substr($this->request->getBestLanguage(), 0, 2);
            $this->session->set("langkey", $languagekey);
        }            
     //echo $languagekey . '<br>';       	    	
    	if (file_exists(APP_PATH . "app/messages/" . $languagekey . ".php")) {
    		require APP_PATH . "app/messages/" . $languagekey . ".php";
    	}
    	$this->view->t = new NativeArray(array(
       		"content" => $messages
    	));    
         
        $this->tag->prependTitle($this->view->t['home']);
        $this->view->setTemplateAfter('main');
    }

    protected function forward($uri)
    {
        $uriParts = explode('/', $uri);
        $params = array_slice($uriParts, 2);
    	return $this->dispatcher->forward(
    		array(
    			'controller' => $uriParts[0],
    			'action' => $uriParts[1],
                'params' => $params
    		)
    	);
    }
}
