<?php
/* @var $this ProTipoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pro Tipos',
);

$this->menu=array(
	array('label'=>'Crear Tipo Producto', 'url'=>array('create')),
	array('label'=>'Administrar Tipo Producto', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Tipos productos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</article>
</section>
