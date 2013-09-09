var Top = window.Top || {};


require = {};
require.init = function(){
    //this.loadJavascript('/js/config/config.js');
};
require.require = function(_name){
    _name.map(function(_js){
        this.loadJavascript(_js);
    });
};
require.loadJavascript = function(_js){
    console.log(_js);
    var _scp = document.createElement('script');
    _scp.setAttribute('type', 'text/javascript');
    _scp.setAttribute('src', _js);
    document.body.appendChild(_scp);
}
require.getJsByName = function(_name){
    return this.files[_name].split(',');
}

Top.require = require;
window.require = require.require;

//初始化加载的文件
$(document).ready(function(){
    Top.require.init();
})
