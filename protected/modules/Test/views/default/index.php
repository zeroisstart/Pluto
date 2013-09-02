<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1808783432&site=qq&menu=yes"><img class="q_pic" border="0" src="http://wpa.qq.com/pa?p=2:1808783432:50" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1821965747&site=qq&menu=yes"><img class="q_pic" border="0" src="http://wpa.qq.com/pa?p=2:1821965747:50" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>

<p>
This is the view content for action "<?php echo $this->action->id; ?>".
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>

<script>
$(document).ready(function(){
    var q_pic = $(".q_pic");
    var _inline = [];
    var _offline = [];
    $.each(q_pic,function(k,v){
        var _v = $(v);
        if(_v.width() == 107){
        	_inline.push(_v);    
        }else{
            console.log(_v);
            console.log(_v.width());
        	_offline.push(_v);
        }
    });
    if(_inline.length == 0){
        console.log('asdfasdf');
    }
})
</script>