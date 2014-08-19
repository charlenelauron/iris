<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>
<div class="iris-index">
	<div class="row">
		<div class="row-welcome">Welcome</div>
	</div>

	<div class="row">
		<div class="hexagon">
		  <div class="hexTop"></div>
		  <div class="hexBottom"></div>
		</div>
	</div>

	<div class="row">
		<div class="iris-red-label">
			<?php echo CHtml::link($userInfo->first_name.' '.$userInfo->last_name, Yii::app()->createUrl('site/profile/'.$userInfo->id)); ?>
		</div>
		<div class="row-cap">
			<?php echo strtoupper($userInfo->caps); ?>
		</div>
		<div class="row-logout">
			<?php echo CHtml::link('Logout', Yii::app()->createUrl('site/logout'), array('class'=>'iris-link')); ?>
		</div>
	</div>
</div>