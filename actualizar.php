<?php
/**
 * Proyecto Datos historicos Dolaytoday
 *
 * @package			php
 * @author			Tomas Losis<tlosis@gmail.com>
 * @since			Version 1.0 septiembre 2019
 * @description		obtencion de datos via json
 */
require_once "config.php";   
include('conex.php');

$content = file_get_contents(URL_DATA_JSON);
$input = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($content));
$json = json_decode($input, true);
//echo json_last_error_msg();

$mydb = new myDBC();


//Limpieza de data
$epoch = $mydb->clearText($json['_timestamp']['epoch']);
$fecha = $mydb->clearText($json['_timestamp']['fecha']);

$usd_transferencia = $mydb->clearText($json['USD']['transferencia']);
$usd_transfer_cucuta = $mydb->clearText($json['USD']['transfer_cucuta']);
$usd_efectivo = $mydb->clearText($json['USD']['efectivo']);
$usd_efectivo_real = $mydb->clearText($json['USD']['efectivo_real']);
$usd_efectivo_cucuta = $mydb->clearText($json['USD']['efectivo_cucuta']);
$usd_promedio = $mydb->clearText($json['USD']['promedio']);
$usd_promedio_real = $mydb->clearText($json['USD']['promedio_real']);
$usd_cencoex = $mydb->clearText($json['USD']['cencoex']);
$usd_sicad1 = $mydb->clearText($json['USD']['sicad1']);
$usd_sicad2 = $mydb->clearText($json['USD']['sicad2']);
$usd_bitcoin_ref = $mydb->clearText($json['USD']['bitcoin_ref']);
$usd_localbitcoin_ref = $mydb->clearText($json['USD']['localbitcoin_ref']);
$usd_dolartoday = $mydb->clearText($json['USD']['dolartoday']);

$eur_transferencia = $mydb->clearText($json['EUR']['transferencia']);
$eur_transfer_cucuta = $mydb->clearText($json['EUR']['transfer_cucuta']);
$eur_efectivo = $mydb->clearText($json['EUR']['efectivo']);
$eur_efectivo_real = $mydb->clearText($json['EUR']['efectivo_real']);
$eur_efectivo_cucuta = $mydb->clearText($json['EUR']['efectivo_cucuta']);
$eur_promedio = $mydb->clearText($json['EUR']['promedio']);
$eur_promedio_real = $mydb->clearText($json['EUR']['promedio_real']);
$eur_cencoex = $mydb->clearText($json['EUR']['cencoex']);
$eur_sicad1 = $mydb->clearText($json['EUR']['sicad1']);
$eur_sicad2 = $mydb->clearText($json['EUR']['sicad2']);
$eur_dolartoday = $mydb->clearText($json['EUR']['dolartoday']);

//comprobacion de duplicacion de registro
$sql = "SELECT * FROM log_divisas WHERE epoch='$epoch' LIMIT 10;";
$result = $mydb->runQuery($sql);

if($result->num_rows==0){

	//insercion de registro
	$sql = "INSERT INTO log_divisas (id, epoch,fecha,usd_transferencia,usd_transfer_cucuta,usd_efectivo,usd_efectivo_real,usd_efectivo_cucuta,usd_promedio,usd_promedio_real,usd_cencoex,usd_sicad1,usd_sicad2,usd_bitcoin_ref,usd_localbitcoin_ref,usd_dolartoday,eur_transferencia,eur_transfer_cucuta,eur_efectivo,eur_efectivo_real,eur_efectivo_cucuta,eur_promedio,eur_promedio_real,eur_cencoex,eur_sicad1,eur_sicad2,eur_dolartoday) VALUES (NULL, '$epoch','$fecha',$usd_transferencia,$usd_transfer_cucuta,$usd_efectivo,$usd_efectivo_real,$usd_efectivo_cucuta,$usd_promedio,$usd_promedio_real,$usd_cencoex,$usd_sicad1,$usd_sicad2,$usd_bitcoin_ref,$usd_localbitcoin_ref,$usd_dolartoday,$eur_transferencia,$eur_transfer_cucuta,$eur_efectivo,$eur_efectivo_real,$eur_efectivo_cucuta,$eur_promedio,$eur_promedio_real,$eur_cencoex,$eur_sicad1,$eur_sicad2,$eur_dolartoday); ";
	//echo $sql;
	$mydb->runQuery($sql);

}
?>

    <html>
        <body> 
            <script type="text/javascript"> 
                  window.location="index.php"; 
            </script> 
        </body>
    </html>
	