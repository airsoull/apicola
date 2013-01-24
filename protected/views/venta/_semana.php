<?PHP
  $total = 0;
  foreach ($semana as $s) {
       $total = $s->total + $total;
     }   
?>
Total: <?PHP echo '$'.number_format($total); ?>
<div id="chart_div" style="width: 100%; height: 100%;"></div>
<div id="chart_divs" style="width: 100%; height: 100%;"></div>
<div id="chart_divss" style="width: 100%; height: 100%;"></div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Total'],
          <?PHP foreach($semana as $s){ ?>
          ['<?PHP echo $s->fechas ?>', <?PHP echo $s->total; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Ventas Semanales Por Total',
          width: 610,
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Ventas'],
          <?PHP foreach($semana as $s){ ?>
          ['<?PHP echo $s->fechas ?>',  <?PHP echo $s->cantidad; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Ventas Semanales Por Ventas'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_divs'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Ventas', 'total'],
          <?PHP foreach($semana as $s){ ?>
          ['<?PHP echo $s->fechas ?>',  <?PHP echo $s->cantidad; ?>, <?PHP echo $s->total; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Ventas Semanales',
          width: 610,
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_divss'));
        chart.draw(data, options);
      }
    </script>
