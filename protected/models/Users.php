<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email_address
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $birthdate
 * @property string $address
 * @property string $image_url
 * @property string $caps
 * @property integer $is_posted
 * @property string $date_added
 * @property string $last_login
 *
 * The followings are the available model relations:
 * @property UserFeedbacks[] $userFeedbacks
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email_address, date_added, last_login', 'required'),
			array('is_posted', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>50),
			array('password', 'length', 'max'=>32),
			array('email_address', 'length', 'max'=>200),
			array('first_name, last_name, middle_name', 'length', 'max'=>150),
			array('address, image_url, caps', 'length', 'max'=>255),
			array('birthdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, email_address, first_name, last_name, middle_name, birthdate, address, image_url, caps, is_posted, date_added, last_login', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'userFeedbacks' => array(self::HAS_MANY, 'UserFeedbacks', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email_address' => 'Email Address',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'middle_name' => 'Middle Name',
			'birthdate' => 'Birthdate',
			'address' => 'Address',
			'image_url' => 'Image Url',
			'caps' => 'Caps',
			'is_posted' => 'Is Posted',
			'date_added' => 'Date Added',
			'last_login' => 'Last Login',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('image_url',$this->image_url,true);
		$criteria->compare('caps',$this->caps,true);
		$criteria->compare('is_posted',$this->is_posted);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('last_login',$this->last_login,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
