<?php
/* @var $this ProTipoController */
/* @var $model proTipo */

$this->breadcrumbs=array(
	'Pro Tipos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Tipo Producto', 'url'=>array('index')),
	array('label'=>'Crear Tipo Producto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pro-tipo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Administrar Tipos productos</h1>


<?php #echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pro-tipo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		#'id_tipo',
		'nombre',
		'descripcion',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</article>
</section>
