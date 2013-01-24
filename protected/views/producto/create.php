<?php
/* @var $this ProductoController */
/* @var $model Producto */
/*
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	array('label'=>'Listar Producto', 'url'=>array('index')),
	array('label'=>'Administrar Producto', 'url'=>array('admin')),
);

?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Crear Producto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</article>
</section>