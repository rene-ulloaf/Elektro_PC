<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>


<!-- marquesina -->
<script language="JavaScript">

var speed = 100 
var pause = 3000
var timerID = null
var bannerRunning = false
var ar = new Array()
ar[0] = ">>>> ELEKTRO-PC <<<<"
ar[1] = " Asistencia Técnica, ....."
ar[2] = "..... Paginas Web, ....."
ar[3] = "..... Eliminacion de Virus, ....."
ar[4] = "..... Respaldos, ....."
ar[5] = "..... Instalación Hardware ,etc. ....."
ar[6] = "..... www.elektro-pc.tk"
var currentMessage = 0
var offset = 0
function stopBanner() {
if (bannerRunning)
clearTimeout(timerID)
bannerRunning = false
}
function startBanner() {
stopBanner()
showBanner()
}
function showBanner() {
var text = ar[currentMessage]
if (offset < text.length) {
if (text.charAt(offset) == " ")
offset++ 
var partialMessage = text.substring(0, offset + 1) 
window.status = partialMessage
offset++ // IE sometimes has trouble with "++offset"
timerID = setTimeout("showBanner()", speed)
bannerRunning = true
} else {
offset = 0
currentMessage++
if (currentMessage == ar.length)
currentMessage = 0
timerID = setTimeout("showBanner()", pause)
bannerRunning = true
}
}
startBanner();
// -->
</script>

</head>
<body text="#003300" alink="#0033CC" vlink="#FF0000" link="#0000FF" leftmargin="25" rightmargin="25" topmargin="30" marginheight="30" marginwidth="25"> 

<!-- marquesina -->
<body onload="scroller()">

<?php 
echo "<table align='right' border='0'>";
echo "<tr> <td>";  
echo date('Y-m-d');
echo "</td>";
echo "<td>";
echo date('G:i:s');
echo "</td>";
echo "</tr>";
echo "</table>";
?>

<div align="left"> <h2> <u> Inicios: </u> </h2> </div>

<blockquote> <font color="#0000CC"> ELektro-PC </font> </center>

</font>
</body>
</html>
