// Based on /pimcore/static/js/pimcore/object/tags/input.js

pimcore.registerNS("pimcore.object.tags.testobjectfield");
pimcore.object.tags.testobjectfield = Class.create(pimcore.object.tags.abstract, {
    type: "testobjectfield",

    initialize: function (data, fieldConfig) {
        this.data = "";
        if (data) {
            this.data = data;
        }
        this.fieldConfig = fieldConfig;
    },

    getLayoutEdit: function () {

        var input = {
            fieldLabel: this.fieldConfig.title,
            name: this.fieldConfig.name,
            itemCls: "object_field"
        };

        if (this.data) {
            input.value = this.data;
        }

        if (this.fieldConfig.width) {
            input.width = this.fieldConfig.width;
        }
        if(this.fieldConfig.columnLength) {
            input.autoCreate = {tag: 'input', type: 'text', maxlength: this.fieldConfig.columnLength};
        }

        if(this.fieldConfig["regex"]) {
            input.regex = new RegExp(this.fieldConfig.regex);
        }

        this.component = new Ext.form.TextField(input);

        return this.component;
    },


    getLayoutShow: function () {

        this.component = this.getLayoutEdit();
        this.component.disable();

        return this.component;
    },

    getValue: function () {
        return this.component.getValue();
    },

    getName: function () {
        return this.fieldConfig.name;
    }
});