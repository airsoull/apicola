<?php /* @var $this Controller  ?>
<div class="span-19">
	<div id="content">
		<?php #echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operaciones',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		
	?>
	</div><!-- sidebar -->
</div>
<? */ ?>


<?php $this->beginContent('//layouts/main'); ?>
<section id="content">
<section class="container_12 clearfix">
	<section id="main" class="grid_9 push_3">
		<?php echo $content; ?>
	</section>
	<aside id="sidebar" class="grid_3 pull_9">
<div class="box menu">
				<h2><?PHP $this->beginWidget('zii.widgets.CPortlet', array('title'=>'Operaciones',)); ?></h2>
				<section>
					<?PHP
					$this->widget('zii.widgets.CMenu', array(
						'items'=>$this->menu,
						'htmlOptions'=>array('class'=>'operations'),
						));
						$this->endWidget();
					?>
				</section>
			</div>
		</aside>
</section>
</section>
<?php $this->endContent(); ?>