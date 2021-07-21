<?php 
/***********************************************************************************/
/*
 ██████╗ ██████╗ ███╗   ██╗███████╗██╗  ██╗██╗ ██████╗ ███╗   ██╗
██╔════╝██╔═══██╗████╗  ██║██╔════╝╚██╗██╔╝██║██╔═══██╗████╗  ██║
██║     ██║   ██║██╔██╗ ██║█████╗   ╚███╔╝ ██║██║   ██║██╔██╗ ██║
██║     ██║   ██║██║╚██╗██║██╔══╝   ██╔██╗ ██║██║   ██║██║╚██╗██║
╚██████╗╚██████╔╝██║ ╚████║███████╗██╔╝ ██╗██║╚██████╔╝██║ ╚████║
 ╚═════╝ ╚═════╝ ╚═╝  ╚═══╝╚══════╝╚═╝  ╚═╝╚═╝ ╚═════╝ ╚═╝  ╚═══╝
                                                                 
*/
/***********************************************************************************/

function Conectar()
{ 
 //$con = mysqli_connect("localhost","my_user","my_password","my_db");
$con = mysqli_connect("localhost","csi42276_schalper","Alh_84;3","csi42276_schalper");
if (mysqli_connect_errno())  {  echo "Error al conectar MySQL: " . mysqli_connect_error();  }
return $con;
}
function Desconectar($con)
{
    mysqli_close($con);
}

/***********************************************************************************/

/*██╗   ██╗███████╗██╗   ██╗ █████╗ ██████╗ ██╗ ██████╗ ███████╗
/*██║   ██║██╔════╝██║   ██║██╔══██╗██╔══██╗██║██╔═══██╗██╔════╝
/*██║   ██║███████╗██║   ██║███████║██████╔╝██║██║   ██║███████╗
/*██║   ██║╚════██║██║   ██║██╔══██║██╔══██╗██║██║   ██║╚════██║
/*╚██████╔╝███████║╚██████╔╝██║  ██║██║  ██║██║╚██████╔╝███████║
/* ╚═════╝ ╚══════╝ ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝╚═╝ ╚═════╝ ╚══════╝
/*                                                              */

/***********************************************************************************/
       
function crear_usuario( $tipo, $nombre, $user, $pass) 
{
  $fecha_creacion=date("Y-m-d");
  $activo="Si";
  $con=Conectar();
  $sql="INSERT INTO `usuarios` (`id`, `tipo`, `nombre`, `user`, `pass`, `fecha_creacion`, `activo`) VALUES (NULL, '".$tipo."', '".$nombre."', '".$user."', '".$pass.", ".$fecha_creacion.", ".$activo.");";
  
   	if ($result=mysqli_query($con,$sql))
    {
       return 1; 
        
    } 
    else { return 0;}       
}

/***********************************************************************************/

function borrar_usuario($id)
{
    $con=Conectar();
    $sql = "DELETE FROM usuario WHERE id='$id'";
   	if (mysqli_query($con,$sql))
    {
      if(existe($id)==0){return 0;}
        else {return 1;}        
    }
    else {return 0;}    
}

/***********************************************************************************/
function existe($usuario)
	{
     $con=Conectar();
        $result=0;
        $count=0;  
		$sql = "SELECT * FROM usuarios WHERE user='$usuario'";
	  	if ($result=mysqli_query($con,$sql))
  {   $count=mysqli_num_rows($result);}
    	if($count == 1)
		{            
          return 1;
        }
		else { return 0; }
        mysqli_free_result($result);
	   }

/***********************************************************************************/
       function datos_usuario($user,$con)
       {
          $con=Conectar();
          $sql = "SELECT * FROM usuarios WHERE user='$user'"; 
          $result=mysqli_query($con,$sql);
          $info=mysqli_fetch_array($result,MYSQLI_ASSOC);
           return $info;
       }
       
  /***********************************************************************************/     
       function verificar_login($usuario,$password,$con)
           {   
               $con=Conectar();
               $result=0;
               $count=0;  
               $sql = "SELECT * FROM usuarios WHERE user='$usuario' and pass='$password'";
               $result=mysqli_query($con,$sql);
               $tipo=mysqli_fetch_array($result,MYSQLI_ASSOC);
               $tipo=$tipo['tipo'];
               mysqli_free_result($result);
               return $tipo;
                
              }

/***********************************************************************************/

       function fechaactual()
       {
          $hora= date ("h:i:s");
          $fecha= date ("Y-m-d"); 
          $movhoras=6;
          $fecha2=time(); 
          $fecha2 = $fecha2-($movhoras * 60 * 60); 
          $fecha2 = date("Y-m-d", $fecha2 );
         return($fecha2);
       }

/***********************************************************************************/

/*██████╗  █████╗  ██████╗██╗███████╗███╗   ██╗████████╗███████╗███████╗
/*██╔══██╗██╔══██╗██╔════╝██║██╔════╝████╗  ██║╚══██╔══╝██╔════╝██╔════╝
/*██████╔╝███████║██║     ██║█████╗  ██╔██╗ ██║   ██║   █████╗  ███████╗
/*██╔═══╝ ██╔══██║██║     ██║██╔══╝  ██║╚██╗██║   ██║   ██╔══╝  ╚════██║
/*██║     ██║  ██║╚██████╗██║███████╗██║ ╚████║   ██║   ███████╗███████║
/*╚═╝     ╚═╝  ╚═╝ ╚═════╝╚═╝╚══════╝╚═╝  ╚═══╝   ╚═╝   ╚══════╝╚══════╝
/*                                                                      */

/***********************************************************************************/

function crear_paciente($rut, $nombres, $apellido_paterno, $apellido_materno, $fecha_nacimiento, $email, $telefono, $sexo) 
{
   $con=Conectar();
   $fecha=date("Y-m-d");
 //calcular edad
    $cumpleanos = new DateTime($fecha_nacimiento);
    $hoy = new DateTime();
    $annos = $hoy->diff($cumpleanos);
    $edad = $annos->y;
    echo "<script>console.log('Edad: ".$edad."' )</scrip>";
    $sqlid="select max(id) as id from paciente";
    $resultado_id=mysqli_query($con,$sqlid);
    $id=mysqli_fetch_arra($resultado_id, MYSQLI_ASSOC);
    $ficha=$id['id']+1;
    echo "<script>console.log('Ficha a crear: ".$ficha."')</scrip>";
    $sql="INSERT INTO `paciente` (`rut`, `nombres`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `email`, `telefono`, `sexo`, `fecha_creacion`) VALUES ('$rut', '$nombres', '$apellido_paterno', '$apellido_materno', '$fecha_nacimiento', '$email', '$telefono', '$sexo', '$fecha');";  
        if ($result=mysqli_query($con,$sql))
        { return 1; } 
        else { return 0;}    
}

function crear_paciente_vacio($rut) 
{
   $con=Conectar();
   $fecha=date("Y-m-d");   
    $hoy = new DateTime();
    $sql="INSERT INTO `paciente` (`rut`, `fecha_creacion`) VALUES ('$rut', '$fecha');";  
        if ($result=mysqli_query($con,$sql))
        { return 1; } 
        else { return 0;}    
}



/***********************************************************************************/

function datos_paciente($rut)
{
   $con=Conectar();
   $sql = "SELECT * FROM paciente WHERE rut='$rut'"; 
   $result=mysqli_query($con,$sql);
   $info=mysqli_fetch_array($result,MYSQLI_ASSOC);
    return $info;
}

/***********************************************************************************/

function edad_paciente($rut)
{
$con=Conectar();
$sql="SELECT * FROM paciente WHERE rut='$rut'";
$result=mysqli_query($con,$sql);
$info=mysqli_fetch_array($result,MYSQLI_ASSOC);
$date=$info['fecha_nacimiento'];
$cumpleanos = new DateTime($fecha_nacimiento);
$hoy = new DateTime();
$annos = $hoy->diff($cumpleanos);
$edad = $annos->y;
return $edad;
}
/***********************************************************************************/

function actualizar_paciente($rut, $nombres, $apellido_paterno, $apellido_materno, $fecha_nacimiento, $email, $telefono, $sexo)
{
$con=Conectar();
$sql_update="UPDATE `paciente` SET `nombres` = '$nombre', `apellido_paterno` = '$apellido_paterno', `apellido_materno` = '$apellido_materno', `fecha_nacimiento` = '$fecha_nacimiento', `email` = '$email', `telefono` = '$telefono', `sexo` = '$sexo' WHERE `paciente`.`rut` = '$rut';";
if ($result=mysqli_query($con,$sql_update))
{
return 1;
}
else {return 0;}
}

/***********************************************************************************/

function eliminar_paciente ($rut)
    {
        $con=Conectar();
        $sql = "DELETE FROM paciente WHERE rut='$rut'";
        if (mysqli_query($con,$sql))
        {
          else {return 1;}
            
        }
        else {return 0;}        
    }

/***********************************************************************************/


/***********************************************************************************/
/*███████╗██╗  ██╗ █████╗ ███╗   ███╗███████╗███╗   ██╗███████╗███████╗
/*██╔════╝╚██╗██╔╝██╔══██╗████╗ ████║██╔════╝████╗  ██║██╔════╝██╔════╝
/*█████╗   ╚███╔╝ ███████║██╔████╔██║█████╗  ██╔██╗ ██║█████╗  ███████╗
/*██╔══╝   ██╔██╗ ██╔══██║██║╚██╔╝██║██╔══╝  ██║╚██╗██║██╔══╝  ╚════██║
/*███████╗██╔╝ ██╗██║  ██║██║ ╚═╝ ██║███████╗██║ ╚████║███████╗███████║
/*╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝     ╚═╝╚══════╝╚═╝  ╚═══╝╚══════╝╚══════╝
/*                                                                     */
/***********************************************************************************/

function crear_examen($rut,$solicitado_por,$tipo_examen,$examen_macro,$examen_micro,$resultado_critico,$prestamo_material,$fecha_prestamo,$fecha_devolucion,$patologo,$procedencia,$muestra_de,$diagnostico_clinico,$fecha_recepcion,$fecha_informe,$creado_por)
{
    $con=Conectar();
    $sql="INSERT INTO `examenes` (`id_examen`, `rut_paciente`, `solicitado_por`, `tipo_examen`, `examen_macro`, `examen_micro`, `resultado_critico`, `prestamo_material`, `fecha_prestamo`, `fecha_devolucion`, `patologo`, `procedencia`, `muestra_de`, `diagnostico_clinico`, `fecha_recepcion`, `fecha_informe`, `creado_por`) VALUES (NULL, '$rut', '$solicitado_por', '$tipo_examen', '$examen_macro', '$examen_micro', '$resultado_critico', '$prestamo_material', '$fecha_prestamo', '$fecha_devolucion', '$patologo', '   $procedencia', '$muestra_de', ' $diagnostico_clinico', '$fecha_recepcion', '$fecha_informe', '$creado_por');";
    if ($result=mysqli_query($con,$sql))
    { return 1; } 
    else { return 0;} 
}

/***********************************************************************************/

function crear_examen_vacio($rut,$creado_por)
{
    $con=Conectar();
    $sql="INSERT INTO `examenes` (`id_examen`, `rut_paciente`, `creado_por`) VALUES (NULL, '$rut', '$creado_por');";
    if ($result=mysqli_query($con,$sql))
    { return 1; } 
    else { return 0;} 
}

/***********************************************************************************/

function datos_examen($id_examen)
{

    $con=Conectar();
    $sql = "SELECT * FROM examenes WHERE id_examen='$id_examen'"; 
    $result=mysqli_query($con,$sql);
    $info=mysqli_fetch_array($result,MYSQLI_ASSOC);
     return $info;

}

/***********************************************************************************/
 
function actualizar_examen($id_examen, $rut,$solicitado_por,$tipo_examen,$examen_macro,$examen_micro,$resultado_critico,$prestamo_material,$fecha_prestamo,$fecha_devolucion,$patologo,$procedencia,$muestra_de,$diagnostico_clinico,$fecha_recepcion,$fecha_informe,$creado_por)
{
$con=Conectar();
$sql_update="UPDATE `examenes` SET `solicitado_por` = '$solicitado_por', `tipo_examen` = '$tipo_examen', `examen_macro` = '$examen_macro', `examen_micro` = '$examen_micro', `resultado_critico` = '$resultado_critico', `prestamo_material` = '$prestamo_material', `fecha_prestamo` = '$fecha_prestamo', `fecha_devolucion` = '$fecha_devolucion', `patologo` = '$patologo', `procedencia` = '$procedencia', `muestra_de` = '$muestra_de', `diagnostico_clinico` = '$diagnostico_clinico', `fecha_recepcion` = '$fecha_recepcion', `fecha_informe` = '$fecha_informe', `creado_por` = '$creado_por' WHERE `biopsia`.`id_examen` = '$id_examen';";
if ($result=mysqli_query($con,$sql_update))
{
return 1;
}
else {return 0;}
}



/***********************************************************************************/

/*
foreach ($_POST as $key => $input_arr)
{
$_POST[$key] = addslashes(limpiarCadena($input_arr));
}
*/

$input_arr = array();
foreach ($_GET as $key => $input_arr)
{
$_GET[$key] = addslashes(limpiarCadena($input_arr));
}


function limpiarCadena($valor)
{
	$valor = str_ireplace("SELECT","",$valor);
	$valor = str_ireplace("COPY","",$valor);
	$valor = str_ireplace("DELETE","",$valor);
	$valor = str_ireplace("DROP","",$valor);
	$valor = str_ireplace("DUMP","",$valor);
	$valor = str_ireplace(" OR ","",$valor);
	$valor = str_ireplace("%","",$valor);
	$valor = str_ireplace("LIKE","",$valor);
	$valor = str_ireplace("--","",$valor);
	$valor = str_ireplace("^","",$valor);
	$valor = str_ireplace("[","",$valor);
	$valor = str_ireplace("]","",$valor);
	$valor = str_ireplace("!","",$valor);
	$valor = str_ireplace("¡","",$valor);
	$valor = str_ireplace("?","",$valor);
	$valor = str_ireplace("&","",$valor);
	return $valor;
}



?>