<?php
/* @var $this CajonesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cajones',
);

$this->menu=array(
	array('label'=>'Crear Cajones', 'url'=>array('create')),
	array('label'=>'Administrar Cajones', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Cajones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</article>
</section>
