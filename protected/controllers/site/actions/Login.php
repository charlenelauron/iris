<?php

class Login extends CAction {
	public function run() {
		$controller = $this->getController();
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$attr['password'] = md5($model->password);
				$where['condition'] = '(username = :username OR email_address = :email)';
				$where['params'] = array(':username'=>$model->username, ':email'=>$model->username);
				$users = Users::model()->findByAttributes($attr, $where);
				if($users->first_name == null || $users->last_name == null) {
					$controller->redirect('profile');
				} else {
					$controller->redirect('index');
				}
			}
		}
		// display the login form
		$controller->render('login',array('model'=>$model));
	}
}

?>