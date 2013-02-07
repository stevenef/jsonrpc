<?php

class Cache1Controller extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function manifestAction()
    {
        $this->_helper->viewRenderer->setNoRender();  
        $this->_helper->layout()->disableLayout();  
        
        $objFront = Zend_Controller_Front::getInstance();  
        $baseUrl = $objFront->getBaseUrl();
        
        //header('Content-type: text/cache-manifest');
        header("Cache-Control: max-age=0, no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: Wed, 11 Jan 1984 05:00:00 GMT");
        header('Content-type: text/cache-manifest');
        
        echo "CACHE MANIFEST\n# v1.5\n\nCACHE:\n$baseUrl/cache1/index";
    }
    
    public function indexAction()
    {
        //$this->_helper->viewRenderer->setNoRender();  
        $this->_helper->layout()->disableLayout();  
    }
}

