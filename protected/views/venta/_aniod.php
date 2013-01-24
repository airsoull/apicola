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
		<h1>Detalle Año <?PHP echo $id; ?></h1>
		<?PHP
  $total = 0;
  foreach ($anio as $s) {
       $total = $s->total + $total;
     }   
?>
Total: <?PHP echo '$'.number_format($total); ?>&nbsp;&nbsp;&nbsp;<?php echo CHtml::link('Detalles', array('/venta/anios/'.$id), array('optionName'=>'optionValue')); ?>
<div id="chart_div3" style="width: 100%; height: 100%;"></div>
<div id="chart_divp" style="width: 100%; height: 100%;"></div>
<div id="chart_div3s" style="width: 100%; height: 100%;"></div>
<div id="chart_divp2" style="width: 100%; height: 100%;"></div>
<div id="chart_div3ss" style="width: 100%; height: 100%;"></div>
<br>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Total'],
          <?PHP foreach($anio as $s){ ?>
          ['<?PHP echo $this->mes($s->fechas); ?>', <?PHP echo $s->total; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Ventas Anuales Por Total',
          width: 610,
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Ventas'],
          <?PHP foreach($anio as $s){ ?>
          ['<?PHP echo $this->mes($s->fechas); ?>',  <?PHP echo $s->cantidad; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Ventas Anuales Por Ventas',
          width: 610,
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div3s'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Ventas', 'total'],
          <?PHP foreach($anio as $s){ ?>
          ['<?PHP echo $this->mes($s->fechas); ?>',  <?PHP echo $s->cantidad; ?>, <?PHP echo $s->total; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Ventas Anuales',
          width: 610,
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div3ss'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Total'],
          <?PHP foreach($anio as $s){ ?>
          ['<?PHP echo $this->mes($s->fechas); ?>', <?PHP echo $s->total; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Ventas Anuales Por Total',
          width: 610,
          height: 300,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_divp'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Total'],
          <?PHP foreach($anio as $s){ ?>
          ['<?PHP echo $this->mes($s->fechas); ?>', <?PHP echo $s->cantidad; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Ventas Anuales Por Ventas',
          width: 610,
          height: 300,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_divp2'));
        chart.draw(data, options);
      }
    </script>
    <br><br>
    <h1>Detalle Mensual</h1>
    <form action="/apicola/venta/mesesc" method="post">
    <table style="width:100%">
        <thead>
          <th>&nbsp;</th>
          <th>Año</th>
        </thead>
        <tbody>
    <?PHP
    	foreach ($anio as $s) { ?>
      <tr>
        <td><input type="checkbox" value="<?PHP echo $s->fechas ?>" name="mes[]"></td>
    		<td><h3><?php echo CHtml::link($this->mes($s->fechas), array('/venta/mes/'.$s->fechas), array('optionName'=>'optionValue')); ?></h3></td>
    	</tr>
      <?PHP } ?>
      </tbody>
      </table>
      <input class="button" type="submit" name="yt0" value="Comparar">
      </form>

	</article>
</section>