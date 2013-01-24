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
    <?PHP if(!$comparar){ ?>
		<h1>Detalle Mes <?PHP echo $this->mes($id); ?></h1>
    <?PHP }else{ ?>
    <h1>Comparar Meses</h1>
    <?PHP } ?>


		<?PHP
  $total = 0;
  foreach ($mes as $s) {
       $total = $s->total + $total;
     }   
?>
Total: <?PHP echo '$'.number_format($total); ?>&nbsp;&nbsp;&nbsp;
<?PHP if(!$comparar){ ?>
<?php echo CHtml::link('Detalles', array('/venta/meses/'.$id), array('optionName'=>'optionValue')); ?>
<?PHP } ?>
<div id="chart_div2" style="width: 100%; height: 100%;"></div>
<div id="chart_div2p" style="width: 100%; height: 100%;"></div>
<div id="chart_div2s" style="width: 100%; height: 100%;"></div>
<div id="chart_div2ps" style="width: 100%; height: 100%;"></div>
<div id="chart_div2ss" style="width: 100%; height: 100%;"></div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Total'],
          <?PHP foreach($mes as $s){ ?>
          ['<?PHP echo $s->fechas ?>', <?PHP echo $s->total; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Ventas Mensuales Por Total',
          width: 610,
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Total'],
          <?PHP foreach($mes as $s){ ?>
          ['<?PHP echo $s->fechas ?>', <?PHP echo $s->total; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Ventas Mensuales Por Total',
          width: 610,
          height: 300,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2p'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Ventas'],
          <?PHP foreach($mes as $s){ ?>
          ['<?PHP echo $s->fechas ?>',  <?PHP echo $s->cantidad; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Ventas Mensuales Por Ventas',
          width: 610,
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div2s'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Ventas'],
          <?PHP foreach($mes as $s){ ?>
          ['<?PHP echo $s->fechas ?>',  <?PHP echo $s->cantidad; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Ventas Mensuales Por Ventas',
          width: 610,
          height: 300,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2ps'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Ventas', 'total'],
          <?PHP foreach($mes as $s){ ?>
          ['<?PHP echo $s->fechas ?>',  <?PHP echo $s->cantidad; ?>, <?PHP echo $s->total; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Ventas Mensuales',
          width: 610,
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div2ss'));
        chart.draw(data, options);
      }
    </script>


	</article>
</section>