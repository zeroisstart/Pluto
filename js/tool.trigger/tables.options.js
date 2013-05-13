$.fn.tableNameClick = function() {
	var _p = $(this);
	console.log(_p);
	_p.map(function(k, e) {
		$(e).on('click', function() {
			alert('test');
			var __p = $(this);
			console.log(__p);
			if (__p.hasClass('choosed')) {
				__p.removeClass('choosed');
			} else {
				__p.addClass('choosed');
			}
		})
	})

}

$(document).ready(function() {
	$(".td_tablename").tableNameClick();
})
