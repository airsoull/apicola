<?php
/* @var $this CajonesController */
/* @var $model Cajones */

$this->breadcrumbs=array(
	'Cajones'=>array('index'),
	$model->id_cajones,
);

$this->menu=array(
	array('label'=>'Listar Cajones', 'url'=>array('index')),
	array('label'=>'Crear Cajones', 'url'=>array('create')),
	array('label'=>'Actualizar Cajones', 'url'=>array('update', 'id'=>$model->id_cajones)),
	array('label'=>'Borrar Cajones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cajones),'confirm'=>'Esta seguro que dese eliminar este elemento?')),
	array('label'=>'Administrar Cajones', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Cajón <?php echo $model->codigo_barra; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		#'id_cajones',
		'codigo_barra',
		'descripcion',
		'cantidad_marcos',
	),
)); ?>
</article>
</section>
