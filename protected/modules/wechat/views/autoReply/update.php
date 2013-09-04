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

<h2>微信的自动回复添加:</h2>
<?php echo CHtml::errorSummary($model); ?>

<div style="display: block;">
		<form action="<?php echo $this -> createUrl('/wechat/autoReply/update',array('id'=>$model->id));?>" method="POST" enctype="multipart/form-data">
                <div class="input-control text">
                    <input type="text" class="with-helper" name="autoReply[keyword]" value="<?php echo $model -> keyword?>" placeholder="关键字" required="required">
                    <button class="helper" tabindex="-1" type="button"></button>
                </div>

                <div class="input-control textarea">
                       <textarea name="autoReply[txt]" style="resize:none;" required="required"  placeholder="自动回复" ><?php echo $model->txt;?></textarea>
                </div>
                
        		<div class="tool_submit_btn">	
        		    <button class="standart default submit" type="submit">修改</button>
        		</div>
        </form>
</div>