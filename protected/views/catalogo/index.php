<section id="page-title">
	<h1><?PHP echo $tipo->nombre; ?></h1>
</section>

<section id="content-wrapper">

            <!-- container_12 start -->
            <section class="container_12">

                <!-- blog posts container start -->
                <ul class="grid_9 blog">


                	<?PHP 
                	foreach ($model as $m) {
                		
                	
                	?>
                    <!-- blog post start -->
                    <li class="blog-post">

                        
                        <ul class="meta">
                            
                            <li class="date">
                                <p><?PHP echo '$'.number_format($m->precio); ?></p>
                            </li>
                        </ul> 

                        <!-- post body start -->
                        <section class="post">
                            <figure class="img-styled sliding">
                                <div class="img-container">                   
                                    <!-- img start -->
                                    <img src="<?PHP echo Yii::app()->request->baseUrl.'/imagenes/'.$m->imagen; ?>" alt="<?PHP echo $m->nombre; ?>"/><!-- img end -->

                                    <!-- img hover effect start -->
                                    <ul class="img-hover">
                                        <li class="title">
                                            <?php echo CHtml::link($m->nombre, array("productos/$m->id_producto")); ?>
                                        </li>
                                    </ul><!-- img hover effect end -->
                                </div>
                            </figure>
                            <h2><?PHP echo $m->nombre; ?></h2>
                            <p><?PHP echo $m->descripcion; ?></p>
                            <?php echo CHtml::link('<span>Ver</span>', array("productos/$m->id_producto"), array('class'=>'btn-medium style-color')); ?>
                        </section><!-- post body end -->
                    </li><!-- blog post end -->
                    <? } ?>

                    

                    

                    

                    

                   

                    
                    

                    
                </ul><!-- blog posts container end -->

                <!-- sidebar start -->
                <aside class="grid_3 aside">

                    <!-- sidebar widgets start -->
                    <ul class="aside-widgets">
                        <!-- categories widget start -->
                        <li class="categories">
                            <h6>Otros Productos</h6>
                            <ul>
                            	<?PHP foreach ($tipos as $t) {
                            		?>
                            		<li><?php echo CHtml::link(ucfirst($t->idTipo->nombre), array('/catalogo/'.$t->id_tipo), array('optionName'=>'optionValue')); ?></li>
                            		<?PHP
                            	} ?>
                            </ul>
                        </li><!-- categories widget end -->

                        <!-- popular posts widget start -->
                        <li class="posts">
                            <h6>Produtos más vendidos</h6>
                            <ul>
                                <?PHP foreach($producto_venta as $pv){ ?>
                                <li><?php echo CHtml::link($pv->idProducto->nombre, array('/productos/'.$pv->id_producto), array('optionName'=>'optionValue')); ?></li>
                                <?PHP } ?>
                            </ul>
                        </li><!-- popular posts widget end -->

                    </ul><!-- sidebar widgets end -->
                </aside><!-- sidebar end -->
            </section><!-- container_12 end -->

        </section><!-- content-wrapper end -->