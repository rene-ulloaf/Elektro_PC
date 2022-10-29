<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>

<body text="#006600" alink="#0033CC" vlink="#FF0000" link="#0000FF" leftmargin="25" rightmargin="25" topmargin="30" marginheight="30" marginwidth="25">
<font face="Arial, Helvetica, sans-serif" size="1">

<?php
$comunas = array("Santiago","Independencia","Conchalí","Huechuraba","Recoleta","Providencia","Vitacura","Lo Barnechea","Las Condes","Ñuñoa","La Reina","Macul","Peñalolén","La Florida","San Joaquín","La Granja","La Pintana","San Ramón","San Miguel","La Cisterna","El Bosque","Pedro Aguirre Cerda","Lo Espejo","Estacion Central","Cerrillos","Maipú","Quinta Normal","Lo Prado","Pudahuel","Cerro Navia","Quilicura");
sort($comunas);
?>


<div align="center"> <h2> <u> Datos Personales </u> </h2>
<p> Por favor ingrese sus datos personales. </p> </div>

<form method="post" action="guardar_cliente.php" >

<input name="fecha" type="hidden" value="<?php echo date('Y-m-d G:i:s'); ?>" />

<table align="center" border="0" cellpadding="3" cellspacing="2">

<tr align="left">
<td> * RUT: </td>
<td> <input type="text" name="rut" size="10" maxlength="10" tabindex="0" /> -
<input type="text" name="verificador" size="1" maxlength="1" tabindex="1" /> </t> </t> (xxxxxxxx-x) </td>
</tr>

<tr align="left">
<td> * Nombres: </td> 
<td> <input type="text" name="nombres" size="40" maxlength="40" tabindex="1" /> </td>
</tr>

<tr align="left">
<td> * Primer Apellido: </td>
<td> <input type="text" name="apellido1" size="20" maxlength="20" tabindex="2" /> </td>
</tr>

<tr align="left">
<td> Segundo Apellido: </td>
<td> <input type="text" name="apellido2" size="20" maxlength="20" tabindex="3" /> </td>
</tr>

<tr align="left">
<td> * Dirección: </td>
<td> <input type="text" name="direccion" size="25" maxlength="25" tabindex="4" />
</t> </t> </t> </t> N°: <input type="text" name="numero" size="6" maxlength="6" tabindex="5" /> </td>
</tr>

<tr align="left">
<td> Comuna: </td>
<?php
echo "<td> <select name='comunas' tabindex='6'>";
for($i=0; $i<count($comunas); $i++)
{
echo "<option value=$comunas[$i]> $comunas[$i] </option>";
}
echo "</select> </td>";
?>
</tr>

<tr align="left">
<td> * Teléfono </td>
<td> ej. (02) <input type="text" name="dif" size="2" maxlength="2" tabindex="7"> - 
<input type="text" name="fono" size="8" maxlength="8" tabindex="8" /> </td>
</tr>

<tr align="left">
<td> E-Mail </td>
<td> <input type="text" name="email" size="25" maxlength="25" tabindex="9" /> </td>
</tr>

<tr align="left">
<td> * Forma de Pago </td>
<td align="left"> <input type="radio" name="pago" value="efectivo" tabindex="10" /> Efectivo </t> </t> </t> </t> </t> </t> </t>
<input type="radio" name="pago" value="cheque" tabindex="10" /> Cheque
</td> </tr>

<tr align="left">
<td> * Referencia: </td>
<td> <textarea name="referencia" cols="40" rows="4" tabindex="11"> </textarea> </td>
</tr> </table>
<br /> <br />

<table align="center" border="0" cellpadding="3" cellspacing="2">
<tr align="left">
<td> * Sintoma del PC: </td>
<td> <textarea name="sintoma" cols="40" rows="4" tabindex="12"> </textarea> </td>
</tr> </table>
<br />

<p><center> <h3> <u> Servicios Escogidos </u> </h3> </center>

<?php 
$suma = 0;

echo "<table align='center' border='1' cellpadding='3' cellspacing='2'>";
echo "<tr align='center' bgcolor='#99FF33'>";
echo "<td> Tipo </td> <td> Precio </td> <td> Borrar </td>";
echo "</tr>";

if(isset($visita))
{
echo "<tr align='center'>";
echo "<td bgcolor='#99CC99'> Visita a Domicilio </td> <td> $ 5.000 </td>";
echo "<td> <input type='checkbox' name='visita' checked='checked' tabindex='11' /> </td>";
echo"</tr>";
$suma = $suma + 5000;
}
if(isset($armado))
{
echo "<tr align='center'>";
echo "<td bgcolor='#99CC99'> Armado de PC </td>  <td> $ 15.000  </td>";
echo "<td> <input type='checkbox' name='armado' checked='checked' tabindex='13' /> </td>";
echo"</tr>";
$suma = $suma + 15000;
}
if(isset($hw))
{
echo "<tr align='center'>";
echo "<td bgcolor='#99CC99'> Instalación de Hardware </td> <td> $ 10.000  </td>";
echo "<td> <input type='checkbox' name='hw' checked='checked'  tabindex='14' /> </td>";
echo"</tr>";
$suma = $suma + 10000;
}
if(isset($formateo))
{
echo "<tr align='center'>";
echo "<td bgcolor='#99CC99'> Formateo de Pc y carga S.O. </td> <td> $ 10.000 </td>";
echo "<td> <input type='checkbox' name='formateo' checked='checked' tabindex='15' /> </td>";
echo"</tr>";
$suma = $suma + 10000;
}
if(isset($informacion))
{
echo "<tr align='center'>";
echo "<td bgcolor='#99CC99'> Recuperación de Información </td> <td> $ 20.000  </td>";
echo "<td> <input type='checkbox' name='informacion' checked='checked'  tabindex='16' /> </td>";
echo"</tr>";
$suma = $suma + 20000;
}
if(isset($virus))
{
echo "<tr align='center'>";
echo "<td bgcolor='#99CC99'> Eliminacion Virus </td> <td> $ 10.000  </td>";
echo "<td> <input type='checkbox' name='virus' checked='checked' tabindex='17' /> </td>";
echo"</tr> </table>";
$suma = $suma + 10000;
}

echo "<p>";
if ((isset($visita)) && (isset($armado)) && (isset($hw)) && (isset($formateo)) && (isset($informacion)) && (isset($virus)))
{
 echo "<div align='left'> <br /> <br />";
 echo"<table align='center' border='1' cellpadding='3' cellspacing='2'>";
 echo"<tr align='center'> <td bgcolor='#99CC99'> Total Neto </td> <td> $ $suma </td> </tr>";
 $iva = $suma * 0.19;
 echo"<tr align='center'> <td bgcolor='#99CC99'> I.V.A.(19%) </td> <td> $ $iva </td> </tr>";
 $total = $suma + $iva;
 echo"<tr align='center'> <td bgcolor='#99CC99'> Total </td> <td> $ $total </td> </tr>";
 echo "</table> </div>";
} 
?>
</p> </p>

<table align="center" border="0"> <tr>
<td> <input type="submit" value="Enviar" name="enviar" tabindex="18" /> </td>
<td> <input type="reset" value="Restablecer" name="borrar" tabindex="19" /> </td>
</tr> </table> </form>

</font> </body>
</html>