<section id="page-title">
	<h1>Carrito De Compras</h1>
</section>


<?PHP if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1){ ?>
<div id ="carro">
<table>
	<thead>
		<tr>
			<th>Producto</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Total</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
	<?PHP  
		$total = 0;
		foreach($_SESSION['carrito'] as $c){
	 ?>
		<tr>
			<td><?php echo CHtml::link($c['nombre'], array('/productos/'.$c['id_producto']), array('optionName'=>'optionValue')); ?></td>
			<td><?PHP echo '$'.number_format($c['precio']); ?></td>
			<td>
				<?php $imagen = CHtml::image(Yii::app()->theme->baseUrl.'/img/basket_put.png', 'Borrar', array('pro'=>$c['id_producto'], 'id'=>'resta', 'precio'=>$c['precio'])); ?>
				<?php echo CHtml::link($imagen, 'javascript:void(0)', array()); ?>
				<input type="text" pro="<?PHP echo $c['id_producto'] ?>" value="<?PHP echo $c['stock'] ?>" style="border:0px" size="2" maxlength="2" dinero="<?PHP echo $c['precio']; ?>" id="cantidad" readonly>
				<?php $imagen = CHtml::image(Yii::app()->theme->baseUrl.'/img/basket_remove.png', 'Borrar', array('pro'=>$c['id_producto'], 'id'=>'suma', 'precio'=>$c['precio'])); ?>
				<?php echo CHtml::link($imagen, 'javascript:void(0)', array()); ?>
				
			</td>
			<td>$<input type="text" name="<?PHP echo $c['id_producto'] ?>" value="<?PHP $stock = $c['stock']; $precio = $c['precio']; echo $suma = $stock*$precio; $total = $total + $suma; ?>" id="total" style="width:50px;height:1px;border:0px;" readonly></td>
			<td>
				<?php $imagen = CHtml::image(Yii::app()->theme->baseUrl.'/img/cart_delete.png', 'Borrar', array('id'=>'eliminar', 'pro'=>$c['id_producto'])); ?>
				<?php echo CHtml::link($imagen, array('/carro/eliminar/'.$c['id_producto']), array('optionName'=>'optionValue')); ?></td>
		</tr>
	<?PHP }  ?>
	<tr>
		<td colspan="3">Total:</td>
		<td>$<input type="text" style="border:0px;width:60px;height:1px;font-weight:bold;" value="<?PHP echo $total ?>" id="sumaT" readonly></td>
		<td></td>
	</tr>
	</tbody>
</table>

<br><br>

<div style="margin-left: auto;margin-right:auto;width:50%;">
	<span style="float:right">

		<?PHP 
		if(Yii::app()->user->isGuest){
                    ?>
                    <?php echo CHtml::link('Ingresa', array('/site/login?red=carro'), array('optionName'=>'optionValue')); ?>&nbsp;o&nbsp;<?php echo CHtml::link('Registrate', array('usuario/crear'), array('optionName'=>'optionValue')); ?>&nbsp;Para poder comprar
                    <?PHP
                }else{
                    ?>
                    <?php echo CHtml::link('<span>Comprar</span>', array('/carro/comprar'), array('class'=>'btn-big style-color')); ?>
                    <br><br><br>
                    <?PHP
                }
		?>

	</span>
</div>
</div>
<?PHP }else{
	?>
	<h2 style="text-align:center;">No tiene productos en el carro de compras</h2>
	<?PHP
} ?>

<div id="carga"></div>

<script type="text/javascript">

	$('a').on('click', function(){
		var $id = $(this).find('img').attr('id');
		var $pro = $(this).find('img').attr('pro');
		var $precio = $(this).find('img').attr('precio');
		var $input = $('input:text[pro='+$pro+']');
		var $total = $('input:text[name='+$pro+']');
		var $valor = $input.val();
		var $carga = $('#carga');
		var $sumas = $('#sumaT');
		if($id == 'resta'){
			if($valor > 1){
				$stock = parseInt($valor) - parseInt(1);
				$input.val($stock);
				$carga.load("<?PHP echo Yii::app()->request->baseUrl ?>/carro/restar/"+$pro);
				$resta = parseInt($total.val()) - parseInt($precio);
				$total.val($resta);
				$restaT = parseInt($sumas.val()) - parseInt($precio);
				$sumas.val($restaT);
			}
		}
		if($id == 'suma'){
			$stock = parseInt($valor) + parseInt(1);
			$input.val($stock);
			$carga.load("<?PHP echo Yii::app()->request->baseUrl ?>/carro/sumar/"+$pro);
			$suma = parseInt($total.val()) + parseInt($precio);
			$total.val($suma);
			$sumaT = parseInt($sumas.val()) + parseInt($precio);
			$sumas.val($sumaT);
		}
	});

</script>

<br><br>