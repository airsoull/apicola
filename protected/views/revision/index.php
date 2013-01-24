<?php
/* @var $this RevisionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Revision',
);

$this->menu=array(
	array('label'=>'Crear Revision', 'url'=>array('create')),
	array('label'=>'Administrar Revisión', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Revisión</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</article>
</section>
