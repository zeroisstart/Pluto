var tool = {};

tool.qrGenerate = function(){
    $('#qrgenerate').click(function(e){
        var _opt = {};
        var _form = $("#QRCodeForm");
        _opt.url = _form.attr('action');
        _opt.type = _form.attr('method');
        _opt.async = false;
        _opt.data = _form.serialize();
        _opt.success = function(res){
            var _div = '<div style="width:100%;height:100%;">{img}</div>';
            _div = _div.replace('{img}', res);
            $.Dialog({
                'title': 'QRCode Generate',
                'content': _div,
                'draggable': true,
                'position': {
                    'offsetX': '744px'
                },
                'buttons': {
                    'Ok': {
                        'action': function(){
                        
                        }
                    },
                    /*'Cancel': {
                     'action': function(){
                     
                     }
                     }*/
                }
            });
        }
        $.ajax(_opt);
    });
}
tool.shortUrlGenerate = function(){
    //btn
    $("#shortUrlGenerate").on('click', function(){
        //form 
        //$("#shortUrlForm")
    })
}

tool.ipResearch = function(){
    $("#ip_research").on('click', function(){
        var _ip = $("input[name=ip_text]").val();
        
        var _opt = {};
        _opt.url = "http://ip.taobao.com/service/getIpInfo.php?ip=";
        _opt.success = function(resText){
        	alert('test');
        }
        _opt.dataType = "jsonp";
        _opt.url += _ip;
        $.ajax(_opt);
        return false;
    })
}

tool.init = function(){
    tool.qrGenerate();
    tool.shortUrlGenerate();
    tool.ipResearch();
}

$(document).ready(function(){
    tool.init();
    //generate QRCode
});

(function(){
    var PJ = {};
    // dom collection
    var _DROP_AREA = null;
    var _RESULT_TABLE_BODY = null;
    var _data_textareas = null;
    var _data_previewareas = null;
    
    PJ.init = function(){
        _DROP_AREA = window;
        //_RESULT_TABLE_BODY = document.getElementById("result_body");
        _DROP_AREA.addEventListener("dragenter", PJ._dragenter, false);
        _DROP_AREA.addEventListener("dragover", PJ._dragover, false);
        _DROP_AREA.addEventListener("drop", PJ._drop, false);
    };
    
    PJ._dragenter = function(e){
        e.stopPropagation();
        e.preventDefault();
    };
    PJ._dragover = function(e){
        e.stopPropagation();
        e.preventDefault();
    };
    PJ._drop = function(e){
        PJ.handleFiles(e);
        e.stopPropagation();
        e.preventDefault();
    };
    
    PJ.handleFiles = function(e){
        var dt = e.dataTransfer;
        var files = dt.files;
        var _html = [];
        for (var i = 0, l = files.length; i < l; i++) {
            console.log(files);
            //_html.push('<tr><td><strong class="break_all">' + files[i].name + '</strong></td><td>' + Math.ceil(files[i].size/1024) + ' KB</td><td class="preview_area"></td><td><textarea class="result_area" onfocus="this.select()"></textarea></td><tr>');
            //	PJ.readFile(files[i]);
        }
        
        //_RESULT_TABLE_BODY.innerHTML = _html.join("");
        
        _data_textareas = document.getElementsByClassName("result_area");
        _data_previewareas = document.getElementsByClassName("preview_area");
        
        PJ.openFiles(files);
    };
    
    PJ.openFiles = function(/*@type {Files}*/files){
        for (var i = 0, l = files.length; i < l; i++) {
            PJ.readFile(files[i], i);
        }
    }
    
    PJ.readFile = function(/*@type {File}*/file,/*@type {int}*/ index){
        var reader = new FileReader();
        
        reader.onprogress = function(/*@type {ProgressEvent}*/e){
            if (e.lengthComputable) {
                //_data_previewareas[index].innerHTML = '<span class="loading">' + (Math.ceil(100*e.loaded/file.size)) + '%</span>';
                //e.target.loaded
                //e.target.total
            }
            
        };
        
        reader.onloadstart = function(/*@type {ProgressEvent}*/e){
            //_data_previewareas[index].innerHTML = '<span class="loading"></span>';
        };
        
        reader.onload = function(/*@type {ProgressEvent}*/e){
            var _result = e.target.result;
            $("#base64textarea").find('textarea').val(_result);
            //_data_textareas[index].value = _result;
            //PJ.previewFile(_result,index);
        };
        reader.readAsDataURL(file);
    };
    
    PJ.previewFile = function(/*@type {string}*/result,/*@type {int}*/ index){
        //data:text/plain
        //data:image/jpeg
        //data:image/png
        //data:audio/mp3
        
        
        var _type = result.substr(5, result.indexOf(";") - 5);
        var _html = "Can't Preview this file";
        var _haveSrc = false;
        switch (_type) {
            //not ready
            //					case "text/plain":
            //						_html = '<textarea></textarea>';
            //						break;
            case "image/jpeg":
            case "image/png":
            case "image/gif":
                _html = '<img alt=""/>';
                _haveSrc = true;
                break;
            case "audio/mp3":
                _html = '<audio controls="controls"></audio>';
                _haveSrc = true;
                break;
            default:
                break;
        };
        
        _data_previewareas[index].innerHTML = _html;
        if (_haveSrc) {
            _data_previewareas[index].children[0].src = result
        }
        
    };
    window.addEventListener("load", PJ.init, false);
})();
