<?php

class Index extends CAction {
 
 	public function run() {
 		$controller = $this->getController();

        $userInfo = Yii::app()->user;

        $data['userInfo'] = $userInfo;
        $controller->render('index', $data);
    }
}

?>