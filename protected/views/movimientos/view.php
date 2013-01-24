<?php
/* @var $this MovimientosController */
/* @var $model Movimientos */

$this->breadcrumbs=array(
	'Movimientoses'=>array('index'),
	$model->id_movimientos,
);

$this->menu=array(
	array('label'=>'Listar Movimientos', 'url'=>array('index')),
	array('label'=>'Crear Movimientos', 'url'=>array('create')),
	array('label'=>'Actualizar Movimientos', 'url'=>array('update', 'id'=>$model->id_movimientos)),
	#array('label'=>' Movimientos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_movimientos),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Movimientos', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Movimientos</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		#'id_movimientos',
		#'id_cajones',
		array(
			'name'=>'id_cajones',
			'value'=>$model->idCajones->codigo_barra,
		),
		'fecha_movimiento',
		'gps_altitud',
		'gps_longitud',
		'gps_altura',
		#'origen',
		array(
			'name'=>'origen',
			'value'=>$model->origen0->nombre,
		),
		#'destino',
		array(
			'name'=>'destino',
			'value'=>$model->destino0->nombre,
		),
	),
)); ?>
</article>
</section>