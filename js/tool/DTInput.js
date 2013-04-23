var database = {
    'obj': false,
    'init': function(){
        var _p = this;
        $("#connection").change(function(){
            _p.change();
        })
        this.obj = $("#connection");
    },
    'change': function(){
        var _id = this.obj.val();
        var _opt = {};
        var _url = '../Db/ajaxDbName';
        var _data = {};
        _data.id = _id;
        _opt.data = _data;
        _opt.async = false;
        _opt.type = 'POST';
        _opt.url = _url;
        _opt.success = function(res){
            $("#table-droplist").html(res);
            $("#database").change();
        }
        $.ajax(_opt);
    }
}
var table = {
    'obj': '',
    'init': function(){
        var _p = this;
        this.obj = $("#database");
        this.obj.live("change", function(){
            _p.change();
        })
    },
    'change': function(){
        var _id = database.obj.val();
        var _opt = {};
        var _url = '../Table/AjaxTable';
        var _data = {};
        _data.id = _id;
        _data.database = $("#database").val();
        _opt.data = _data;
        _opt.async = false;
        _opt.type = 'POST';
        _opt.url = _url;
        _opt.success = function(res){
            $(".bordered tbody").html(res);
            //$("#table-droplist").html(res);
        }
        console.log(_opt);
        $.ajax(_opt);
    }
}
$(document).ready(function(){
    database.init();
    database.change();
    table.init();
    table.change();
})
