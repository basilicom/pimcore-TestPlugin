pimcore.registerNS("pimcore.plugin.testplugin");

pimcore.plugin.testplugin = Class.create(pimcore.plugin.admin, {
    getClassName: function() {
        return "pimcore.plugin.testplugin";
    },

    initialize: function() {
        pimcore.plugin.broker.registerPlugin(this);


    },
 
    pimcoreReady: function (params,broker){
        // Initialize your JS logic here
        var sideNavigation = Ext.get("pimcore_navigation");

        var action = new Ext.Action({
            id: "your_plugin_button",
            text: t('Test plugin 1'),
            iconCls: "TestPluginIcon",
            handler: function(){
                alert("Button clicked");
            }
        });

        layoutToolbar.extrasMenu.add(action);
        // You can also add your button to any of these places
        // layoutToolbar.fileMenu.add(action);
        // layoutToolbar.marketingMenu.add(action);
        // layoutToolbar.settingsMenu.add(action);
        // layoutToolbar.searchMenu.add(action);


    },

    postOpenDocument: function(document, documentType) {
        // Add button to a document panel
        var tab = pimcore.globalmanager.get("document_" + document.id);
        var toolbar = tab.toolbar;

        var toolbarButton = new Ext.Button({
            text: t("Test button"),
            scale: "medium",
            handler: function() {
                alert("It works");
            }
        });

        // Add the button to the end of the toolbar
        toolbar.insert(tab.toolbar.items.length, toolbarButton);
        toolbar.doLayout();
    }
});

var testpluginPlugin = new pimcore.plugin.testplugin();