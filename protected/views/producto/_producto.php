<div id="chart_div"></div>
<div id="chart_divs"></div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Total'],
          <?PHP foreach ($productos as $m) { ?>
          ['<?PHP echo $m->idProducto->nombre ?>', <?PHP echo $m->total ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Venta de Productos Por Venta',
          width: 610,
          height: 400,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Total'],
          <?PHP foreach ($productos as $m) { ?>
          ['<?PHP echo $m->idProducto->nombre ?>', <?PHP echo $m->cantidad ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Venta de Productos Por Cantidad',
          width: 610,
          height: 400,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_divs'));
        chart.draw(data, options);
      }
    </script>