<?php
/* @var $this ProTipoController */
/* @var $model proTipo */

$this->breadcrumbs=array(
	'Pro Tipos'=>array('index'),
	$model->id_tipo,
);

$this->menu=array(
	array('label'=>'Listar Tipo Producto', 'url'=>array('index')),
	array('label'=>'Crear Tipo Producto', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo Producto', 'url'=>array('update', 'id'=>$model->id_tipo)),
	array('label'=>'Eliminar Tipo Producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo),'confirm'=>'Esta seguro de eliminar este elemento?')),
	array('label'=>'Administrar Tipo Producto', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Tipo Producto "<?php echo $model->nombre; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		#'id_tipo',
		'nombre',
		'descripcion',
	),
)); ?>
</article>
</section>