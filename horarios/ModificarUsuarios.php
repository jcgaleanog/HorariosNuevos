<?PHP
require("conectar.php");
//require_once("includes/session_admin/secure.php");

          header('Content-Type: text/html; charset="utf-8"');
         // No almacenar en el cache del navegador esta página.

		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache"); 

$fecha =date("m/d/Y");

if(isset($_POST['confir2']))
{
$confirmacion2 = $_POST['confir2'];

if($confirmacion2==1)
{

		$codigo = $_POST['codigo'];
		if(!empty($codigo))
		{
			$_sql = "delete from usuario where id='$codigo'";
			
			if(! @mysql_query($_sql, $link))
			{
				echo '<br><br><b><div align="center">No se pudo actualizar los datos</div></b>';
			}			
		}
}
}

?>
<html>
<head>
<title>Modificar Usuarios</title>
</head>

<body>
<p>&nbsp;</p>
<form action="EliminarUsuarios.php" method="post" name="listado">
<table width="694" border="0">
  <tr>
    <td width="14" height="44">&nbsp;</td>
    <td width="670" align="center"><strong><em>MODIFICAR USUARIOS 
      <input name="confir2" type="hidden" id="confir2" size="40" maxlength="20" value="<?PHP echo $confir2; ?>" />
    </em>    </strong></td>
    <input name="codigo" type="hidden" id="codigo" size="40" maxlength="20" value="<?PHP echo $codigo; ?>" /></td>
  </tr>
  <tr>
    <td height="44">&nbsp;</td>
    <td><div align="center">
<?php   


//******************************************************************************************************
// SECCION DE CODIGO DE Modificacion de Usuaios
//
//		En esta seccion del codigo se visualiza la informacion de las areas
//
//******************************************************************************************************

$result= @mysqli_query($link,"SELECT count(*) FROM usuario");
$numero=@mysqli_num_rows($result);					//Verificacion del numero de registros en el sistema

$result2= @mysqli_query($link,"select * from usuario order by nombre");

if(!$result)
  exit("No se pudo leer el archivo");
//******************************************************************************************************
// ENCABVEZADOS DE LAS TABLAS
//
//******************************************************************************************************

echo '<TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1>      
<TR>
	<td width="104" align="center" valign="middle" bordercolor="##F80604" bgcolor="#F80604"><div align="center"><span style="color: aliceblue">Nombre</span></div></td> 
 <td width="342" align="center" valign="middle" bordercolor="##F80604" bgcolor="#F80604"><div align="center"><span style="color: aliceblue">Apellidos</span style="color: aliceblue"></div></td>
  <td width="342" align="center" valign="middle" bordercolor="##F80604" bgcolor="#F80604"><div align="center"><span style="color: aliceblue">Cedula</span></div></td>
  <td width="342" align="center" valign="middle" bordercolor="##F80604" bgcolor="#F80604"><div align="center"><span style="color: aliceblue">Email</span></div></td>
  <td width="342" align="center" valign="middle" bordercolor="##F80604" bgcolor="#F80604"><div align="center"><span style="color: aliceblue">Modificar</span></div></td>
</TR> 
</TR>';
while($fila=mysqli_fetch_array($result2))
{
	  $nombre=$fila['nombre'];
	  $id=$fila['id'];	  
  	  $apellido=$fila['apellido'];
	  $cedula=$fila['cedula'];
      $email=$fila['email'];


   //******************************************************************************************************
	// SECCION DE DATOS O CUERPO DE LA TABLA
	//*****************************************************************************************************
	 
	 echo "<tr>"; 
	 echo "<td bgcolor='#CCCCCC'><div align='left'><span>$nombre</span></div></td>";
     echo "<td bgcolor='#CCCCCC'><div align='left'><span>$apellido</span></div></td>";
     echo "<td bgcolor='#CCCCCC'><div align='left'><span>$cedula</span></div></td>";
     echo "<td bgcolor='#CCCCCC'><div align='left'><span>$email</span></div></td>";
     echo "<td bgcolor='#CCCCCC'><div align=center><input type=button name=Modificar value=Modificar  onClick=javascript:Modificar2('ventanaModificarUsuario.php?codigo=$id',650,400)></td>";
     echo "</tr>";  
}
	mysqli_close($link); 			//Cierre de Coneccion
 ?>
    </div></td>
  </tr>
  <tr>
    
  </tr>
</table>
</form>
</body>
</html>