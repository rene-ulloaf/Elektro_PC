<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>

<body text="#006600" alink="#0033CC" vlink="#FF0000" link="#0000FF" leftmargin="25" rightmargin="25" topmargin="30" marginheight="30" marginwidth="25">
<font face="Arial, Helvetica, sans-serif" size="1">

<?php

$link = mysql_connect("localhost","root"); 	
mysql_select_db("elektro_pc", $link);

// atrás
//$atras = "echo "<a href='contactenos.php'> Atrás </a>";"
//saca los espacios en blanco
$rut = trim($_POST['rut']);
$identificador = trim($_POST['identificador']);
$nombres = trim($_POST['nombres']);
$apellido1 = trim($_POST['apellido1']);
$apellido2 = trim($_POST['apellido2']);
$direccion = trim($_POST['direccion']);
$numero = trim($_POST['numero']);
$dif = trim($_POST['dif']);
$fono = trim($_POST['fono']);
$email = trim($_POST['email']);
$referencia = trim($_POST['referencia']);
$sintoma = trim($_POST['sintoma']);
//echo $validar_rut($rut);
echo "<center>";
//verifica si los checkbox estan marcados
if ((!isset($visita)) && (!isset($armado)) && (!isset($hw)) && (!isset($formateo)) && (!isset($informacion)) && (!isset($virus)))
{
 echo "<blockquote>";
 echo "Ud. no ha seleccionado ningún servicio por favor vuelva atrás para seleccionar o espere a que se redireccione. <br> <br>";
 echo "<a href='pc.html'> Atrás </a>";
} 
else
//verifica si los campos estan vacios
   if (empty($rut))
    echo "El campo RUT es obligatorio, ingrese su RUT. <br>";
   else	
    if (empty($verificador))
     echo "Ingrese el numero verificador de su RUT. <br>";
	else 
     if (empty($nombres))
      echo "El campo nombre es obligatorio, ingrese su nombre completo.<br>";
	 else 
   	  if (empty($apellido1))
       echo "por favor ingrese su Primer Apellido. <br>";
	  else
   	   if (empty($direccion) || (empty($numero)))
        echo "por favor ingrese su dirección. <br>";
	   else	
   		if (empty($dif) || empty($fono))
	     echo "por favor ingrese su telefono. <br>";
		else
	     if (isset($_Post['pago']))
		  echo "Seleccione la forma de pago. <br>";
		 else 
	      if (empty($referencia))
    	   echo "Ud. no ha dado ninguna referencia de como llegar a su casa por favor indiquela. <br>";
		  else 
		   if (empty($sintoma))
    		echo "debe ingresar el sintoma que presenta su PC. <br>";
//echo "<a href='contactenos.php'> Atrás </a>"; 
	else   
     if (!validar_rut($rut)) {
      echo "<br> Error: Ingrese el rut correctamente.";
	  echo $atras;
     } else {
      $direccion = $direccion . " " . $numero;
	  $Ssql = "INSERT INTO clientes (rut, nombres, apellido1, apellido2, direccion, fono, email,".
			  "comuna, referencia)".
			  " VALUES('$rut', '$nombres', '$apellido1', '$apellido2', '$direccion', '$fono', '$email',".
			  " '$comunas', '$referencia')";
			  
	  $result = mysql_query($Ssql,$link);
	  if (!$result) {
 	   $dupli = mysql_error();
  	   if ($dupli = Duplicate)
  	   {
        $usuario = mysql_query("SELECT nombres, apellido1, apellido2 from clientes WHERE rut = '$rut'", $link);
	    while ($row = mysql_fetch_row($usuario))
         printf("Bienvenido sr(a) $row[0] $row[1] $row[2]."); echo"<br> <br>";
       } else 
          die('Error: ' . mysql_error());
      }

printf("Ud. ha escogido los siguientes Servicios:"); echo"<br> <br>";
echo"<table border='1'>";
echo"<tr> <td> Servicio </td> <td> Valor </td> </tr>";  
$suma = 0;

if(isset($visita)) {
 $Ssql = "INSERT INTO cli_ser (rut_cliente, cod_servicio, fecha, forma_pago)".
 "VALUES ('$rut', '1', '$fecha', '$pago')";
 $result = mysql_query($Ssql,$link);
 echo"<tr> <td> Visita a Domicilio </td> <td> $ 5000 </td> </tr>";
 $suma = $suma + 5000;
}
if(isset($armado)) {
 $Ssql = "INSERT INTO cli_ser (rut_cliente, cod_servicio, fecha, forma_pago)".
 " VALUES ('$rut', '2', '$fecha', '$pago')";
 $result = mysql_query($Ssql,$link);
 echo"<tr> <td> Aramado de Pc </td> <td> $ 15000 </td> </tr>";
 $suma = $suma + 15000;
}
if(isset($hw)) {
 $Ssql = "INSERT INTO cli_ser (rut_cliente, cod_servicio, fecha, forma_pago)".
 " VALUES ('$rut', '3', '$fecha', '$pago')";
 $result = mysql_query($Ssql,$link);
 echo"<tr> <td> Instalacion Hardware </td> <td> $ 10000 </td> </tr>";
 $suma = $suma + 10000;
}
if(isset($formateo)) {
 $Ssql = "INSERT INTO cli_ser (rut_cliente, cod_servicio, fecha, forma_pago)".
 " VALUES ('$rut', '4', '$fecha', '$pago')";
 $result = mysql_query($Ssql,$link);
 echo"<tr> <td> Formateo de Pc y Carga S.O. </td> <td> </td> </tr>";
 $suma = $suma + 10000;
}
if(isset($informacion)) {
 $Ssql = "INSERT INTO cli_ser (rut_cliente, cod_servicio, fecha, forma_pago)".
 " VALUES ('$rut', '5', '$fecha', '$pago')";
 $result = mysql_query($Ssql,$link);
 echo"<tr> <td> Recuperación Información </td> <td> $ 20000 </td> </tr>";
 $suma = $suma + 20000;
}
if(isset($virus)) {
 $Ssql = "INSERT INTO cli_ser (rut_cliente, cod_servicio, fecha, forma_pago)".
 " VALUES ('$rut', '6', '$fecha', '$pago')";
 $result = mysql_query($Ssql,$link);
 echo"<tr> <td> Eliminación Virus </td> <td> $ 10000 </td> </tr>";
 $suma = $suma + 10000;
}

 echo"<tr> <td> Total Neto </td> <td> $ $suma </td> </tr>";
 $iva = $suma * 0.19;
 echo"<tr> <td> I.V.A.(19%) </td> <td> $ $iva </td> </tr>";
 $total = $suma + $iva;
 echo"<tr> <td> Total </td> <td> $ $total </td> </tr>";
 echo"</table> <br> <br>";

$Ssql = "INSERT INTO totales (rut_cliente, total) VALUES ('$rut', '$total')";
$result = mysql_query($Ssql, $link);

echo"Gracias por Preferir nuestros Servicios. </center> <br> <div align='right'> Elektro-PC </div>";
}
mysql_close($link);

//funcion validar rut
function validar_rut() {
 $cont = 2;
 $suma = 0;
 $aux = strlen($rut);
 for($i = 0; $i < $aux; $i++) {
  $rutito[] = substr("$rut", $i, 1); }
 for($i = ($aux - 1); $i >= 0; $i--)
 {
  $rutito[$i] = $rutito[$i] * $cont;
  $suma = $rutito[$i] + $suma;
  $cont ++;
  if ($cont > 7)
   $cont = 2;
 }
 $suma = $suma % 11;
 $suma = 11 - $suma;
 if ($suma == 11)
  $digito = 0; 
 if ($suma == 10)
  $digito = 'K'; 
 else
  $digito = $suma;
  echo $digito;
  $identificador = substr("$identificador", 1, 1);
  echo $identificador;
  settype($identificador, string);
  echo gettype($identificador);
 if ($digito == $identificador) {
  echo "$identificador verdadero";
  return true; }
 else
 { echo "$identificador";
  return false; }
}
?>

</body>
</html>