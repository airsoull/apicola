<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->id_producto,
);

$this->menu=array(
	array('label'=>'Listar Producto', 'url'=>array('index')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Actualizar Producto', 'url'=>array('update', 'id'=>$model->id_producto)),
	array('label'=>'Borrar Producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_producto),'confirm'=>'Está seguro de eliminar este elemento?')),
	array('label'=>'Administrar Producto', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Producto <?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		#'id_tipo',
		array(
			'name'=>'id_tipo',
			'value'=>$model->idTipo->nombre,
		),
		'descripcion',
		'descripcion_general',
		'imagen',
		#'stock',
		array(
			'name'=>'stock',
			'value'=>$model->stock." ".$model->idUm->nombre,
		),
		#'id_um',
		#'precio',
		array(
			'name'=>'precio',
			'value'=>"$".number_format($model->precio),
		),
		array(
			'name'=>'id_activo',
			'value'=>$model->idActivo->nombre,
		),
	),
)); ?>
</article>
</section>
