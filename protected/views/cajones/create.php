<?php
/* @var $this CajonesController */
/* @var $model Cajones */

$this->breadcrumbs=array(
	'Cajones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Cajones', 'url'=>array('index')),
	array('label'=>'Administrar Cajones', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Create Cajones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</article>
</section>