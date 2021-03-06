var bridge = function (presenterPath) {
    window.rhubarb.viewBridgeClasses.HtmlViewBridge.apply(this, arguments);
};

bridge.prototype = new window.rhubarb.viewBridgeClasses.HtmlViewBridge();
bridge.prototype.constructor = bridge;

bridge.prototype.attachEvents = function () {

};

bridge.prototype.setValue = function (value) {
    this.viewNode.checked = (value || value == 1);
};

bridge.prototype.getValue = function () {
    if (this.viewNode.checked) {
        return this.viewNode.value;
    }
    else {
        return false;
    }
};

bridge.spawn = function (spawnSettings, viewIndex, parentPresenterPath) {
    var checkbox = document.createElement('input');
    checkbox.setAttribute('type', 'checkbox');
    checkbox.setAttribute('value', '1');
    checkbox.setAttribute('checked', spawnSettings.Checked);

    for (var i in spawnSettings.Attributes) {
        checkbox.setAttribute(i, spawnSettings.Attributes[i]);
    }

    window.rhubarb.viewBridgeClasses.HtmlViewBridge.applyStandardAttributesToSpawnedElement(checkbox, spawnSettings, viewIndex, parentPresenterPath);

    return checkbox;
};

bridge.prototype.getCssDisplayType = function () {
    return 'inline-block';
};

window.rhubarb.viewBridgeClasses.CheckBoxViewBridge = bridge;
