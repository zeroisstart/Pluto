
 <?php
/*
 * @var $this AutoReplyController
 */
$this->breadcrumbs = array(
    'Auto Reply' => array(
        '/wechat/autoReply'
    ), 
    'Add'
);
?>

<h2>微信的默认回复:</h2>
<?php echo CHtml::errorSummary($model); ?>

<div style="display: block;">
		<form action="<?php echo $this -> createUrl('/wechat/autoReply/default')?>" method="POST" enctype="multipart/form-data">

                <div class="input-control textarea">
                       <textarea name="txt" style="resize:none;" required="required"  placeholder="默认自动回复" ><?php echo $model->txt;?></textarea>
                </div>
                
        		<div class="tool_submit_btn">	
        		    <button class="standart default submit" type="submit">提交</button>
        		</div>
        </form>
</div>