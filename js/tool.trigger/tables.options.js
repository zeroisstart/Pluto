
$.fn.tableNameClick = function(){
    var _p = $(this);
    _p.live('click', function(){
        var __p = $(this);
        if (__p.hasClass('choosed')) {
            __p.removeClass('choosed');
        }
        else {
            __p.addClass('choosed');
        }
    })
}

$(document).ready(function(){
    $(".td_tablename").tableNameClick();
})
