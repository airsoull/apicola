<section id="main" class="grid_9 push_3">
			<article id="dashboard">
				<h1>Datos</h1>

				<h2>Estadísticas</h2>
				<div class="statistics">
					<table>
						<tr>
							<td>Usuarios totales</td>
							<td><?php echo CHtml::link($contar_usuario, array('/usuario'), array('optionName'=>'optionValue')); ?></td>
						</tr>
						<tr>
							<td>Productos</td>
							<td><?php echo CHtml::link($contar_producto, array('/producto'), array('optionName'=>'optionValue')); ?></td>
						</tr>
						<tr>
							<td>Productos Activos</td>
							<td><?php echo CHtml::link($contar_producto_activo, array('/producto/activo'), array('optionName'=>'optionValue')); ?></td>
						</tr>
						<tr>
							<td>Productos Inactivos</td>
							<td><?php echo CHtml::link($contar_producto_inactivo, array('/producto/activon'), array('optionName'=>'optionValue')); ?></td>
						</tr>
						<tr>
							<td>últimas Ventas Ventas</td>
							<td><?php echo CHtml::link($ventas_totales, array('/venta/revisar'), array('optionName'=>'optionValue')); ?></td>
						</tr>
					</table>
				</div>
				<div id="pageviews" style="width:420px;height:250px;"></div>
				<div class="clear"></div>

				<h2>Quick Links</h2>
				<section class="icons">
					<ul>
						<li>
							<a href="#">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/eleganticons/Home.png" />
								<span>Home</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/eleganticons/Paper.png" />
								<span>Articles</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/eleganticons/Paper-pencil.png" />
								<span>Write Article</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/eleganticons/Speech-Bubble.png" />
								<span>Comments</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/eleganticons/Photo.png" />
								<span>Photos</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/eleganticons/Folder.png" />
								<span>File Manager</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/eleganticons/Person-group.png" />
								<span>User Manager</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/eleganticons/Config.png" />
								<span>Settings</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/eleganticons/Piechart.png" />
								<span>Statistics</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/eleganticons/Info.png" />
								<span>About</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/eleganticons/Mail.png" />
								<span>Messages</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/eleganticons/X.png" />
								<span>Logout</span>
							</a>
						</li>
					</ul>
				</section>

				<h2>Recent Comments</h2>
				<ul class="comments">
					<li>
						<div class="comment-body clearfix">
							<img class="comment-avatar" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icons/dummy.gif" />
							<a href="#">Bruce</a> on <a href="#">Article 1</a>:
							<div>Whose appear moving i. Blessed. Light. A fruitful likeness every midst own yielding them greater air gathered beginning green blessed and great whose saw.</div>
						</div>
						<div class="links">
							<span class="date">02/03/2010 - 3:30</span>
							<a href="#" class="reply">Reply</a>
							<a href="#" class="delete">Delete</a>
						</div>
					</li>
					<li>
						<div class="comment-body clearfix">
							<img class="comment-avatar" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icons/dummy.gif" />
							<a href="#">Steve</a> on <a href="#">Article 1</a>:
							<div>Fruitful divide fruitful saying can't stars make. Fly open and called there bearing you'll fruitful give. Yielding god can't great have meat isn't form which appear good creepeth first can't made dominion years winged.</div>
						</div>
						<div class="links">
							<span class="date">02/03/2010 - 3:30</span>
							<a href="#" class="reply">Reply</a>
							<a href="#" class="delete">Delete</a>
						</div>
					</li>
					<li>
						<div class="comment-body clearfix">
							<img class="comment-avatar" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icons/dummy.gif" />
							<a href="#">Lauren</a> on <a href="#">Article 2</a>:
							<div>Seas abundantly first us morning which days darkness of midst appear. Was lesser seas fruitful third him isn't you'll given herb saw so waters given forth. Night. Deep and saying sea. The creeping spirit were.</div>
						</div>
						<div class="links">
							<span class="date">02/03/2010 - 3:30</span>
							<a href="#" class="reply">Reply</a>
							<a href="#" class="delete">Delete</a>
						</div>
					</li>
					<li>
						<div class="comment-body clearfix">
							<img class="comment-avatar" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icons/dummy.gif" />
							<a href="#">Adrian</a> on <a href="#">Article 2</a>:
							<div>She'd living. All upon make they're you're gathered kind. Divide they're under Male make without set. Whose. Itself creeping dominion.</div>
						</div>
						<div class="links">
							<span class="date">02/03/2010 - 3:30</span>
							<a href="#" class="reply">Reply</a>
							<a href="#" class="delete">Delete</a>
						</div>
					</li>
					<li>
						<div class="comment-body clearfix">
							<img class="comment-avatar" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icons/dummy.gif" />
							<a href="#">Dave</a> on <a href="#">Article 3</a>:
							<div>Void midst. Fill. He sixth the very saw from was gathering there replenish won't she'd creepeth fly moved lesser they're you're multiply be sea firmament. Fowl above fourth him creeping it doesn't face rule deep have winged.</div>
						</div>
						<div class="links">
							<span class="date">02/03/2010 - 3:30</span>
							<a href="#" class="reply">Reply</a>
							<a href="#" class="delete">Delete</a>
						</div>
					</li>
				</ul>
				<div class="links">
					<a class="button" href="#">View All</a>
				</div>
			</article>
		</section>