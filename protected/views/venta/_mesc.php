<?php
/* @var $this VentaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ventas',
);

$this->renderPartial('_menu');
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
		<h1>Comparar Meses</h1>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fechas', 'Septiembre', 'Octubre'],
          <?PHP foreach($mes as $m){ ?>
          ['<?PHP echo $m->fechas ?>',  1000,      400],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Comparar Meses Por Total',
          width: 610,
          height: 300,
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <div id="chart_div"></div>
	</article>
</section>