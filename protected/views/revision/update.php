<?php
/* @var $this RevisionController */
/* @var $model Revision */

$this->breadcrumbs=array(
	'Revisions'=>array('index'),
	$model->id_revision=>array('view','id'=>$model->id_revision),
	'Update',
);

$this->menu=array(
	array('label'=>'List Revision', 'url'=>array('index')),
	array('label'=>'Create Revision', 'url'=>array('create')),
	array('label'=>'View Revision', 'url'=>array('view', 'id'=>$model->id_revision)),
	array('label'=>'Manage Revision', 'url'=>array('admin')),
);
?>

<h1>Update Revision <?php echo $model->id_revision; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>