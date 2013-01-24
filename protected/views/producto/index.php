<?php
/* @var $this ProductoController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Productos',
);
*/

$this->menu=array(
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Administrar Producto', 'url'=>array('admin')),
);

?>

<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Productos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
	</article>
</section>
