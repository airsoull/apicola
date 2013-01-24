<!-- slider start -->
        <article id="anything-slider">
            <div class="shadow-top"></div>
            <section id="slider-container">
                <ul id="slides"> 
                    <li class="panel1"> 
                        <section class="slide-elements"> 
                            <div class="slide-img-container">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/slider/slider.jpg" alt="Slider Image 1"> 
                                <div class="slider-img-shadow"></div>
                            </div>
                            <h3><span>{Miel}</span> | Nuevos precios</h3> 

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <a class="btn-big style-color" href="#">
                                <span>Ver</span>
                            </a>
                        </section> 
                    </li> 
                    <li class="panel2"> 
                        <section class="slide-elements"> 
                            <div class="slide-img-container img-float-right">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/slider/slider.jpg" alt="Slider Image 2"> 
                                <div class="slider-img-shadow"></div>
                            </div> 
                            <h3><span>{Cera}</span> | Productos</h3> 

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <a class="btn-big style-color" href="#">
                                <span>Ver</span>
                            </a>
                        </section> 
                    </li> 
                    <li class="panel3"> 
                        <section class="slide-elements"> 
                            <div class="slide-img-container">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/slider/slider.jpg" alt="Slider Image 3"> 
                                <div class="slider-img-shadow"></div>
                            </div>
                            <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</blockquote> 
                            <p> 
                                - <a href='http://quotesondesign.com/chikezie-ejiasi/'>Chikezie Ejiasi</a> 
                            </p> 
                        </section> 
                    </li> 
                    <li class="panel4 slider-img-full">
                        <section class="slide-elements"> 
                            <div class="slide-img-container">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/slider/slider-wide.jpg" alt="Slider Image 4">
                                <div class="slider-img-shadow-full"></div>
                            </div>
                        </section>
                    </li>
                </ul>
            </section>
            <div class="shadow-bottom"></div>
        </article><!-- slider end -->

        <!-- content wrapper start -->
        <section id="content-wrapper">

            <!-- container_12 start -->
            <section class="container_12">      

                <!-- services info start -->
                <section class="grid_3 services-info">
                    <h6 class="title">Productos</h6>
                    <p>Disfruta de nuestros productos de primera calidad, no te defraudarán</p>
                </section> <!-- services info end -->

                <!-- services columns start -->
                <ul class="services-wrap">
                    <li class="grid_3">
                        <!--<a class="icon icon3" href="services.html">Últimos Productos</a>-->
                        <h6 class="title">Últimos productos</h6>
                        <p>
                            <ul>
                                <?PHP foreach ($ultimos as $u) {
                                    ?>
                                    <li><?php echo CHtml::link($u->nombre, array('/productos/'.$u->id_producto), array('optionName'=>'ptionValue')); ?></li>
                                    <?PHP
                                } ?>
                            </ul>
                        </p>
                    </li>

                    <li class="grid_3">
                        <h6 class="title">Productos más vendidos</h6>
                        <p>
                            <ul>
                                <?PHP foreach($producto_venta as $pv){ ?>
                                <li><?php echo CHtml::link($pv->idProducto->nombre, array('/productos/'.$pv->id_producto), array('optionName'=>'optionValue')); ?></li>
                                <?PHP } ?>
                            </ul>
                        </p>
                    </li>

                    <li class="grid_3">
                        <h6 class="title">Productos más visitados</h6>
                        <p>
                            <ul>
                                <?PHP foreach($producto_visto as $pv){ ?>
                                <li><?php echo CHtml::link($pv->idProducto->nombre, array('/productos/'.$pv->id_productos), array('optionName'=>'optionValue')); ?></li>
                                <?PHP } ?>
                            </ul>
                        </p>
                    </li>
                </ul><!-- services columns end -->

                <!-- ruler start -->
                <hr class="ruler" /><!-- ruler end -->

                <!-- portfolio carousel start -->
                <section class="carousel grid_12">

                    <!-- section title start -->
                    <section class="grid_12 section-title">

                        <!-- title start -->
                        <h6>Productos</h6><!-- title end -->

                        <!-- portfolio carousel navigation start -->
                        <ul class="carousel-nav">
                            <li>
                                <a class="next" href="#"></a> 
                            </li>

                            <li>
                                <a class="prev" href="#"></a>
                            </li>
                        </ul> <!-- portfolio carousel navigation end -->
                    </section><!-- section title end -->

                    <!-- portfolio items list start -->
                    <section class="jcarousellite" >
                        <ul class="carousel-li">
                            <li>  
                                <figure class="img-styled sliding">
                                    <div class="img-container">                   
                                        <!-- img start -->
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/portfolio/thumb/portfolio.jpg" width="220" alt="portfolio"/><!-- img end -->

                                        <!-- img hover effect and lightbox start -->
                                        <ul class="img-hover">
                                            <li class="title">
                                                <a href="portfoliosingle.html">Black and White</a>
                                            </li>
                                            <li class="portfolio-grid">
                                                <a  href="portfolio3.html">Grid</a>
                                            </li>
                                            <li class="portfolio-single">
                                                <a  href="portfoliosingle.html">Single</a>
                                            </li>
                                        </ul><!-- img hover effect and lightbox end -->
                                    </div>
                                </figure>
                            </li>

                            <li>
                                <figure class="img-styled sliding">
                                    <div class="img-container">                   
                                        <!-- img start -->
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/portfolio/thumb/portfolio.jpg" width="220" alt="portfolio"/><!-- img end -->

                                        <!-- img hover effect and lightbox start -->
                                        <ul class="img-hover">
                                            <li class="title">
                                                <a href="portfoliosingle.html">Trust is Tricky</a>
                                            </li>
                                            <li class="portfolio-grid">
                                                <a  href="portfolio3.html">Grid</a>
                                            </li>
                                            <li class="portfolio-single">
                                                <a  href="portfoliosingle.html">Single</a>
                                            </li>
                                        </ul><!-- img hover effect and lightbox end -->
                                    </div>

                                </figure>
                            </li>

                            <li>
                                <figure class="img-styled sliding">
                                    <div class="img-container">                   
                                        <!-- img start -->
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/portfolio/thumb/portfolio.jpg" width="220" alt="portfolio"/><!-- img end -->

                                        <!-- img hover effect and lightbox start -->
                                        <ul class="img-hover">
                                            <li class="title">
                                                <a href="portfoliosingle.html">The Indian Girl</a>
                                            </li>
                                            <li class="portfolio-grid">
                                                <a  href="portfolio3.html">Grid</a>
                                            </li>
                                            <li class="portfolio-single">
                                                <a  href="portfoliosingle.html">Single</a>
                                            </li>
                                        </ul><!-- img hover effect and lightbox end -->
                                    </div>

                                </figure>
                            </li>

                            <li>
                                <figure class="img-styled sliding">
                                    <div class="img-container">                   
                                        <!-- img start -->
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/portfolio/thumb/portfolio.jpg" width="220" alt="portfolio"/><!-- img end -->

                                        <!-- img hover effect and lightbox start -->
                                        <ul class="img-hover">
                                            <li class="title">
                                                <a href="portfoliosingle.html">This Is Not The End</a>
                                            </li>
                                            <li class="portfolio-grid">
                                                <a  href="portfolio3.html">Grid</a>
                                            </li>
                                            <li class="portfolio-single">
                                                <a  href="portfoliosingle.html">Single</a>
                                            </li>
                                        </ul><!-- img hover effect and lightbox end -->
                                    </div>

                                </figure>
                            </li>

                            <li>
                                <figure class="img-styled sliding">
                                    <div class="img-container">                   
                                        <!-- img start -->
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/portfolio/thumb/portfolio.jpg" width="220" alt="portfolio"/><!-- img end -->

                                        <!-- img hover effect and lightbox start -->
                                        <ul class="img-hover">
                                            <li class="title">
                                                <a href="portfoliosingle.html">Future Cars</a>
                                            </li>
                                            <li class="portfolio-grid">
                                                <a  href="portfolio3.html">Grid</a>
                                            </li>
                                            <li class="portfolio-single">
                                                <a  href="portfoliosingle.html">Single</a>
                                            </li>
                                        </ul><!-- img hover effect and lightbox end -->
                                    </div>

                                </figure>
                            </li>

                            <li>
                                <figure class="img-styled sliding">
                                    <div class="img-container">                   
                                        <!-- img start -->
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/portfolio/thumb/portfolio.jpg" width="220" alt="portfolio"/><!-- img end -->

                                        <!-- img hover effect and lightbox start -->
                                        <ul class="img-hover">
                                            <li class="title">
                                                <a href="portfoliosingle.html">Daft Punk</a>
                                            </li>
                                            <li class="portfolio-grid">
                                                <a  href="portfolio3.html">Grid</a>
                                            </li>
                                            <li class="portfolio-single">
                                                <a  href="portfoliosingle.html">Single</a>
                                            </li>
                                        </ul><!-- img hover effect and lightbox end -->
                                    </div>

                                </figure>
                            </li>
                        </ul>

                    </section>
                </section><!-- portfolio items list end -->

                <!-- note start -->
                <section class="grid_12 note" style="display:none">
                    <!-- note text start -->
                    <span class="text">Hello, This is Moderna Theme. And This is Place Where You Will Introduce Yourself.</span><!-- note text end -->

                    <!-- button big start -->
                    <a href="#" class="btn-big style-color">
                        <span>Purchase theme</span>
                    </a><!-- button big end -->
                </section><!-- note end -->

            </section><!-- container_12 end -->

        </section><!-- content-wrapper end -->