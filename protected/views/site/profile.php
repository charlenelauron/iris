<div class="signup-form form-rounded-corner">
	<?php echo CHtml::form('site/saveProfile', 'post'); ?>
		<div class="row login-row">
			<?php echo CHtml::textField('username', $model->username, array('placeholder'=>'Username', 'readonly'=>'true', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div class="row login-row">
			<?php echo CHtml::textField('email_addess', $model->email_address, array('placeholder'=>'Email', 'readonly'=>'true', 'class'=>'iris-textfield input-rounded-corner', 'readonly'=>'true')); ?>
		</div>

		<div class="row login-row">
			<?php echo CHtml::passwordField('password', '', array('placeholder'=>'Password', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div class="row login-row">
			<?php echo CHtml::passwordField('password2', '', array('placeholder'=>'Confirm Password', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div class="row login-row">
			<?php echo CHtml::textField('first_name', $model->first_name, array('placeholder'=>'First Name', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div class="row login-row">
			<?php echo CHtml::textField('last_name', $model->last_name, array('placeholder'=>'Last Name', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div class="row login-row">
			<?php echo CHtml::textField('middle_name', $model->middle_name, array('placeholder'=>'Middle Name', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div class="row login-row">
			<?php echo CHtml::dateField('birthdate', date('mm/dd/YYYY', strtotime($model->birthdate)), array('placeholder'=>'Birthdate', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div class="row login-row">
			<?php echo CHtml::textArea('address', $model->address, array('placeholder'=>'Address', 'class'=>'iris-textfield input-rounded-corner')); ?>
		</div>

		<div>
			<?php echo CHtml::submitButton('Save', array('class'=>'iris-button button-rounded-corner')); ?>
		</div>

	<?php echo CHtml::endForm(); ?>
</div><!-- form -->