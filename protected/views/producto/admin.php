<?php
/* @var $this ProductoController */
/* @var $model Producto 

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	array('label'=>'Listar Producto', 'url'=>array('index')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('producto-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Administrar Productos</h1>

<?php #echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'producto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		#'id_producto',
		'nombre',
		array(
			'name'=>'id_tipo',
			'value'=>'$data->idTipo->nombre',
		),
		/*
		'id_tipo',
		'descripcion',
		'descripcion_general',
		*/
		'imagen',
		array(
			'name'=>'stock',
			'value'=>'$data->stock." ".$data->idUm->nombre',
		),
		/*
		'stock',
		'id_um',
		
		'precio',
		'id_activo',
		*/
		array(
			'name'=>'precio',
			'value'=>'"$".number_format($data->precio)',
		),
		array(
			'name'=>'id_activo',
			'value'=>'$data->idActivo->nombre',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</article>
</section>
