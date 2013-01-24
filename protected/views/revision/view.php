<?php
/* @var $this RevisionController */
/* @var $model Revision */

$this->breadcrumbs=array(
	'Revisions'=>array('index'),
	$model->id_revision,
);

$this->menu=array(
	array('label'=>'Listar Revisión', 'url'=>array('index')),
	array('label'=>'Crear Revisión', 'url'=>array('create')),
	array('label'=>'Actualizar Revisión', 'url'=>array('update', 'id'=>$model->id_revision)),
	#array('label'=>'Delet Revisión', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_revision),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Revisión', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Revisión</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		#'id_revision',
		#'id_cajones',
		array(
			'name'=>'id_cajones',
			'value'=>$model->idCajones->codigo_barra,
		),
		'fecha_revision',
		'observacion',
		#'id_estado',
		array(
			'name'=>'id_estado',
			'value'=>$model->idEstado->nombre,
		),
		#'id_comunas',
		array(
			'name'=>'id_comunas',
			'value'=>$model->idComunas->nombre,
		),
	),
)); ?>
</article>
</section>
