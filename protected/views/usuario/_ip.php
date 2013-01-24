<fieldset>
<legend>Todas Las IP Que EL Usuario Se Ha Conectado</legend>
<?php foreach ($model as $m) { ?>
		IP: <?PHP echo $m->ip; ?><br>
		Fecha: <?PHP echo $m->fecha; ?><br>
		Nombre: <?PHP echo $m->empresa; ?><br>
		<hr>
<?PHP } ?>
</fieldset>