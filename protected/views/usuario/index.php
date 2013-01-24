<?php
/* @var $this UsuarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Administrar Usuario', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<div id="carga" title="Datos Básicos Del Usuario" style="display:none;"></div>

<script type="text/javascript">
	$('.persona').on('click', function(){
		$href = $(this).attr('href');
		$('#carga').load($href);
		$('#carga').dialog({
			width: 600,
			height: 400,
		});
		return false;
	});
</script>

</article>
</section>
