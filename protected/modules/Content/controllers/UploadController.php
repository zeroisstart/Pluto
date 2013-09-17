<?php
class UploadController extends Controller
{

    public function actions ()
    {
        return array(
            'upload' => array(
                'class' => 'xupload.actions.XUploadAction', 
                'path' => Yii::app()->getBasePath() . "/../uploads", 
                'publicPath' => Yii::app()->getBaseUrl() . "/uploads", 
                'subfolderVar' => "parent_id"
            )
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex ()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        Yii::import('ext.xupload.models.*');
        $model = new XUploadForm();
        $this->render('index', array(
            'model' => $model
        ));
    }
}