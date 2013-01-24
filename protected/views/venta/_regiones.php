<div id="chart_div2"></div>
<div id="chart_div2s"></div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Total'],
          <?PHP foreach ($region as $m) { ?>
          ['<?PHP echo $m->idRegiones->nombre ?>', <?PHP echo $m->total ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Venta Por Regiones Por Venta',
          width: 610,
          height: 400,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Total'],
          <?PHP foreach ($region as $m) { ?>
          ['<?PHP echo $m->idRegiones->nombre ?>', <?PHP echo $m->contar ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Venta Por Regiones Por Cantidad',
          width: 610,
          height: 400,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2s'));
        chart.draw(data, options);
      }
    </script>