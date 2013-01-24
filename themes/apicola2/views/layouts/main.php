<!DOCTYPE html>
<!--[if (gt IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
<meta name="viewport" content="width=device-width"/>
<?php
                $cs=Yii::app()->clientScript;
                $cs->scriptMap=array(
                        'jquery.js'=>false,
                        'jquery.ajaxqueue.js'=>false,
                        'jquery.metadata.js'=>false,
                );
                ?>
                
                <script type="text/javascript" src="<?PHP echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.8.1.js"></script>
                
                <?PHP
                #CGoogleApi::$bootstrapUrl = Yii::app()->theme->baseUrl.'/js/jquery-1.8.1.js'; // override default to work with SSL
                #echo CGoogleApi::init(); 
                
        ?>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="description" content=""/>
<meta name="author" content="trendyWebStar"/>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" media="screen"/>
<!--MAIN CSS FILE-->
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/yellow-dark-layout.css" media="screen"/>
<!--COLOR LAYOUT CSS FILE, CHANGE WITH YOUR DESIRABLE COLOR LAYOUT-->
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" media="screen"/>
<!--BOOTSTRAP CSS FILE-->
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/flexslider.css" media="screen"/>
<!--FLEX SLIDER CSS-->
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/prettyPhoto.css" media="screen"/>
<!--PRETTYPHOTO CSS-->
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mediaelementplayer.min.css" media="screen"/>
<!--AUDIO / VIDEO PLAYER CSS-->
<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.gif"/>
<!--JS FILES STARTS-->

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.8.1.js"></script>

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>window.jQuery || document.write('<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"><\/script>')</script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script>
<!--CUSTOM JS CODE-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>
<!--JS PLUGINS THAT SMALLISH USES-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-1.8.21.custom.min.js"></script>
<!--JQUERY UI-->
</head>
<body>
<div id="wrapper" class="bg6">
	<div id="top-panel-wrapper">
		<div class="container">
			<p>
				<?php echo CHtml::textField('name', 'value', array('optionName'=>'optionValue')); ?>
			</p>
			<a href="#" class="top-panel-switcher" id="slideUp">Carrito de compras</a>
		</div>
	</div>
	<div id="center-container">
		<div id="container">
			<header id="header">
			<div id="logo-wrapper">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php" id="logo">
				<div class="logo">
					Smallish Home
				</div>
				<div id="logo-sub-text">
					Responsive HTML Template
				</div>
				</a>
			</div>
			<div id="navigation-wrapper">
				<nav id="main-navigation">
				<!--  MAIN  NAVIGATION-->
				<ul class="main-menu">
					<li><?php echo CHtml::link('Inicio', array('/index.php'), array('optionName'=>'optionValue')); ?>
					</li>
					<li><?php echo CHtml::link('Tu Cuenta', array('usuario/cuenta'), array('optionName'=>'optionValue')); ?>
					<ul>
						<li><a href="inner-page.html">Inner Page</a></li>
						<li><a href="elements.html">Elements</a></li>
						<li><a href="columns.html">Columns</a></li>
						<li><a href="fullwidth.html">Fullwidth</a></li>
						<li><a href="pricing-table.html">Pricing Table</a></li>
						<li><a href="404-error.html">404 Error Page</a></li>
					</ul>
					</li>
					<li><a href="#">Productos</a>
					<ul>
						<li><a href="portfolio-two-columns.html">2 Columns Portfolio</a></li>
						<li><a href="portfolio-three-columns.html">3 Columns Portfolio</a></li>
						<li><a href="portfolio-three-columns-2.html">3 Columns Portfolio 2</a></li>
						<li><a href="portfolio-three-columns-white.html">3 Columns White</a></li>
						<li><a href="portfolio.html">4 Columns Portfolio (Default)</a></li>
						<li><a href="portfolio-white.html">4 Columns Portfolio (White)</a></li>
						<li><a href="portfolio-four-columns-2.html">4 Columns Portfolio 2</a></li>
						<li><a href="portfolio-four-columns-3.html">4 Columns Portfolio Circle 1</a></li>
						<li><a href="portfolio-circle.html">4 Columns Portfolio Circle 2</a></li>
						<li><a href="portfolio-circle-2.html">4 Columns Portfolio Circle 3</a></li>
						<li><a href="gallery.html">Gallery</a></li>
						<li><a href="portfolio-details.html">Portfolio Details</a></li>
						<li><a href="portfolio-details-2.html">Portfolio Details 2</a></li>
					</ul>
					</li>
					<li><a href="#">Blog</a>
					<ul>
						<li><a href="blog-1.html">Blog Layout 1</a></li>
						<li><a href="blog-2.html">Blog Layout 2</a></li>
						<li><a href="blog-3.html">Blog Layout 3</a></li>
						<li><a href="blog-4.html">Blog Layout 4</a></li>
						<li><a href="blog-5.html">Blog Layout 5</a></li>
						<li><a href="blog-post.html">Blog Post</a></li>
					</ul>
					</li>
					<li><a href="contact.html">Contacto</a></li>
				</ul>
				</nav>
			</div>
			<style type="text/css">
				#carrito{
					margin-bottom: 0px;
				}
			</style>
			<div id="carrito">Carrito</div>
			</header>
			<div id="post-header-panel" style="display:none">
				<div class="two-third">
					<h1>we build <span class="colored-text">rock solid</span> Web sites & design <span class="colored-text">awesome</span> user interfaces</h1>
					<h4>The clean responsive theme perfect for creative freelance designer</h4>
				</div>
				<div class="one-third last">
					<div class="post-header-button">
						<a href="#" class="button big round">Buy This Template For 15$</a>
					</div>
				</div>
			</div>

			<?php echo $content; ?>


			<div id="footer-wrapper">
				<div id="footer">
					<div class="one-fourth">
						<h4>Acerca de nosotros</h4>
						<p>
							Nacida hace más de 10 años nuestra apícola cuenta productos de primera calidad entregando siempre lo mejor de cada trabajador hemos logrado posicionarnos como uno de los grandes en este rubro.
						</p>
						<p>
							Siguiendo antiguos pasos de fabricación y crianza hemos logrado siempre productos de altisima calidad
						</p>
						<ul class="social-widget">
							<li class="twitter"><a href="#">Twitter</a></li>
							<li class="facebook"><a href="#">Facebook</a></li>
							<li class="rss"><a href="#">RSS feeds</a></li>
							<li class="dribbble"><a href="#">Dribbble</a></li>
							<li class="vimeo"><a href="#">Vimeo</a></li>
						</ul>
					</div>
					<div class="one-fourth">
						<h4>Redes sociales</h4>
						<ul>
							<li><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
						
	 <div class="fb-like" data-send="false" data-layout="button_count" data-width="150" data-show-faces="true"></div>

						</li>
						<br>
						<li>
							<a href="https://twitter.com/share" class="twitter-share-button" data-via="airsoull" data-lang="es">Twittear</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

						</li>
						<br>
						<li>
							<!-- Coloca esta etiqueta donde quieras que se muestre el botón +1. -->
<g:plusone></g:plusone>

<!-- Coloca esta petición de presentación donde creas oportuno. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
						</li>

						</ul>
					</div>
					<div class="one-fourth">
						<h4>Últimos Twits</h4>
						<div class="twitter-feeds">
						</div>
					</div>
					<div class="one-fourth last">
						<h4>FLICKR PHOTOS</h4>
						<div class="flickr-feeds">
						</div>
					</div>
				</div>
				<div id="copyrights-wrapper">
					<div id="copyrights">
						<div class="one-half">
							 Copyright &copy; <?PHP echo date('Y'); ?> <a href="mailto:cris.andrs@gmail.com" target="_blank">Cristian Sepúlveda</a>.
						</div>
						<div class="one-half last">
							<a href="http://www.twitter.com/airsoull">Twitter</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--MAIN CONTAINER ENDS -->
		<div id="logo-bottom-wrapper">
			<a href="#" id="logo-bottom">Smallish - Responsive HTML5 Template</a>
		</div>
	</div>
	<!--CENTER CONTAINER ENDS -->
</div>
<!--WRAPPER ENDS -->
</body>
</html>