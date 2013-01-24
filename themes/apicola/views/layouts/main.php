<!DOCTYPE html>
<head>
    <meta charset="utf-8">
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
    <meta name="description" content="Moderna Responsive HTML5 Template">
    <meta name="author" content="pixel-industry">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link rel="icon" type="image/x-icon" href="favicon.ico" />  

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/960_12_col.css" media="screen" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/reset.css" media="screen" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" media="screen" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/anythingslider.css">
    <link rel="stylesheet" title="activestyle" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/orange.css" media="screen" /> <!--default blue color style-->  
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery-ui-1.8.23.custom.css">
    
    <!--[if IE 7]>
    <link rel="stylesheet" href="css/ie7.css" media="screen" />
    <![endif]-->
    <!--[if IE 8]>
    <link rel="stylesheet" href="css/ie8.css" media="screen" />
    <![endif]-->
    <!--[if IE 9]>
    <link rel="stylesheet" href="css/ie9.css" media="screen" />
    <![endif]-->
    
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Advent+Pro:400,300,100,200' rel='stylesheet' type='text/css'>

    <!-- js files -->
    <!--
    <script  src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.7.2.js"></script>
    -->
    <script  src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.tweetscroll.js"></script> <!-- jQuery tweetscroll plugin -->
    <script  src="<?php echo Yii::app()->theme->baseUrl; ?>/js/socialstream.jquery.js"></script> <!-- Social Networks Feeds -->
    <script  src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.easing.1.2.js"></script><!-- Anything Slider optional plugins -->
    <script  src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.anythingslider.min.js"></script><!-- Anything Slider -->    
    <script  src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.anythingslider.fx.min.js"></script><!-- Anything Slider optional FX extension -->   
    <script  src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.carouFredSel-5.6.4-packed.js"></script><!-- CarouFredSel carousel plugin -->
    <script  src="<?php echo Yii::app()->theme->baseUrl; ?>/js/portfolio.js"></script> <!-- portfolio custom options -->
    <script  src="<?php echo Yii::app()->theme->baseUrl; ?>/js/include.js"></script> <!-- jQuery custom options -->
	<script  src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.placeholder.min.js"></script><!-- jQuery placeholder fix for old browsers -->
    <script  src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-1.8.23.custom.min.js"></script><!-- jQuery placeholder fix for old browsers -->
    <!-- end js files -->
</head>

<body class="pattern16">
    
    <!-- page wrap start -->
    <div id="page-wrap">

        <!-- header wrapper start -->
        <section id="header-wrapper">

            <!-- header start -->
            <header id="header" class="clearfix">
                <div id="carrito">

                <?PHP 

                if(Yii::app()->user->isGuest){
                    ?>
                    <?php echo CHtml::link('Ingresa', array('/usuario/cuenta'), array('optionName'=>'optionValue')); ?>&nbsp;o&nbsp;<?php echo CHtml::link('Registrate', array('usuario/crear'), array('optionName'=>'optionValue')); ?>
                    <?PHP
                }else{
                    ?>
                    Bienvenido,&nbsp;<?php echo CHtml::link(Yii::app()->user->name, array('/usuario/cuenta'), array()); ?>
                    <?PHP
                }
                if(isset($_SESSION['carrito'])){
                    $carrito = count($_SESSION['carrito']);
                }else{
                    $carrito = 0;
                }
                ?>
                &nbsp;&nbsp;  
                <?php echo CHtml::image(Yii::app()->theme->baseUrl.'/img/cart.png', 'Carrito', array('width'=>'20px')); ?>&nbsp;Carrito de Compras&nbsp;(<?php echo CHtml::link($carrito, array('/carro'), array('optionName'=>'optionValue')); ?>)
                &nbsp;&nbsp;
                <?PHP 

                if(!Yii::app()->user->isGuest){ 
                    echo CHtml::link('Salir', array('site/logout'), array('optionName'=>'optionValue'));
                } ?>
                </div>
                <!-- logo start -->
                <section id="logo">
                    <?php echo CHtml::link('logo', array('/index.php'), array('optionName'=>'optionValue')); ?>
                </section><!-- logo end -->

                <!-- social icons start 
                <ul class="social">
                    
                    <li class="dribble">
                        <a href="#">dribble</a>
                    </li>

                    <li class="facebook">
                        <a href="#">facebook</a>
                    </li>

                    <li class="pinterest">
                        <a href="#">pinterest</a>
                    </li>

                    <li class="twitter">
                        <a href="#">twitter</a>
                    </li>
                
                </ul> social icons end -->

                <!-- main navigation container start -->
                <section id="nav-container">

                    <!-- main navigation start  -->
                    <nav id="nav">
                        <ul>
                            <li><?php echo CHtml::link('Inicio', array('/index.php'), array()); ?></li>
                            <li>
                                <?php echo CHtml::link('Tu cuenta', array('/usuario/cuenta'), array()); ?>
                            </li>
                            <li>
                                <?php echo CHtml::link('Productos', 'javascript:void(0)', array()); ?>
                                <ul>
                                    <?PHP 
                                    $tipo = Producto::model()->findAll('id_activo = 1 group by id_tipo');
                                    foreach ($tipo as $c) {
                                    ?>
                                    <li><?php echo CHtml::link($c->idTipo->nombre, array('/catalogo/'.$c->id_tipo), array('optionName'=>'optionValue')); ?></li>
                                    <?PHP } ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Contacto</a>
                            </li>
                        </ul> 
                    </nav><!-- main navigation end -->

                    <!-- responsive navigation start -->
                    <select id="nav-responsive">
                        <option selected="" value="">Menú</option>
                        <option value="index.html">Inicio</option>
                        <option value="about.html">Tu Cuenta</option>
                        <option value="about.html">Productos</option>
                        <option value="services.html">Contacto</option>
                        
                    </select> <!-- responsive navigation end -->

                    <!-- search start -->
                    <section id="search">
                        <form action="#" method="get">
                            <input id="search-bkg" type="text" placeholder="Buscar..." />
                            <input id="search-submit" type="submit" />
                        </form>
                    </section><!-- search end -->

                </section><!-- main navigation container end -->

            </header><!-- header end -->
        </section><!-- header wrapper end -->

        

        <?PHP echo $content ?>





        <!-- footer start -->
        <footer id="footer" class="clearfix">
            <section class="container_12">
                <div class="ruler"></div>

                <!-- text article start -->
                <article class="grid_3">
                    <h6>Acerca de nosotros</h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </article><!-- text article end -->

                <!-- tweeter feed start -->
                <article class="grid_3 tweets-feed">
                    <h6>Redes sociales</h6>
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
                    <div class="tweets-list-container">
                    </div>
                </article><!-- tweeter feed end -->

                <!-- Pinterest feed start -->
                <article class="grid_3 social-feed pinterest-feed">
                    <h6>Información aleatoria</h6>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </article><!-- Pinterest feed end -->
                <!-- contact section start -->
                <article class="grid_3">
                    <h6>CONTACTO</h6>
                    <p>Dirección: Calle 123</p>
                    <br />
                    <p>Telefóno: 123456789</p>
                    <br />
                    <a href="mailto:info@gmail.com">E-mail: info@mail.com</a>
                </article><!-- contact section end -->

                <div class="ruler bottom"></div>               
            </section>

            <!-- copyright start -->
            <section class="container_12 clearfix">
                <section class="copyright">
                    <p>Todos los derechos reservados 2012</p>
                    <a class="to-top-link"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/to-top.png" class="to-top" alt="back to top"/></a>
                </section>
            </section><!-- copyright end -->
        </footer><!-- footer end -->
    </div><!-- page wrap end -->

    <script>
        $(function(){
            $('#slides') // Using FX base effects 
            .anythingSlider({ 
                resizeContents      : true, 
                expand              : true,
                buildArrows         : false,  
                buildNavigation     : true,
                buildStartStop      : false,
                autoPlay            : false,
                delay: 5000
            }) 
            .anythingSliderFx({ 
                // base FX definitions 
                // '.selector' : [ 'effect(s)', 'size', 'time', 'easing' ] 
                // 'size', 'time' and 'easing' are optional parameters, but must be kept in order if added 
              
                '.panel1 .slide-img-container'  : [ 'left', '1040px', '1000', 'easeOutCirc' ],
                '.panel1 h3'  : [ 'right', '640px', '500', 'easeInOutCirc' ],
                '.panel1 p'  : [ 'right', '640px', '1000', 'easeInOutCirc' ],
                '.panel1 a'  : [ 'right', '640px', '1200', 'easeInOutCirc' ],
                '.panel2 .slide-img-container'  : [ 'bottom', '1040px', '1000', 'easeOutCirc' ],
                '.panel2 h3'  : [ 'top', '640px', '500', 'easeInOutCirc' ],
                '.panel2 p'  : [ 'top', '640px', '1000', 'easeInOutCirc' ],
                '.panel2 a'  : [ 'top', '840px', '1200', 'easeInOutCirc' ],
                '.panel3 blockquote'  : [ 'right', '640px', '100', 'easeInOutCirc' ],
                '.panel3 p'  : [ 'right', '640px', '1500', 'easeInOutCirc' ]
            }); 
            //	Variable number of visible items with variable sizes
            $('.carousel-li').carouFredSel({
                items: 4,
                height: 161,
                prev: '.prev',
                next: '.next',
                auto: false,
                scroll: 1
            });
            
        });
    </script>
</body>
</html>
