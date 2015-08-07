<?php

/**
 * LanguageController
 *
 * Switching the language files
 */
class LanguageController extends ControllerBase
{
    public function initialize()
    {
        //$this->tag->setTitle('Contact us');
        parent::initialize();
    }

    public function indexAction()
    {
        $languagekey = 'en';
        $this->session->set("langkey", $languagekey);
        return $this->response->redirect('index/index');
        exit;
    }
}
