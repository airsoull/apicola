<?php

$this->renderPartial('_menu');

?>

<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Productos</h1>
	<?PHP
		foreach ($model as $m) {
			?>
			<h2><?php echo CHtml::link($m->fecha, array('/producto/anio/'.$m->fecha), array('optionName'=>'optionValue')); ?></h2>
		<?PHP }
	?>
	</article>
</section>