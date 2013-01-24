<?php
/* @var $this MovimientosController */
/* @var $model Movimientos */

$this->breadcrumbs=array(
	'Movimientoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Movimientos', 'url'=>array('index')),
	array('label'=>'Crear Movimiento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('movimientos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Administrar Movimientos</h1>


<?php #echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'movimientos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		#'id_movimientos',
		#'id_cajones',
		array(
			'name'=>'id_cajones',
			'value'=>'$data->idCajones->codigo_barra',
		),
		'fecha_movimiento',
		'gps_altitud',
		'gps_longitud',
		'gps_altura',
		#'origen',
		array(
			'name'=>'origen',
			'value'=>'$data->origen0->nombre',
		),
		#'destino',
		array(
			'name'=>'destino',
			'value'=>'$data->destino0->nombre',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</article>
</section>
