$(document).ready(function(){

    //generate QRCode
    $('#qrgenerate').click(function(e){
        var _opt = {};
        var _form   = $("#QRCodeForm");
        _opt.url    = _form.attr('action');
        _opt.type   = _form.attr('method');
		_opt.async  = false;
        _opt.data   = _form.serialize();
        _opt.success = function(res){
			var _div ='<div style="width:100%;height:100%;">{img}</div>';
			_div = _div.replace('{img}',res);
            $.Dialog({
                'title': 'QRCode Generate',
                'content': _div,
                'draggable': true,
				'position':{
					'offsetX':'744px'
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
    
})
