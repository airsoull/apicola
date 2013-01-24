<?php
/* @var $this MovimientosController */
/* @var $model Movimientos */

$this->breadcrumbs=array(
	'Movimientoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Movimientos', 'url'=>array('index')),
	array('label'=>'Administrar Movimientos', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Crear Movimiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</article>
</section>