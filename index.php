<?php
/**
 * Proyecto Datos historicos Dolaytoday
 *
 * @package			php
 * @author			Tomas Losis<tlosis@gmail.com>
 * @since			Version 1.0 septiembre 2019
 * @description		Visualizacion de datos de dolartoday. pagina principal
 */

//inicializacion
include('conex.php');
$mydb = new myDBC();

?>

<!doctype html>
<html>
<head>
<link rel=StyleSheet href="estilos.css" type="text/css">
</head>
<body>
<div id="main">
<h1>Proyecto de obtencion de informaci&oacute;n de Divisas</h1>
<?php
//extraer el ultimo dato almacenado o el dato seleccionado por el usuario
$id = (!empty($_GET['id']))?'WHERE id = '.$_GET['id']:'';

$sql = "SELECT * FROM log_divisas ".$id." ORDER BY id DESC limit 1;";
		$result = $mydb->runQuery($sql);
		if($result->num_rows>0):
		//hay registros
		$row = $result->fetch_array(MYSQLI_ASSOC);
		
		$text = (!empty($_GET['id']))?'Datos de las divisas de fecha: '.$row['fecha']:'Ultimo Valor Registrado. Fecha: '.$row['fecha'];
?>

<h3><?php echo $text;?></h3>


<div id="content">
<!-----------contenido dolar------------->
<div class="cuadro">
<div id="contenedor">
	<div class="contenidos">
			Dolar
	</div>
    <div class="contenidos">        
        <div class="columna">Transferencia</div>
        <div class="columna"><?php echo $row['usd_transferencia']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Transferencia cucuta</div>
        <div class="columna"><?php echo $row['usd_transfer_cucuta']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Efectivo</div>
        <div class="columna"><?php echo $row['usd_efectivo']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Efectivo Real</div>
        <div class="columna"><?php echo $row['usd_efectivo_real']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Efectivo Cucuta</div>
        <div class="columna"><?php echo $row['usd_efectivo_cucuta']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Promedio</div>
        <div class="columna"><?php echo $row['usd_promedio']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Promedio Real</div>
        <div class="columna"><?php echo $row['usd_promedio_real']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Cencoex</div>
        <div class="columna"><?php echo $row['usd_cencoex']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Sicad1</div>
        <div class="columna"><?php echo $row['usd_sicad1']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Sicad2</div>
        <div class="columna"><?php echo $row['usd_sicad2']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Bitcoin Referencia</div>
        <div class="columna"><?php echo $row['usd_bitcoin_ref']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Bitcoin Local de Referencia</div>
        <div class="columna"><?php echo $row['usd_localbitcoin_ref']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Dolartoday</div>
        <div class="columna"><?php echo $row['usd_dolartoday']; ?></div>
    </div>											
</div>
</div>
<!------------contenido euro ----------->
<div class="cuadro">
<div id="contenedor">
	<div class="contenidos">
			Euro
	</div>
    <div class="contenidos">        
        <div class="columna">Transferencia</div>
        <div class="columna"><?php echo $row['eur_transferencia']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Transferencia cucuta</div>
        <div class="columna"><?php echo $row['eur_transfer_cucuta']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Efectivo</div>
        <div class="columna"><?php echo $row['eur_efectivo']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Efectivo Real</div>
        <div class="columna"><?php echo $row['eur_efectivo_real']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Efectivo Cucuta</div>
        <div class="columna"><?php echo $row['eur_efectivo_cucuta']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Promedio</div>
        <div class="columna"><?php echo $row['eur_promedio']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Promedio Real</div>
        <div class="columna"><?php echo $row['eur_promedio_real']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Cencoex</div>
        <div class="columna"><?php echo $row['eur_cencoex']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Sicad1</div>
        <div class="columna"><?php echo $row['eur_sicad1']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Sicad2</div>
        <div class="columna"><?php echo $row['eur_sicad2']; ?></div>
    </div>
    <div class="contenidos">       
        <div class="columna">Dolartoday</div>
        <div class="columna"><?php echo $row['eur_dolartoday']; ?></div>
    </div>											
</div>
</div>
</div>
<!---------------actualizacion manual--------------------->

<div class="actualizardata">
	<form method="post" action="actualizar.php" enctype="multipart/form-data">
		haga click en el siguiente boton para obtener los ultimos cambios<input type="submit" value="Actualizar datos">
	</form>	
</div>

<!---------------Tabla de historicos--------------------->

<h3>Ver Historicos</h3>

<table id="customers">
  <tr>
    <th>fecha</th>
    <th>Dolar Promedio</th>
    <th>Euro Promedio</th>
	<th>acciones</th>
  </tr>

<?php  
		$sql = "SELECT * FROM log_divisas ORDER BY id DESC;";
		$result = $mydb->runQuery($sql);
		if($result->num_rows>0):
		while($row = $result->fetch_array(MYSQLI_ASSOC)): 		
?>

  <tr>
    <td><?php echo $row['fecha']; ?></td>
    <td><?php echo $row['usd_promedio']; ?></td>
    <td><?php echo $row['eur_promedio']; ?></td>
	<td> <a href="index.php?id=<?php echo $row['id']; ?>">ver detalle</a></td>
  </tr>
 <?php 
 endwhile;
 endif; 
 else:
 ?>
 <!---------------Busqueda de datos. tabla vacia--------------------->

 <div class="actualizardata">
	<form method="post" action="actualizar.php" enctype="multipart/form-data">
		No hay datos. haga click en el siguiente boton para obtener informaci&oacute;n<input type="submit" value="Buscar datos">
	</form>	
</div>
 
 <?php
 endif;
 ?>  
</table>
<br />
</div>
</body>
</html>
       