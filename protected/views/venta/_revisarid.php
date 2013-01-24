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
  	<h1>Venta</h1>
  	<fieldset>
      <legend>Usuario</legend>
      Usuario: <?PHP echo $usuario->usuario; ?><br>
      Email: <?php echo $usuario->mail; ?><br>
      Fecha De Ingreso: <?php echo $this->fecha($usuario->fecha_ingreso); ?>
    </fieldset>
    <fieldset>
      <legend>Persona</legend>
      Nombre: <?PHP echo ucwords($persona->nombre.' '.$persona->apellido); ?><br>
      Rut: <?php echo $this->rut($persona->rut, $persona->dv) ?><br>
      Regiones: <?PHP echo $persona->idRegiones->nombre ?><br>
      Comuna:&nbsp;<?PHP echo ucwords(strtolower($persona->idComunas->nombre)); ?><br>
      Dirección: <?PHP echo $persona->direccion; ?><br>
      Teléfono: <?PHP echo $persona->telefono; ?>
    </fieldset>
    <fieldset>
      <legend>Compra</legend>
      <table style="width:100%">
        <thead>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Total</th>
        </thead>
        <tbody>
      <?PHP foreach ($detalle as $d) { ?>
        <tr>
          <td><?PHP echo $d->idProducto->nombre; ?></td>
          <td><?PHP echo $d->cantidad ?></td>
          <td><?PHP echo $this->precio($d->total) ?></td>
        </tr>
      <?PHP } ?>
      </tbody>
      </table>
    </fieldset>
    <fieldset>
      <legend>Revisar</legend>
      <?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'venta-form',
  'enableAjaxValidation'=>false,
)); ?>
  <?php echo $form->errorSummary($venta); ?>

  <div class="row">
  <?php echo $form->labelEx($venta,'revisado'); ?><br>
  <?php echo $form->dropDownList($venta,'revisado', Chtml::listData(Activo::model()->findAll(), 'id_activo', 'nombre')); ?>
    <?php echo $form->error($venta,'revisado'); ?>
  </div>
  <div class="row buttons">
    <?php echo CHtml::submitButton($venta->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'button')); ?>
  </div>
<?php $this->endWidget(); ?>
    </fieldset>
  </article>
</section>