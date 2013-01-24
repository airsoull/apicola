<?PHP
  $total = 0;
  foreach ($anio as $s) {
       $total = $s->total + $total;
     }   
?>
Total: <?PHP echo '$'.number_format($total); ?>
<div id="chart_div3" style="width: 100%; height: 100%;"></div>
<div id="chart_div3s" style="width: 100%; height: 100%;"></div>
<div id="chart_div3ss" style="width: 100%; height: 100%;"></div>

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
          ['<?PHP echo $this->mes($s->fechas) ?>',  <?PHP echo $s->cantidad; ?>],
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