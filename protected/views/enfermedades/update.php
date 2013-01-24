<?php
/* @var $this EnfermedadesController */
/* @var $model Enfermedades */

$this->breadcrumbs=array(
	'Enfermedades'=>array('index'),
	$model->id_enfermedades=>array('view','id'=>$model->id_enfermedades),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Enfermedades', 'url'=>array('index')),
	array('label'=>'Crear Enfermedades', 'url'=>array('create')),
	array('label'=>'Ver Enfermedades', 'url'=>array('view', 'id'=>$model->id_enfermedades)),
	array('label'=>'Administrar Enfermedades', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Actualizar Enfermedad <?php echo $model->nombre; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</article>
</section>