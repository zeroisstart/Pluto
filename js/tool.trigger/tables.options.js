
$.fn.tableNameClick = function(){
    var _p = $(this);
    $(document).on('click', '.td_tablename', function(){
        var __p = $(this)
        if (__p.hasClass('choosed')) {
            __p.removeClass('choosed');
        }
        else {
            __p.addClass('choosed');
        }
    });
}

$.Init_Insert = function(){
    $(document).on('click', '.table_options_btns .default', function(){
        var _times = $(this).attr('data-times');
        var _choosed = $(".choosed");
        if (_choosed.length) {
            var _tbl_name = [];
            _choosed.map(function(k, e){
                _tbl_name.push($(e).find('a').attr('title'));
            })
            var _id = $("#connection").val();
            var _database = $("#database").val();
            var _opt = {};
            _opt.type = "POST";
            _opt.data = {
                'id': _id,
                'database': _database,
                table: _tbl_name.join(',')
            };
            _opt.url = "../../Database/Table/Insert";
            _opt.success = function(res){
            	alert('yes');
            }
            $.ajax(_opt);
        }
    })
}
$(document).ready(function(){
    $(".td_tablename").tableNameClick();
    $.Init_Insert();
})
