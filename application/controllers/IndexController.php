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
        $server->setClass('Application_Model_JsonRpc');  
          
        if ('GET' == $_SERVER['REQUEST_METHOD']) {  
            // Zeigt den Endpunkt der URL, und die verwendete JSON-RPC Version:
            $server->setTarget("http://127.0.0.1".$baseUrl);  
            $server->setEnvelope(Zend_Json_Server_Smd::ENV_JSONRPC_2);  
            // Den SMD holen
            $smd = $server->getServiceMap();
            // Den SMD an den Client zurückgeben
            header('Content-Type: application/json');  
            //echo Zend_Json::prettyPrint($smd);  
            echo $smd;
            return ;  
        }  
          
        try {
            $server->handle();
        } catch(Exception $e) {
            $err = new Zend_Json_Server_Error($e->getMessage());
            echo $err;
        }
    }

    public function clientAction() {
        //
    }
            
    public function phpclientAction()
    {
        $api = new Scitotec_JsonRpcClient('http://dev.local/jsonrpc/public/index');
        print $api->getIpAddress();
    }

}

