<?php
/* @var $this CajonesController */
/* @var $model Cajones */

$this->breadcrumbs=array(
	'Cajones'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Cajones', 'url'=>array('index')),
	array('label'=>'Crear Cajones', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cajones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Administrar Cajones</h1>

<?php #echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cajones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		#'id_cajones',
		'codigo_barra',
		'descripcion',
		'cantidad_marcos',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</article>
</section>
