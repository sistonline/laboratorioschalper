<?php
session_start();

if(isset($_SESSION['usuario']) || isset($_SESSION['nombre']) )
{
session_destroy() ;
}

include_once('functions.php');
$con=Conectar();
$err="";
$u="";
/*Captura de login valen*/





if(!isset($_SESSION['usuario']))
{
    if(isset($_POST['usuario']))
    {        
      $u=verificar_login($_POST['usuario'],$_POST['password'],$con);
      
      
    if($u=="admin")
    {
            $_SESSION['usuario'] = "admin";
            $_SESSION['nombre']=$_POST['usuario'];
            header("location:admin/");        
    }
   
            else {
         $err='Su usuario es incorrecto, intente nuevamente.';
          header("location:./");  
        }
        
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
   <!-- Favicon-->
<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    
 
   

    <title>Laboratorio Schalper</title>

   <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css?v=1.0" rel="stylesheet">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
      <style>
    .gray-bg {
    background-color: #fff;
}
    </style>

</head>

  
    
<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">
                    <img src="images/logo.png" width="400px;">
                </h1>

            </div>
          
        
          
            <form class="m-t" role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">  
                <div class="form-group">
                    <input type="text" class="form-control" name="usuario" placeholder="Usuario" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Ingresar</button>

                 <p><?php echo $err;?></p>
            </form>
            <p class="m-t"> <small>Si no tiene clave solicitela a su administrador</small>
              <script>console.log('usuario: <?php echo $u; ?>')</script>
            </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="assets/js/jquery-2.1.1.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
