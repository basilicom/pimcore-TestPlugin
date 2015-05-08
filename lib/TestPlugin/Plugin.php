<?php

namespace TestPlugin;

use Pimcore\API\Plugin as PluginLib;

class Plugin extends PluginLib\AbstractPlugin implements PluginLib\PluginInterface {

    public function init() {

        // using anonymous function
        \Pimcore::getEventManager()->attach("document.postAdd", function ($event) {
            $document = $event->getTarget();
        });

        // using methods
        \Pimcore::getEventManager()->attach("document.postUpdate", array($this, "handleDocument"));

        // for more information regarding events, please visit:
        // http://www.pimcore.org/wiki/display/PIMCORE/Event+API+%28EventManager%29+since+2.1.1
        // http://framework.zend.com/manual/1.12/de/zend.event-manager.event-manager.html
        // http://www.pimcore.org/wiki/pages/viewpage.action?pageId=12124202


        // Register front controller plugin
        \Pimcore::getEventManager()->attach("system.startup", function ($event) {
            $front = \Zend_Controller_Front::getInstance();
            $frontControllerPlugin = new FrontControllerPlugin();
            $front->registerPlugin($frontControllerPlugin);
        });


        //
        // Overview of all possible events
        // Note: your plugin must be enabled in order for the events to work
        //

        // System events
        \Pimcore::getEventManager()->attach("system.startup", function ($event) {
            // This event is fired on startup, just before the MVC dispatch starts.
        });

        \Pimcore::getEventManager()->attach("system.shutdown", function ($event) {
            // This event is fired on shutdown (register_shutdown_function)
        });

        \Pimcore::getEventManager()->attach("system.maintenance", function ($event) {
            // Use this event to register your own maintenance jobs, this event is triggered just before the jobs are executed
        });


        // Document events
        \Pimcore::getEventManager()->attach("document.preAdd", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("document.postAdd", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("document.preUpdate", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("document.postUpdate", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("document.preDelete", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("document.postDelete", function ($event) { /* do something here */ });

        // Object events
        \Pimcore::getEventManager()->attach("object.preAdd", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.postAdd", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.preUpdate", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.postUpdate", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.preDelete", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.postDelete", function ($event) { /* do something here */ });

        // Asset events
        \Pimcore::getEventManager()->attach("asset.preAdd", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("asset.postAdd", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("asset.preUpdate", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("asset.postUpdate", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("asset.preDelete", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("asset.postDelete", function ($event) { /* do something here */ });

        // Object class
        \Pimcore::getEventManager()->attach("object.class.preAdd", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.class.preUpdate", function ($event) { /* do something here */ });

        // Object key value group configuration
        \Pimcore::getEventManager()->attach("object.keyValue.groupConfig.preAdd", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.keyValue.groupConfig.postAdd", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.keyValue.groupConfig.preUpdate", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.keyValue.groupConfig.postUpdate", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.keyValue.groupConfig.preDelete", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.keyValue.groupConfig.postDelete", function ($event) { /* do something here */ });

        // Object KeyValue Key Configuration
        \Pimcore::getEventManager()->attach("object.keyValue.keyConfig.preAdd", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.keyValue.keyConfig.postAdd", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.keyValue.keyConfig.preUpdate", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.keyValue.keyConfig.postUpdate", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.keyValue.keyConfig.preDelete", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("object.keyValue.keyConfig.postDelete", function ($event) { /* do something here */ });

        // Admin interface
        \Pimcore::getEventManager()->attach("admin.login.login.failed", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("admin.login.logout", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("admin.login.index.authenticate", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("admin.login.login.authenticate", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("admin.controller.preInit", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("admin.controller.postInit", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("admin.object.get.preSendData", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("admin.object.treeGetChildsById.preSendData", function ($event) { /* do something here */ });
        \Pimcore::getEventManager()->attach("admin.class.objectbrickList.preSendData", function ($event) { /* do something here */ });
    }

    public function handleDocument ($event) {
        // do something
        $document = $event->getTarget();
    }

	public static function install (){
        // implement your own logic here
        return true;
	}
	
	public static function uninstall (){
        // implement your own logic here
        return true;
	}

	public static function isInstalled () {
        // implement your own logic here
        return true;
	}
}
