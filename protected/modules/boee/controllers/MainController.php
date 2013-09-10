<?php
class MainController extends Controller
{

    public $defaultAction = 'main';

    public $layout = '//layouts/boee';

    public function actionLogin ()
    {
        $loginForm = new LoginForm();
        if (isset($_POST['LoginForm'])) {
            $loginForm->attributes = $_POST['LoginForm'];
            if ($loginForm->validate() && $loginForm->login()) {
                $this->run('main');
            }
        }
        $this->renderPartial('login', 
                array(
                    'model' => $loginForm
                ));
    }

    public function actionLogout ()
    {
        Yii::app()->user->logout();
        $this->run('login');
    }

    public function actionMain ()
    {
        if (Yii::app()->user->isGuest) {
            $this->run('login');
        } else {
            $this->render('main');
        }
    }

    public function actionLeftframe ()
    {
        $this->renderPartial('leftframe');
    }

    public function actionTopframe ()
    {
        $this->renderPartial('topframe');
    }

    public function actionSwitchframe ()
    {
        $this->renderPartial('switchframe');
    }

    public function actionMainframe ()
    {
        $this->renderPartial('mainframe');
    }

    public function actionUntitledframe ()
    {
        $this->renderPartial('untitledframe');
    }
}