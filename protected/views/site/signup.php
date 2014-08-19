<div class="signup-form form-rounded-corner">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
		<div class="row login-row">
			<?php echo $form->textField($model,'username', array('placeholder'=>'Username', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div class="row login-row">
			<?php echo $form->textField($model,'email_address', array('placeholder'=>'Email', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div class="row login-row">
			<?php echo $form->passwordField($model,'password', array('placeholder'=>'Password', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div class="row login-row">
			<?php echo $form->passwordField($model,'caps', array('placeholder'=>'Main Cap (e.g. Project Manager)', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div>
			<?php echo CHtml::submitButton('Sign Up', array('class'=>'iris-button button-rounded-corner')); ?>
		</div>

	<?php $this->endWidget(); ?>
</div><!-- form -->