<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/*
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id_usuario=>array('view','id'=>$model->id_usuario),
	'Update',
);
*/
$this->menu=array(
	array('label'=>'Listar Usuario', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Ver Usuario', 'url'=>array('view', 'id'=>$model->id_usuario)),
	array('label'=>'Administrar Usuario', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Actualizar usuario <?php echo $model->usuario; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</article>
</section>