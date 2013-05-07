$("document").ready(function() {
	var _cls = [ 'td_tablename' ];
	_cls.map(function(k) {
		$('.' + k).live("mouseover", function() {
			var _p = $(this);
			_p.flip({
				'content' : 'update,delete,insert',
				direction : 'rl',
				onBefore : function() {
					// console.log('before starting the animation');
				},
				onAnimation : function() {
					// console.log('in the middle of the animation');
				},
				onEnd : function() {
					// console.log('when the animation has already ended');
				}
			});
		})
	})
})