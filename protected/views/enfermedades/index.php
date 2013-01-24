<?php
/* @var $this EnfermedadesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Enfermedades',
);

$this->menu=array(
	array('label'=>'Crear Enfermedades', 'url'=>array('create')),
	array('label'=>'Administrar Enfermedades', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Enfermedades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</article>
</section>
