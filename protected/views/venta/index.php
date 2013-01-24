<?php
/* @var $this VentaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ventas',
);

$this->renderPartial('_menu');
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Ventas</h1>

<?php /* $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */ ?>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Semanal</a></li>
		<li><a href="#tabs-2">Mensual</a></li>
		<li><a href="#tabs-3">Anual</a></li>
	</ul>
	<div id="tabs-1">
		<?PHP $this->renderPartial('_semana', array('semana'=>$semana)); ?>
	</div>
	<div id="tabs-2">
		<?PHP $this->renderPartial('_mes', array('mes'=>$mes)); ?>
	</div>
	<div id="tabs-3">
		<?PHP $this->renderPartial('_anio', array('anio'=>$anio)); ?>
	</div>
</div>

</article>
</section>

<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>
