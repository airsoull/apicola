<?php
/* @var $this CajonesController */
/* @var $model Cajones */

$this->breadcrumbs=array(
	'Cajones'=>array('index'),
	$model->id_cajones=>array('view','id'=>$model->id_cajones),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Cajones', 'url'=>array('index')),
	array('label'=>'Crear Cajones', 'url'=>array('create')),
	array('label'=>'Ver Cajones', 'url'=>array('view', 'id'=>$model->id_cajones)),
	array('label'=>'Administrar Cajones', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Actualizar Cajón <?php echo $model->codigo_barra; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</article>
</section>