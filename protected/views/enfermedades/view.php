<?php
/* @var $this EnfermedadesController */
/* @var $model Enfermedades */

$this->breadcrumbs=array(
	'Enfermedades'=>array('index'),
	$model->id_enfermedades,
);

$this->menu=array(
	array('label'=>'Listar Enfermedades', 'url'=>array('index')),
	array('label'=>'Crear Enfermedades', 'url'=>array('create')),
	array('label'=>'Actualizar Enfermedades', 'url'=>array('update', 'id'=>$model->id_enfermedades)),
	array('label'=>'Borrar Enfermedades', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_enfermedades),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Enfermedades', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Enfermedad <?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		#'id_enfermedades',
		'nombre',
		'descripcion',
	),
)); ?>
</article>
</section>
