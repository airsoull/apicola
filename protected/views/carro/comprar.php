<?PHP if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1){ ?>
<section id="page-title">
	<h1>Comprar</h1>
</section>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'dato'=>$dato)); ?>
<?PHP }else{
	$this->redirect(array('/usuario/cuenta'));
} ?>