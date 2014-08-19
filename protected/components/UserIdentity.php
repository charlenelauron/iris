<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$attr = array();
		$where = array();
		$attr['password'] = md5($this->password);
		$where['condition'] = '(username = :username OR email_address = :email)';
		$where['params'] = array(':username'=>$this->username, ':email'=>$this->username);
		$users = Users::model()->findByAttributes($attr, $where);

		/*
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
		*/

		if(!isset($users->id)) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else {
			// check if user had sent a feed back on the current date
			$attr = array();
			$where = array();
			$attr['user_id'] = md5($users->id);
			$where['condition'] = "DATE_FORMAT(date_added, '%Y-%m-%d') = :date_added";
			$where['params'] = array(':date_added' => date('Y-m-d'));
			$user_feedbacks = UserFeedbacks::model()->findByAttributes($attr, $where);

			if(!isset($user_feedbacks->id)) {
				// set is_posted to 0, means not yet posted
				$users->is_posted = 0;
			} else {
				// set is_posted to 0, means already posted a feed back
				$users->is_posted = 1;
			}
			$this->setState('id', $users->id);
			foreach ($users->getAttributes() as $attrName => $attrValue) {
				error_log('message');
	        	$this->setState($attrName, $attrValue);
	        }
			$users->save();

			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}