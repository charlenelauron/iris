<?php

class Signup extends CAction {
	
	public function run() {
		
		$controller = $this->getController();
		$model=new Users;

		// collect user input data
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			// validate user input and redirect to the previous page if valid
			
			if(isset($_POST['ajax']) && $_POST['ajax']==='sign-up-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
			
			$model->validate();
			$uploadedFile=CUploadedFile::getInstance($model,'image_url');
            $rnd = rand(0,9999);
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->image_url = '/protected/uploads/'.$fileName;
 
            if($model->save())
            {
            	$model = new Users;
                $uploadedFile->saveAs(Yii::app()->basePath.$fileName);  // image will uplode to rootDirectory/banner/
            }
		}
		
		// display the login form
		$controller->render('signup',array('model'=>$model));
	
	}
}

?>