<?php
$this->breadcrumbs=array(
		'G people',
);

$this->menu=array(
		array('label'=>'Home','url'=>array('/m1/gLeave')),
		//array('label'=>'Manage gPerson','url'=>array('admin')),
);


//$this->menu1=gLeave::getTopUpdated();
//$this->menu2=gLeave::getTopCreated();
$this->menu5=array('Leave');

?>

<div class="pull-right">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
	)); ?>
</div>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		Leave
	</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
		'stacked'=>false, // whether this is a stacked menu
		'items'=>array(
				array('label'=>'Waiting for Approval','url'=>Yii::app()->createUrl('/m1/gLeave')),
				array('label'=>'Approved Leave','url'=>Yii::app()->createUrl('/m1/gLeave/onApproved')),
				array('label'=>'Pending State','url'=>Yii::app()->createUrl('/m1/gLeave/onPending')),
				array('label'=>'Employee On Leave','url'=>Yii::app()->createUrl('/m1/gLeave/onLeave'),'active'=>true),
				array('label'=>'Recent Leave','url'=>Yii::app()->createUrl('/m1/gLeave/onRecent')),
		),
));
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'g-person-grid',
		'dataProvider'=>gLeave::model()->onLeave(),
		//'filter'=>$model,
		'template'=>'{items}',
		'columns'=>array(
				array(
						'header'=>'Name',
						'type'=>'raw',
						'value'=>'CHtml::link($data->person->employee_name,Yii::app()->createUrl("/m1/gLeave/view",array("id"=>$data->parent_id)))',
				),
				array(
					'header'=>'Department',
					'name'=>'person.company.department.name',
				),
				'start_date',
				'end_date',
				'number_of_day',
				'balance',
		),
)); ?>
