<?php

class PostfileController extends Controller
{

    public function actionMain ()
    {
        $this->render('main');
    }
    
    public function actionTest(){
        var_dump($_FILES);
    }

    public function actionPost ()
    {
        $req = Yii::app()->request;
        $txt = $req->getParam('txt');
        $img = $req->getParam('img');
        $url = $req->getParam('url');
        printf("URL : %s<br/>", $url);
        printf("Type: %s %s<br/>", $txt ? 'Txt' : '', $img ? 'Image' : '');
        if($img){
            echo $this->_postFile($url, array('file' =>'@'.Yii::app() -> basePath.'/../publish/anne/google.png'))."<br/>";
        }
        if($txt){
            echo $this->_postFile($url, array('file' =>'@'.Yii::app() -> basePath.'/../publish/anne/test.txt'))."<br />";
        }
    }

    private function _postFile ($url, $post_data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0");
        $result = curl_exec($curl);
        $error = curl_error($curl);
        return $error ? $error : $result;
    }
}