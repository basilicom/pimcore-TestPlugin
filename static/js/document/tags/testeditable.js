// based on the /pimcore/static/js/pimcore/document/tags/input.js

// It is very important to add a reference to this file to plugin.xml this way:
// <pluginDocumentEditmodeJsPaths>
//     <path>/plugins/TestPlugin/static/js/document/tags/testeditable.js</path>
// </pluginDocumentEditmodeJsPaths>

pimcore.registerNS("pimcore.document.tags.testeditable");
pimcore.document.tags.testeditable = Class.create(pimcore.document.tag, {
     initialize: function(id, name, options, data, inherited) {
        this.id = id;
        this.name = name;
        this.setupWrapper();
        options = this.parseOptions(options);

        if (!data) {
            data = "";
        }

        this.element = Ext.get(id);
        this.element.dom.setAttribute("contenteditable", true);

        this.element.update("|");
        this.element.applyStyles({
            "min-height": this.element.getHeight() + "px"
        });

        this.element.update(data + "<br>");

        this.checkValue();

        this.element.on("keyup", this.checkValue.bind(this));
        this.element.on("keydown", function (e, t, o) {
            // do not allow certain keys, like enter, ...
            if(in_array(e.getCharCode(), [13])) {
                e.stopEvent();
            }
        });

        this.element.dom.addEventListener("paste", function(e) {
            e.preventDefault();

            var text = "";
            if(e.clipboardData) {
                text = e.clipboardData.getData("text/plain");
            } else if (window.clipboardData) {
                text = window.clipboardData.getData("Text");
            }

            text = this.clearText(text);
            text = htmlentities(text, "ENT_NOQUOTES", null, false);

            try {
                document.execCommand("insertHTML", false, text);
            } catch (e) {
                // IE <= 10
                document.selection.createRange().pasteHTML(text);
            }
        }.bind(this));

        if(options["width"]) {
            this.element.applyStyles({
                display: "inline-block",
                width: options["width"] + "px",
                overflow: "auto",
                "white-space": "nowrap"
            });
        }

        if(options["nowrap"]) {
            this.element.applyStyles({
                "white-space": "nowrap",
                overflow: "auto"
            });
        }

        if(options["class"]) {
            this.element.addClass(options["class"]);
        }
    },

    checkValue: function () {
        var value = trim(this.element.dom.innerHTML);
        var origValue = value;

        var textLength = trim(strip_tags(value)).length;

        if(textLength < 1) {
            this.element.addClass("empty");
            value = ""; // set to "" since it can contain an <br> at the end
        } else {
            this.element.removeClass("empty");
        }

        if(value != origValue) {
            this.element.update(this.getValue());
        }
    },

    getValue: function () {
        var text = "";
        if(typeof this.element.dom.textContent != "undefined") {
            text = this.element.dom.textContent;
        } else {
            text = this.element.dom.innerText;
        }

        text = this.clearText(text);
        return text;
    },

    clearText: function (text) {
        text = str_replace("\r\n", " ", text);
        text = str_replace("\n", " ", text);
        return text;
    },

    getType: function() {
        return "testeditable";
    }
});