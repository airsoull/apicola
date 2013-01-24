<?php
/* @var $this MovimientosController */
/* @var $model Movimientos */

$this->breadcrumbs=array(
	'Movimientoses'=>array('index'),
	$model->id_movimientos=>array('view','id'=>$model->id_movimientos),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Movimientos', 'url'=>array('index')),
	array('label'=>'Crear Movimientos', 'url'=>array('create')),
	array('label'=>'Ver Movimientos', 'url'=>array('view', 'id'=>$model->id_movimientos)),
	array('label'=>'Administrar Movimientos', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Actualizar Movimiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</article>
</section>