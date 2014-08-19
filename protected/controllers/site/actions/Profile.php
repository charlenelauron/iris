<?php

class Profile extends CAction {
	
	public function run($id) {
		$controller = $this->getController();
		$model = Users::model()->findByPk($id);
		if(!is_null($model)) {
			
			// collect user input data
			if(isset($_POST['LoginForm']))
			{
				$model->attributes=$_POST['LoginForm'];
				// validate user input and redirect to the previous page if valid
				if($model->validate() && $model->login()){
					$this->redirect('site/index');
				}
			}
			// display the login form
			$controller->render('profile',array('model'=>$model));
		} else {
			throw new CHttpException(404,'The specified post cannot be found.');
		}
	}

}

?>