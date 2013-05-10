$(document).ready(function(){
    $(".color_layer").click(function(){
        if ($(this).hasClass("color_layer_selected")) 
            $(this).removeClass("color_layer_selected")
        else 
            $(this).addClass("color_layer_selected");
    })
    
    $(".color_layer a").click(function(){
        var _p = $(this).parentsUntil('.color_list');
        if (_p.hasClass('color_layer_selected')) {
            var _id = _p.attr('data-id');
            var _opt = {};
            _opt.dataType = 'json';
            _opt.type = "POST";
            _opt.data = {
                id: _id,
                r: 'color'
            };
            _opt.url = "../../Api/delete/delete";
			_opt.success = function(res){
				alert('test');
				console.log(res);
				/*
                if (res.status) {
					console.log(_p);
                    _p.animate({
                        width: "20px"
                    }, 1000, function(){
                        _p.fadeOut();
                    });
                }
                */
            }
			_opt.success = function(){
				alert('test');
			}
			console.log(_opt);
            //$.ajax(_opt);
			alert('test');
        }
    });
})
