<?php
/* @var $this RevisionController */
/* @var $model Revision */

$this->breadcrumbs=array(
	'Revisions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Revisión', 'url'=>array('index')),
	array('label'=>'Crear Revisión', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('revision-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Administrar Revisión</h1>

<?php #echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'revision-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		#'id_revision',
		#'id_cajones',
		array(
			'name'=>'id_cajones',
			'value'=>'$data->idCajones->codigo_barra',
		),
		'fecha_revision',
		'observacion',
		#'id_estado',
		array(
			'name'=>'id_estado',
			'value'=>'$data->idEstado->nombre',
		),
		#'id_comunas',
		array(
			'name'=>'id_comunas',
			'value'=>'$data->idComunas->nombre',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</article>
</section>
