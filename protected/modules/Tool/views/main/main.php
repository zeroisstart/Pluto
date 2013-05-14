<h2>Request Response~</h2>

<iframe name="response" class="tool_response_frame">
</iframe>
<ul class="accordion span10" data-role="accordion">
	<li class=""><a href="#">Post Files : 文件上传测试</a>
		<div style="display: none;">
		    <form action="<?php echo $this -> createUrl('/Tool/Postfile/post')?>" method="POST" enctype="multipart/form-data" target="response">
                <label class="input-control checkbox" onclick="">
                        <input type="checkbox" name="txt" value="1">
                        <span class="helper">Txt</span>
                </label>
                
                <label class="input-control checkbox" onclick="">
                        <input type="checkbox" name="img" checked value="1">
                        <span class="helper">Image</span>
                </label>
                
                <div class="input-control text">
                    <input type="text" class="with-helper" name="url" placeholder="Enter Url" required="required">
                    <button class="helper" tabindex="-1" type="button"></button>
                </div>
        		
        		<div class="tool_submit_btn">	
        		    <button class="standart default submit" type="submit">Submit</button>
        		</div>
    		</form>
		</div>
	</li>
	<li class=""><a href="#">frame 2</a>
		<div style="">
			<h3>frame 2</h3>
			Curabitur porta condimentum sem sed commodo. Praesent vestibulum,
			libero eget lacinia pretium, metus augue dapibus odio, nec placerat
			mauris justo non ante.
			<div>subcontent 2</div>
		</div></li>
	<li><a href="#">frame 3</a>
		<div style="">
			<h3>frame 3</h3>
			Maecenas adipiscing nulla sed sem molestie quis pulvinar lectus
			convallis. Nam tortor arcu, gravida nec tristique sit amet, pretium
			sagittis eros. Curabitur at nisi ut ligula ornare euismod.
		</div></li>
	<li><a href="#">frame 4</a>
		<div style="">
			<h3>frame 4</h3>
			Ut vitae tortor eget elit dictum dictum. Ut porttitor, ante non
			blandit gravida, felis risus feugiat neque, eu tincidunt neque ante
			at urna. Maecenas nec felis nulla.
		</div></li>
</ul>