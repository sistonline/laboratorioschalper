<?php 

function Conectar()
{ 
 //$con = mysqli_connect("localhost","my_user","my_password","my_db");
$con = mysqli_connect("localhost","laborato_schalper","schalper2021","laborato_schalper");
if (mysqli_connect_errno())  {  echo "Error al conectar MySQL: " . mysqli_connect_error();  }
return $con;
}
function Desconectar($con)
{
    mysqli_close($con);
}


//obtiene los datos de la sesión
function datos_usuario($user,$con)
{
   
   $sql = "SELECT * FROM user WHERE usuario='$user'"; 
   $result=mysqli_query($con,$sql);
   $info=mysqli_fetch_array($result,MYSQLI_ASSOC);
    return $info;
}


function verificar_login($user,$password,$con)
	{
        $result=0;
        $count=0;  
		$sql = "SELECT * FROM user WHERE usuario='$user' and clave='$password'";
	  	$result=mysqli_query($con,$sql);
        $tipo=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $clase=$tipo['tipo'];
        mysqli_free_result($result);
        return $clase;
         
	   }


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




 
function datos_producto($producto,$con)
{
   
   $sql = "SELECT * FROM mensajeros WHERE id='$mensajero'"; 
   $result=mysqli_query($con,$sql);
   $info=mysqli_fetch_array($result,MYSQLI_ASSOC);
    return $info;
}
 

//obtiene los datos de cliente o proveedor
function datos_cliente($rut)
{
   $con=Conectar();
   $sql = "SELECT * FROM clientes_y_proveedores WHERE rut='$rut'"; 
   $result=mysqli_query($con,$sql);
   $info=mysqli_fetch_array($result,MYSQLI_ASSOC);
   return $info;
}
 



function datos_ingreso_factura($n_factura)
{
    $con=Conectar();
   $sql = "SELECT * FROM ingreso_factura WHERE n_factura_procedencia='$n_factura'"; 
   $result=mysqli_query($con,$sql);
   $info=mysqli_fetch_array($result,MYSQLI_ASSOC);
   return $info;
}
 


function existe_ingreso_factura($n_factura)
	{
     $con=Conectar();
        $result=0;
        $count=0;  
		$sql = "SELECT * FROM ingreso_factura WHERE n_factura_procedencia='$n_factura'";
	  	if ($result=mysqli_query($con,$sql))
  {   $count=mysqli_num_rows($result);}
    	if($count == 1)
		{            
          return 1;
        }
		else { return 0; }
        mysqli_free_result($result);
	   }


function existe($user)
	{
     $con=Conectar();
        $result=0;
        $count=0;  
		$sql = "SELECT * FROM user WHERE usuario='$user'";
	  	if ($result=mysqli_query($con,$sql))
  {   $count=mysqli_num_rows($result);}
    	if($count == 1)
		{            
          
            return 1;
        }
		else { return 0; }
        mysqli_free_result($result);
	   }



function existe_proveedor($rut)
	{
        $con=Conectar();
        $result=0;
        $count=0;  
		$sql = "SELECT * FROM `clientes_y_proveedores` WHERE rut='$rut'";
	  	if ($result=mysqli_query($con,$sql))
        {     $count=mysqli_num_rows($result);}
    	      if($count >= 1)
		      {            
               return 1;
              }
		      else
              { 
              return 0;
              }
        mysqli_free_result($result);
	   }





function existe_id($id)
	{
     $con=Conectar();
        $result=0;
        $count=0;  
		$sql = "SELECT * FROM usuer WHERE id='$id'";
	  	if ($result=mysqli_query($con,$sql))
  {   $count=mysqli_num_rows($result);}
    	if($count == 1)
		{            
          
            return 1;
        }
		else { return 0; }
        mysqli_free_result($result);
	   }



function existe_producto_nombre($nombre)
	{
     $con=Conectar();
        $result=0;
        $count=0;  
		$sql = "SELECT * FROM productos WHERE nombre='$nombre'";
	  	if ($result=mysqli_query($con,$sql))
  {   $count=mysqli_num_rows($result);}
    	if($count == 1)
		{            
          return 1;
        }
		else { return 0; }
        mysqli_free_result($result);
	   }

function existe_producto_codigo($codigo)
	{
     $con=Conectar();
        $result=0;
        $count=0;  
		$sql = "SELECT * FROM productos WHERE id='$codigo'";
	  	if ($result=mysqli_query($con,$sql))
  {   $count=mysqli_num_rows($result);}
    	if($count == 1)
		{            
          return 1;
        }
		else { return 0; }
        mysqli_free_result($result);
	   }



function existe_cliente($rut)
	{
        $con=Conectar();
        $result=0;
        $count=0;  
		$sql = "SELECT * FROM clientes_y_proveedores WHERE rut='$rut'";
	  	if ($result=mysqli_query($con,$sql))
  {   $count=mysqli_num_rows($result);}
    	if($count == 1)
		{            
          return 1;
        }
		else { return 0; }
        mysqli_free_result($result);
	   }






function existe_categoria($nombre)
	{
     $con=Conectar();
        $result=0;
        $count=0;  
		$sql = "SELECT * FROM categorias WHERE nombre='$nombre'";
	  	if ($result=mysqli_query($con,$sql))
  {   $count=mysqli_num_rows($result);}
    	if($count == 1)
		{            
          return 1;
        }
		else { return 0; }
        mysqli_free_result($result);
	   }

function borrar_usuario($id)
{
    $con=Conectar();
    $sql = "DELETE FROM user WHERE id='$id'";
   	if (mysqli_query($con,$sql))
    {
      if(existe_id($id)==0){return 0;}
        else {return 1;}
        
    }
    else {return 1;}
    
}


function borrar_producto($id)
{
    $con=Conectar();
    $sql = "DELETE FROM productos WHERE id='$id'";
   	if (mysqli_query($con,$sql))
    {
      if(existe_mensajero($id)==0){return 0;}
        else {return 1;}
        
    }
    else {return 1;}
    
}

    


function crear_usuario( $usuario, $clave, $tipo, $nombre, $email) 
{
   $con=Conectar();
  $sql=" INSERT INTO `user` (`id`, `usuario`, `clave`, `tipo`, `nombre`, `email`) VALUES (NULL, '$usuario', '$clave', '$tipo', '$nombre', '$email');";
  
   	if ($result=mysqli_query($con,$sql))
    {
       return 1; 
        
    } 
    else { return 0;}   
    
}



function crear_paciente($rut, $nombres, $apellidop, $apellidom, $fnacimiento, $email, $telefono) 
{
   $con=Conectar();
   $fecha=date("Y-m-d");
 //calcular edad
    $cumpleanos = new DateTime($fnacimiento);
    $hoy = new DateTime();
    $annos = $hoy->diff($cumpleanos);
    $edad = $annos->y;
    echo "<script>console.log('Edad: ".$edad."' )</scrip>";    
//setear numero ficha
$sqlid="select max(id) as id from pacientes";
$resultado_id=mysqli_query($con,$sqlid);
$id=mysqli_fetch_arra($resultado_id, MYSQLI_ASSOC);
$ficha=$id['id']+1;
echo "<script>console.log('Ficha a crear: ".$ficha."' )</scrip>";


   $sql="INSERT INTO `paciente` (`id`, `rut`, `nombres`, `apellidop`, `apellidom`, `fecha_registro`, `edad`, `numero_ficha`, `fnacimiento`, `email`, `telefono`) 
   VALUES (NULL, '$rut', '$nombre', '$apellidop', '$aperllidom', 'current_timestamp()', '$edad', '$ficha', '$fnacimiento', '$email', '$telefono');";  


   	if ($result=mysqli_query($con,$sql))
    { return 1; } 
    else { return 0;}    
}


function crear_categoria($nombre) 
{
   $con=Conectar();
    $fecha=date("Y-m-d");
  $sql=" INSERT INTO `categorias` (`id`, `nombre`) VALUES (NULL,  '$nombre');";  
   	if ($result=mysqli_query($con,$sql))
    { return 1; } 
    else { return 0;}    
}








function  ingreso_factura( $n_factura, $rut, $condicion_pago, $estado_pago, $neto, $iva, $total, $estado, $fecha, $observaciones)    
   
{
  $con=Conectar();
  $fecha_entrada=explode("/", $fecha);
  $fecha_corr=$fecha_entrada[2]."-".$fecha_entrada[1]."-".$fecha_entrada[0];  
  $fecha_salida=date("Y-m-d");
  $sql="INSERT INTO `ingreso_factura` (`id`, `n_factura_procedencia`, `rut_proveedor`, `condicion_pago`, `estado_pago`, `valor_neto`, `iva`, `total`, `estado`, `fecha`,  `fecha_salida`, `observaciones`) VALUES (NULL, '$n_factura', '$rut', '$condicion_pago', '$estado_pago', '$neto', '$iva', '$total', '$estado', '$fecha_corr', '$fecha_salida', '$observaciones');";  
   	if ($result=mysqli_query($con,$sql))
    { return 1; } 
    else { return 0;}    
}


function  crear_ot($rut, $mecanico, $nombre, $fecha, $direccion, $giro, $telefono, $email, $tipo_vehiculo, $patente, $problema, $observaciones )    
{
  $con=Conectar();
  $fecha_entrada=explode("/", $fecha);
  $fecha=$fecha_entrada[2]."-".$fecha_entrada[1]."-".$fecha_entrada[0];  
 
  $sql="INSERT INTO `ot` (`ot`, `fecha`, `mecanico`, `rut_cliente`, `nombre`, `direccion`, `giro`, `telefono`, `email`, `tipo_vehiculo`, `patente`, `problema`, `observaciones`, `informe`, `valor_mano_obra`, `estado`, `condicion_pago`, `estado_pago`, `factura`,`abono` ) VALUES (NULL, '".$fecha."', '".$mecanico."', '".$rut."', '".$nombre."', '".$direccion."', '".$giro."', '".$telefono."', '".$email."', '".$tipo_vehiculo."', '".$patente."', '".$problema."', '".$observaciones."', NULL, '0', 'Abierta', NULL, NULL, NULL, '0');";
  
    
    
   	if ($result=mysqli_query($con,$sql))
    { return 1; } 
    else { return 0;}    
}



function crear_factura( $rut, $nombre, $fecha, $direccion, $giro, $telefono, $email, $observaciones )
       
{
  $con=Conectar();
  $fecha_entrada=explode("/", $fecha);
  $fecha=$fecha_entrada[2]."-".$fecha_entrada[1]."-".$fecha_entrada[0];  
 
  $sql="INSERT INTO `facturas` (`id`,`factura`, `fecha`,  `rut_cliente`, `nombre`, `direccion`, `giro`, `telefono`, `email`,  `observaciones`, `valor_mano_obra`,`estado`,`condicion_pago`,`estado_pago`,`abono`,`descuento` ) 
                        VALUES (NULL, NULL, '".$fecha."', '".$rut."', '$nombre', '$direccion', '$giro', '$telefono', '$email',  '$observaciones' , '0', 'Abierta', NULL, 'Pago Pendiente', '0', '0');";  
   	if ($result=mysqli_query($con,$sql))
    { return 1; } 
    else { return 0;}    
    
}


function crear_proveedor($nombre, $rut, $giro, $telefono, $direccion, $email) 
{   $con=Conectar();
    $sql="INSERT INTO `clientes_y_proveedores` (`id`, `nombre`, `rut`, `giro`, `telefono`, `direccion`, `email`) VALUES (NULL, '$nombre', '$rut', ' $giro', '$telefono', '$direccion', '$email');";  
   	if ($result=mysqli_query($con,$sql))
    { return 1; } 
    else { return 0;}    
}
   
$input_arr = array();


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


function hay_stock($producto, $cantidad)
{
  $stock_original=0;
  $stock_salida=0;  
  $con=conectar();  
  $sql="select stock from productos where id='$producto'";
  $info= mysqli_query($con, $sql);
  $data=mysqli_fetch_array($info, MYSQLI_ASSOC);     
  $stock_original=$data['stock'];  
    
   $sql2="select cantidad_descontada from salida_stock where id_producto='".$producto."' and estado='Abierta'"; 
   $info2= mysqli_query($con, $sql2);
  while( $data2=mysqli_fetch_array($info2, MYSQLI_ASSOC)) 
  { 
      
   $stock_salida= $stock_salida + $data2['cantidad_descontada']; 
      
  }
    $stock_salida=$stock_salida+$cantidad;   
    $stock_restante=$stock_original-$stock_salida;    
    return $stock_restante;
    
}



?>