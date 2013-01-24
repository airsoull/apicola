<!DOCTYPE HTML>
<html lang="es">
<head>
	<?php
                $cs=Yii::app()->clientScript;
                $cs->scriptMap=array(
                        'jquery.js'=>false,
                        'jquery.ajaxqueue.js'=>false,
                        'jquery.metadata.js'=>false,
                );
                ?>
                <script type="text/javascript" src="/apicola/themes/apicola/js/jquery-1.8.1.js"></script>
                <?PHP
                #CGoogleApi::$bootstrapUrl = Yii::app()->theme->baseUrl.'/js/jquery-1.8.1.js'; // override default to work with SSL
                #echo CGoogleApi::init(); 
                
        ?>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skins/gray.css" title="gray">

<link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skins/orange.css" title="orange">
<link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skins/red.css" title="red">
<link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skins/green.css" title="green">
<link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skins/purple.css" title="purple">
<link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skins/yellow.css" title="yellow">
<link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skins/black.css" title="black">
<link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skins/blue.css" title="blue">

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/superfish.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/uniform.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.wysiwyg.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/facebox.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery-ui-1.8.23.custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/colorbox.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/lightbox.css">
<!--[if lte IE 8]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/selectivizr.js"></script>
<script type="text/javascript" src="js/excanvas.min.js"></script>
<![endif]-->

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-1.8.23.custom/js/jquery-ui-1.8.23.custom.min.js"></script>
<!--<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-1.8.8.custom.min.js"></script>-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.colorbox.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/Delicious_500.font.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flot.min.js"></script>
<!--<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script>-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/facebox.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/switcher.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/lightbox.js"></script>

<!--
<script type="text/javascript">

jQuery(function($) {

	/* flot
	------------------------------------------------------------------------- */
	var d1 = [[1293814800000, 17], [1293901200000, 29], [1293987600000, 34], [1294074000000, 46], [1294160400000, 36], [1294246800000, 16], [1294333200000, 36]];
    var d2 = [[1293814800000, 20], [1293901200000, 75], [1293987600000, 44], [1294074000000, 49], [1294160400000, 56], [1294246800000, 23], [1294333200000, 46]];
    var d3 = [[1293814800000, 32], [1293901200000, 42], [1293987600000, 59], [1294074000000, 57], [1294160400000, 47], [1294246800000, 56], [1294333200000, 59]];

	$.plot($('#pageviews'), [
        { label: 'Unique',  data: d1},
        { label: 'Pages',  data: d2},
        { label: 'Hits',  data: d3}
    ], {
		series: {
			lines: { show: true },
			points: { show: true }
		},
		xaxis: {
			mode: 'time',
			timeformat: '%b %d'
		}
	});

});
</script>
-->
</head>
<body>

<header id="top">
	<div class="container_12 clearfix">
		<div id="logo" class="grid_5">
			<!-- replace with your website title or logo -->
			<?php echo CHtml::link('Apicola', array('/admin'), array('id'=>'site-title')); ?>
			<!--<a id="site-title" href=""><span>Api</span>cola</a>-->
			<?php echo CHtml::link('Ver Sitio', array('/index.php'), array('id'=>'view-site')); ?>
		</div>
		
		<div class="grid_4" id="colorstyle">
			
			<div>Change Color</div>
			<a href="#" rel="blue"></a>
			<a href="#" rel="green"></a>
			<a href="#" rel="red"></a>
			<a href="#" rel="purple"></a>
			<a href="#" rel="orange"></a>
			<a href="#" rel="yellow"></a>
			<a href="#" rel="black"></a>
			<a href="#" rel="gray"></a>
			
		</div>
		
		<div id="userinfo" class="grid_3">
			Bienvenido, <a href="#"><?PHP echo Yii::app()->user->name ?></a>
		</div>
	</div>
</header>

<nav id="topmenu">
	<div class="container_12 clearfix">
		<div class="grid_12">
			<ul id="mainmenu" class="sf-menu">
				<li><?php echo CHtml::link('Inicio', array('/admin')); ?></li>
				<li>
					<?php echo CHtml::link('Productos', array('/producto')); ?>
					<ul>
						<li><?php echo CHtml::link('Productos', array('/producto')); ?></li>
						<li><?php echo CHtml::link('Tipo', array('/proTipo')); ?></li>
						<li><?php echo CHtml::link('Detalle', array('/producto/detalle')); ?></li>
					</ul>
				</li>
				<li><?php echo CHtml::link('usuarios', array('/usuario')); ?></li>
				<li><?php echo CHtml::link('Ventas', array('/venta'), array('optionName'=>'optionValue')); ?>
					<ul>
						<li><?php echo CHtml::link('Ventas No Revisadas', array('/venta/revisar'), array('optionName'=>'optionValue')); ?></li>
					</ul>
				</li>
				<li><?php echo CHtml::link('Cajones', array('/cajones'), array('optionName'=>'optionValue')); ?>
					<ul>
						<li><?php echo CHtml::link('Revisión', array('/revision'), array('optionName'=>'optionValue')); ?></li>
						<li><?php echo CHtml::link('Enfermedades', array('/enfermedades'), array('optionName'=>'optionValue')); ?></li>
						<li><?php echo CHtml::link('Movimientos', array('/movimientos'), array('optionName'=>'optionValue')); ?></li>
					</ul>
				</li>
			</ul>
			<ul id="usermenu">
				<!--
				<li><a href="#" class="inbox">Inbox (3)</a></li>
				-->
				<li><?php echo CHtml::link('Salir', array('site/logout'), array('optionName'=>'optionValue')); ?></li>
			</ul>
		</div>
	</div>
</nav>

<section id="content">
	<section class="container_12 clearfix">





		


		<?php echo $content; ?>



		
	</section>
</section>

<footer id="bottom">
	<section class="container_12 clearfix">
		<div class="grid_6">
			
		</div>
		<div class="grid_6 alignright">
			Copyright &copy; <?PHP echo date('Y'); ?>
		</div>
	</section>
</footer>

</body>
</html>