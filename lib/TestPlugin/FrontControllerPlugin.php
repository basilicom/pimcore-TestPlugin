<?php
namespace TestPlugin;

// Mehr info: http://framework.zend.com/manual/1.12/de/zend.controller.plugins.html

// Front controller plugin must be registered upon system.startup event. See the init method of Plugin class

use Pimcore\Tool;

class FrontControllerPlugin extends \Zend_Controller_Plugin_Abstract
{
    public function routeStartup() { }

    public function routeShutdown() { }

    public function dispatchLoopStartup() { }

    public function preDispatch() { }

    public function postDispatch() { }

    public function dispatchLoopShutdown()
    {
        if (Tool::isFrontend()) {
            $contentToInject = "<h1>This is content injected by TestPlugin</h1>";

            $response = $this->getResponse();
            $body = $response->getBody();
            $bodyTagPosition = stripos($body, "<body>");
            if($bodyTagPosition !== false) {
                $body = substr_replace($body, "<body>\n" . $contentToInject, $bodyTagPosition, 7);
            }

            $response->setBody($body);
        }
    }
}