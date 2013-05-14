


<div class="page" id="page-index">
	<div class="page-region">
		<div class="page-region-content">
            <h5 class="text-right"><?php echo date('Y-m-d H:i:s',time());?></h5>		    
                <div class="grid w620 main_panel">
                      <div class="row">
                          <div class="span8">
                              <div class="main_task">
                                  <ul class="task_list">
                                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scramb</li>
                                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scramb</li>
                                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scramb</li>
                                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scramb</li>
                                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scramb</li>
                                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scramb</li>
                                  </ul>
                              </div>
                          </div>
                          <div class="span8">
                              <div class="main_content">
                                  
                              </div>
                          </div>
                      </div>
                </div>
                
                <div class="grid main_panel w300 ml20">
                        <div class="row">
                          <div class="span4">
                              <div class="main_command_list">
                                  <?php for($i=0;$i<9;$i++):?>
                                  <button class="command-button default w280">Yes, share and connect<small>Use this option for home or work</small></button>
                                  <?php endfor;?>
                              </div>
                          </div>
                      </div>
                </div>
            
<?php
            

// $this->widget ( 'ext.popup.popup' );
$form = $this->beginWidget('CActiveForm', 
        array('id' => 'contact-form', 
                // 'action' => $this->createUrl ( '/System/upload/ImgUpload' ),
                'action' => $this->createUrl('/System/upload/AttachmentUpload'), 
                'enableClientValidation' => true, 'method' => 'post', 
                'htmlOptions' => array('enctype' => "multipart/form-data"), 
                'clientOptions' => array('validateOnSubmit' => true)));

?>
<?php
/*
 * $model = new ImgUploadForm (); $this->widget ( 'widget.system.uploadForm',
 * array ( 'fieldName'=>'ImgUploadForm[img]', 'model' => $model ) );
 */
/*
$model = new ImgUploadForm ();
$this->widget ( 'widget.system.uploadForm', array (
		'fieldName'=>'AttachmentUploadForm[attachment]',
		'model' => $model
) );*/

?>

<?php //echo CHtml::submitButton('submit');?>

<?php $this -> endWidget()?>
</div>

	</div>
</div>