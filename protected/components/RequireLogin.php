<?php

class RequireLogin extends CBehavior {
	
	public function attach($owner) {
		$owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
	}

	public function handleBeginRequest($event) {
		if(Yii::app()->user->isGuest && 
			!strstr($_SERVER['REQUEST_URI'], '/site/login') && 
			!strstr($_SERVER['REQUEST_URI'], '/site/signup')){
			Yii::app()->user->loginRequired();
		}
	}
}

?>