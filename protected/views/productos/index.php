<section id="page-title">
	<h1><?PHP echo $model->nombre; ?></h1>
</section>

<!-- content wrapper start -->
        <section id="content-wrapper">

            <!-- showcase wrapper portfolio single start -->
            <article class="showcase-wrapper single">

                <!-- showcase start -->
                <section class="showcase">

                    <!-- section title start -->
                    <section class="grid_12 section-title">

                        <!-- title start -->
                        <h5><?PHP echo $model->nombre.'&nbsp;&nbsp;&nbsp;$'.number_format($model->precio); ?></h5><!-- title end -->

                        <!-- showcase navigation start -->
                        <!-- showcase navigation end -->
                    </section><!-- section title end -->

                    <!-- showcase item start -->
                    <article class="grid_12 showcase-item">

                        <!-- img start -->
                        <img src="<?PHP echo Yii::app()->request->baseUrl.'/imagenes/'.$model->imagen; ?>" alt="<?PHP echo $model->nombre; ?>"/><!-- img end -->

                        <!-- showcase item description start -->
                        <div class="description">
                            <ul>
                                <li>Nombre: <span class="producto"><?PHP echo $model->nombre; ?></span></li>
                                <li>Categoría: <span class="producto"><?PHP echo $model->idTipo->nombre; ?></span></li>
                                <li>Precio: <span class="producto"><?PHP echo '$'.number_format($model->precio); ?></span></li>
                            </ul>

                            <br />
                            <p><?PHP echo $model->descripcion_general; ?>

                            </p>

                            <?php echo CHtml::link('<span>Agregar a Carro de compras</span>', array('/carro/agregar/'.$model->id_producto), array('class'=>'btn-big style-color')); ?>
 
                        </div><!-- showcase item description end -->

                    </article><!-- showcase item end -->

                </section> <!-- showcase end -->

            </article><!-- showcase wrapper portfolio single end -->

        </section><!-- content-wrapper end -->