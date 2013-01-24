<?php
/* @var $this MovimientosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Movimientoses',
);

$this->menu=array(
	array('label'=>'Crear Movimientos', 'url'=>array('create')),
	array('label'=>'Administrar Movimientos', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Movimientos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<div id="carga" title="Mapa De Localización"></div>

<script type="text/javascript">
	$('.mapa').on('click', function(){
		$href = $(this).attr('href');
		$('#carga').load($href);
		$('#carga').dialog({
			width: 600,
			height: 500,
		});
		return false;
	});
</script>
</article>
</section>
