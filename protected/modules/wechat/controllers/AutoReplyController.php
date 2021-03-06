<?php
/**
 * weixin 回复后台
 * @author top
 *
 */
class AutoReplyController extends Controller
{

    private $_model = null;

    public function actionMain ()
    {
        $this->run('add');
    }

    /**
     * 添加
     */
    public function actionAdd ()
    {
        $model = new WechatAutoReply();
        $ary_param = array(
            'h1' => '添加', 
            'small' => '自动回复', 
            'btns' => array(
                '列表' => '/wechat/autoReply/list', 
                '默认消息' => '/wechat/autoReply/default'
            )
        );
        $ary_param['model'] = $model;
        if (isset($_POST['autoReply'])) {
            $model->attributes = $_POST['autoReply'];
            $model->dateline = date('Y-m-d H:i:s');
            if ($model->validate()) {
                $model->save();
                $this->run('list');
                Yii::app()->end();
            } else {
                // var_dump($model->errors);
            }
            $ary_param['model'] = $model;
        }
        $this->render('frame', $ary_param);
    }

    public function actionList ()
    {
        $ary_param = array(
            'h1' => '列表', 
            'small' => '自动回复', 
            'btns' => array(
                '添加' => '/wechat/autoReply/add', 
                '默认消息' => '/wechat/autoReply/default'
            )
        );
        $model = WechatAutoReply::model();
        $dataProvider = $model->search();
        $ary_param['dataProvider'] = $dataProvider;
        $this->render('frame', $ary_param);
    }

    /**
     * 关注后默认发送的消息
     *
     * @param $id integer           
     */
    public function actionDefault ()
    {
        $ary_param = array(
            'h1' => '默认回复', 
            'small' => '自动回复', 
            'btns' => array(
                '添加' => '/wechat/autoReply/add', 
                '列表' => '/wechat/autoReply/list'
            )
        );
        $req = Yii::app()->request;
        $txt = $req->getParam('txt');
        $txt = mysql_real_escape_string($txt);
        $WechatRecordPresend = new WechatRecordPresend();
        if ($txt) {
            // set default logic
            $WechatRecordPresend->txt = strip_tags($txt);
            $WechatRecordPresend->userid=1;#Yii::app() -> user -> id;
            $WechatRecordPresend->dateline = date('Y-m-d H:i:s', time());
            if ($WechatRecordPresend->validate()) {
               $WechatRecordPresend->save();
            } else {
                //var_dump($WechatRecordPresend->errors);
            }
            // end default logic
        }else{
            $WechatRecordPresend -> txt = $WechatRecordPresend -> getTxt();
        }
        // 默认的消息
        $data = array();
       # $WechatRecordPresend = WechatRecordPresend::model();
       
        $ary_param ['model']=$WechatRecordPresend;
        #$txt = $WechatRecordPresend->getTxt();
        #$data['txt'] = $txt;
        #$ary_param['data'] = $data;
        $this->render('frame', $ary_param);
    }

    /**
     * 删除自动回复
     *
     * @param $id integer           
     */
    public function actionDelete ($id)
    {
        $model = $this->loadModel();
        if ($model) {
            $model->delete();
        }
        // this->render('delete');
    }

    /**
     * 编辑自动回复
     *
     * @param $id integer           
     */
    public function actionUpdate ($id)
    {
        $ary_param = array(
            'h1' => '修改', 
            'small' => '自动回复'
        );
        $model = $this->loadModel();
        $ary_param['model'] = $model;
        if (isset($_POST['autoReply'])) {
            $model->attributes = $_POST['autoReply'];
            $model->dateline = date('Y-m-d H:i:s');
            if ($model->validate()) {
                $model->update();
                $this->run('list');
                Yii::app()->end();
            } else {
                // var_dump($model->errors);
            }
            $ary_param['model'] = $model;
        }
        $this->render('frame', $ary_param);
    }

    /**
     * 加载单个模型
     */
    public function loadModel ()
    {
        if ($this->_model === null) {
            if (isset($_GET['id']))
                $this->_model = WechatAutoReply::model()->findByPk($_GET['id']);
            if ($this->_model === null)
                throw new CHttpException(404, '您请求的页面不存在.');
        }
        return $this->_model;
    }

    /**
     * 基于ajax的表单验证
     */
    protected function performAjaxValidation ($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'autoReply-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}