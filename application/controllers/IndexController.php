<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_helper->viewRenderer->setNoRender();  
        $this->_helper->layout()->disableLayout();  
          
        $objFront = Zend_Controller_Front::getInstance();  
        $baseUrl = $objFront->getBaseUrl();  
          
        $server = new Zend_Json_Server();  
        $server->setClass('Vqc_JsonRpc_Protokoll');  
          
        if ('GET' == $_SERVER['REQUEST_METHOD']) {  
            $server->setTarget("http://127.0.0.1".$baseUrl."/api");  
            $server->setEnvelope(Zend_Json_Server_Smd::ENV_JSONRPC_2);  
              
            $smd = $server->getServiceMap();  
            header('Content-Type: application/json');  
              
            echo Zend_Json::prettyPrint($smd);  
            return ;  
        }  
          
        $server->handle();
    }


}

