<?php
/* @var $this ProTipoController */
/* @var $model proTipo */

$this->breadcrumbs=array(
	'Pro Tipos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Tipo Producto', 'url'=>array('index')),
	array('label'=>'Administrar Tipo Producto', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Crear Tipo producto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</article>
</section>