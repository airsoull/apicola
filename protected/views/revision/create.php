<?php
/* @var $this RevisionController */
/* @var $model Revision */

$this->breadcrumbs=array(
	'Revisions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Revisión', 'url'=>array('index')),
	array('label'=>'Administrar Revisión', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Crear Revisión</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</article>
</section>