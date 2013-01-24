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
  	<h1>Últimas Ventas</h1>
  	<fieldset>
  	<table style="width:100%">
  		<thead>
  			<tr>
  				<th>Rut</th>
  				<th>Fecha</th>
  				<th>Precio</th>
  				<th>&nbsp;</th>
  			</tr>
  		</thead>
  		<tbody>
  	<?PHP foreach($model as $m){ ?>
  		<tr>
  			<td><?php echo CHtml::link($m->rut, array('/persona/datos/'.$m->rut), array('class'=>'rut')); ?></td>
  			<td><?PHP echo $this->fecha($m->fecha); ?></td>
  			<td><?PHP echo $this->precio($m->total); ?></td>
  			<td><?php echo CHtml::link('Revisar', array('/venta/revisarid/'.$m->id_venta), array()); ?></td>
  		</tr>
  	<?PHP } ?>
  		</tbody>
  	</table>
  	</fieldset>
  	<div id="carga" style="display:none" title="Datos De La Persona"></div>
  	<script type="text/javascript">
	$('.rut').on('click', function(){
		$('#carga').html('').load($(this).attr('href')).dialog({
			width: 500,
			height: 300,
		});
		return false;
	});
  	</script>
  </article>
</section>