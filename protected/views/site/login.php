<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>
<div class="login-form form-rounded-corner">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>

		<div class="row login-row">
			<?php echo $form->textField($model,'username', array('placeholder'=>'Email', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div class="row login-row">
			<?php echo $form->passwordField($model,'password', array('placeholder'=>'Password', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div>
			<?php echo CHtml::submitButton('Login', array('class'=>'iris-button button-rounded-corner')); ?>
		</div>
		<div>
			<?php echo CHtml::button('Sign Up', array('class'=>'iris-button button-rounded-corner', 'onclick'=>'window.location="signup"')); ?>
		</div>

	<?php $this->endWidget(); ?>
</div><!-- form -->
