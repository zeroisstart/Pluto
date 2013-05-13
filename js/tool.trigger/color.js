$(document).ready(function() {
	$(".color_layer").click(function() {
		if ($(this).hasClass("color_layer_selected"))
			$(this).removeClass("color_layer_selected")
		else
			$(this).addClass("color_layer_selected");
	})

	$(".color_layer a").click(function() {
		var _p = $(this).parentsUntil('.color_list');
		if (_p.hasClass('color_layer_selected')) {
			var _id = _p.attr('data-id');
			var _opt = {};
			// _opt.dataType = 'json';
			_opt.type = "POST";
			_opt.data = {
				id : _id,
				r : 'color'
			};
			_opt.url = "../../Api/delete/delete";
			_opt.async = false;
			_opt.success = function(res) {
				var _json = eval('(' + res + ')');

				if (_json.status) {
					_p.remove();
					/*
					 * _p.animate({ width : "0px" }, 1800, function() {
					 * _p.fadeOut(0); });
					 */
				}

			}

			$.ajax(_opt);
		}
	});
})
