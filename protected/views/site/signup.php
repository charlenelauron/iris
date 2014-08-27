<div class="signup-form form-rounded-corner">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'sign-up-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
	)); ?>
		<div class="row login-row">
			<?php echo $form->textField($model,'username', array('placeholder'=>'Username', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div class="row login-row">
			<?php echo $form->textField($model,'email_address', array('placeholder'=>'Email', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div class="row login-row">
			<?php echo $form->passwordField($model,'password', array('placeholder'=>'Password', 'class'=>'iris-textfield input-rounded-corner')); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>

		<div class="row login-row">
			<?php echo $form->passwordField($model,'password_repeat', array('placeholder'=>'Confirm Password', 'class'=>'iris-textfield input-rounded-corner')); ?>
			<?php echo $form->error($model,'password_repeat'); ?>
		</div>


		<div class="row login-row">
			<?php echo $form->textField($model,'caps', array('placeholder'=>'Main Cap (e.g. Project Manager)', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>
		
		<div>
			<?php echo $form->fileField($model, 'image_url');?>
		</div>
		
		<div>
			<?php echo CHtml::submitButton('Sign Up', array('class'=>'iris-button button-rounded-corner')); ?>
		</div>

	<?php $this->endWidget(); ?>
</div><!-- form -->