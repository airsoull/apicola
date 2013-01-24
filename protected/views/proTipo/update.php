<?php
/* @var $this ProTipoController */
/* @var $model proTipo */

$this->breadcrumbs=array(
	'Pro Tipos'=>array('index'),
	$model->id_tipo=>array('view','id'=>$model->id_tipo),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Tipo Producto', 'url'=>array('index')),
	array('label'=>'Crear Tipo Producto', 'url'=>array('create')),
	array('label'=>'Ver Tipo Producto', 'url'=>array('view', 'id'=>$model->id_tipo)),
	array('label'=>'Administrar Tipo Producto', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Actualizar <?php echo $model->nombre; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</article>
</section>