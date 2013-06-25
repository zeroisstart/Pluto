<?php
/**
 * 
 * @author Top
 *
 */
class CommandsController extends Controller
{

    /**
     * 添加命令行记录
     */
    public function actionAdd ()
    {
        $model = new Commands();
        if (isset($_POST['Commands'])) {
            $model->attributes = $_POST['Commands'];
            // ar_dump($model -> attributes);
            // ie;
            $model->create_time = date('Y-m-d H:i:s', time());
            $modle->type = '1';
            if ($model->validate()) {
                $model->save();
            }
        }
        $this->redirect($this->createUrl('/Content/Commands/list'));
    }

    public function actionDelete ($id)
    {
        $model = Commands::model();
        $model = $model->findByPk($id);
        if ($model)
            $model->delete();
    }

    public function actionList ()
    {
        $model = Commands::model();
        $dataProvider = $model->search();
        $this->render('/core/frame', 
                array(
                    'h1' => 'Commands', 
                    'small' => 'list', 
                    'model' => $model, 
                    'dataProvider' => $dataProvider
                ));
    }

    public function actionView ()
    {
        $this->render('view');
    }
}