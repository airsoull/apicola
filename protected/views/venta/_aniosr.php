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
    <h1>Detalle Por Regiones <?PHP echo $this->dato($dato, $id); ?></h1>
    <?PHP $total = 0; 
    foreach($model as $m){
      $total = $total + $m->total;
    } ?>
    <h3>Total:&nbsp;<?PHP echo '$'.number_format($total); ?></h3>
      <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawMarkersMap);

      function drawMarkersMap() {
      var data = google.visualization.arrayToDataTable([
        ['Ciudad',   'Cantidad', 'Total'],
        <?PHP foreach($model as $m){ ?>
        ['<?PHP echo $m->idRegiones->nombre ?>',      <?PHP echo $m->contar;?>,    <?PHP echo $m->total; ?>],
        <?PHP } ?>
      ]);

      var options = {
        region: 'CL',
        displayMode: 'markers',
        width:610,
        colorAxis: {colors: ['green', 'blue']}
      };

      var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    };


    $(function() {
      $( "#tabs" ).tabs();
    });

    </script>

    <script type="text/javascript">
      //Grafico de Pastel
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Región', 'Total'],
          <?PHP foreach($model as $m){ ?>
          ['<?PHP echo $m->idRegiones->nombre; ?>', <?PHP echo $m->total; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Total',
          width:610,
          height:400,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_divs'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      //Grafico de Pastel
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Región', 'Total'],
          <?PHP foreach($model as $m){ ?>
          ['<?PHP echo $m->idRegiones->nombre; ?>', <?PHP echo $m->contar; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Cantidad',
          width:610,
          height:400,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_divss'));
        chart.draw(data, options);
      }
    </script>

    <div id="tabs">
  <ul>
    <li><a href="#tabs-1">General</a></li>
    <li><a href="#tabs-2">Productos</a></li>
    <li><a href="#tabs-3">Comuna</a></li>
  </ul>
  <div id="tabs-1">
    <div id="chart_div"></div>
    <div id="chart_divs"></div>
    <div id="chart_divss"></div>
  </div>
  <div id="tabs-2">
    
    <?PHP foreach ($region as $r) {
      echo $r->idRegiones->nombre;
      if($dato){
      $prod = DetalleVenta::model()->with('idVenta')->findAll(array(
        'select'=>'id_producto, sum(cantidad) as contar, sum(t.total) as total',
        'condition'=>'idVenta.id_regiones ='.$r->id_regiones.' and month(idVenta.fecha) = '.$id,
        'group'=>'id_producto',
        'order'=>'total desc',
      ));
      }else{
        $prod = DetalleVenta::model()->with('idVenta')->findAll(array(
        'select'=>'id_producto, sum(cantidad) as contar, sum(t.total) as total',
        'condition'=>'idVenta.id_regiones ='.$r->id_regiones.' and year(idVenta.fecha) = '.$id,
        'group'=>'id_producto',
        'order'=>'total desc',
      ));
      }
      ?>
      <script type="text/javascript">
      //Grafico de Pastel
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Región', 'Total'],
          <?PHP foreach($prod as $m){ ?>
          ['<?PHP echo $m->idProducto->nombre; ?>', <?PHP echo $m->contar; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Cantidad',
          width:610,
          height:400,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div<?PHP echo $r->id_regiones ?>'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      //Grafico de Pastel
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Región', 'Total'],
          <?PHP $total = 0; foreach($prod as $m){ 
              $total = $total + $m->total;
            ?>
          ['<?PHP echo $m->idProducto->nombre; ?>', <?PHP echo $m->total; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Total',
          width:610,
          height:400,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_divs<?PHP echo $r->id_regiones ?>'));
        chart.draw(data, options);
      }
    </script>
      <div id="chart_divs<?PHP echo $r->id_regiones; ?>"></div>
      <div id="chart_div<?PHP echo $r->id_regiones; ?>"></div>
      Total: <strong><?PHP echo '$'.number_format($total); ?></strong><br><br>
    <?PHP } ?>
    
  </div>
  <div id="tabs-3">
    


    <?PHP foreach ($comunas as $r) {
      echo $r->idRegiones->nombre;
      if($dato){
      $prod = DetalleVenta::model()->with('idVenta')->findAll(array(
        'select'=>'id_producto, sum(t.cantidad) as contar, sum(t.total) as total',
        'condition'=>'id_comunas ='.$r->id_comunas.' and idVenta.id_regiones ='.$r->id_regiones.' and month(idVenta.fecha) = '.$id,
        'group'=>'id_producto',
        'order'=>'total asc',
      ));
      }else{
        $prod = DetalleVenta::model()->with('idVenta')->findAll(array(
        'select'=>'id_producto, sum(t.cantidad) as contar, sum(t.total) as total',
        'condition'=>'id_comunas ='.$r->id_comunas.' and idVenta.id_regiones ='.$r->id_regiones.' and year(idVenta.fecha) = '.$id,
        'group'=>'id_producto',
        'order'=>'total asc',
      ));
      }
      ?>
      <br>
      <?PHP echo $r->idComunas->nombre ?>
      <script type="text/javascript">
      //Grafico de Pastel
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Región', 'Total'],
          <?PHP foreach($prod as $m){ ?>
          ['<?PHP echo $m->idProducto->nombre; ?>', <?PHP echo $m->contar; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Cantidad',
          width:610,
          height:400,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div3<?PHP echo $r->id_comunas ?>'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      //Grafico de Pastel
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Región', 'Total'],
          <?PHP $total = 0; foreach($prod as $m){ 
              $total = $total + $m->total;
            ?>
          ['<?PHP echo $m->idProducto->nombre; ?>', <?PHP echo $m->total; ?>],
          <?PHP } ?>
        ]);

        var options = {
          title: 'Total',
          width:610,
          height:400,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div3s<?PHP echo $r->id_comunas ?>'));
        chart.draw(data, options);
      }
    </script>
      <div id="chart_div3s<?PHP echo $r->id_comunas; ?>"></div>
      <div id="chart_div3<?PHP echo $r->id_comunas; ?>"></div>
      Total: <strong><?PHP echo '$'.number_format($total); ?></strong><br><br>
    <?PHP } ?>



  </div>
</div>

  <?PHP if(!$dato){ ?>
    <br><br>
    <h1>Por Meses</h1>
    <fieldset>
      <legend>Meses</legend>
      <?PHP foreach ($meses as $m) { ?>
        <h2><?php echo CHtml::link($this->mes($m->mes), array('/venta/meser/'.$m->mes), array('optionName'=>'optionValue')); ?></h2>
      <?PHP } ?>
    </fieldset>
    <?PHP } ?>
  </article>
</section>