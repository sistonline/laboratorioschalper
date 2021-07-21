<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laboratorio | Schalper - Ingreso de Fichas</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    
    <link href="../assets/css/plugins/iCheck/custom.css" rel="stylesheet">
     
    <link href="../assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    
    
    

</head>

<body>

    <div id="wrapper">
<?php
        
        include_once('menu.php');
        ?>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                <form role="search" class="navbar-form-custom" action="search_results.html">
                    <div class="form-group">
                        <input type="text" placeholder="Buscar..." class="form-control" name="top-search" id="top-search">
                    </div>
                </form>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Bienvenido a Laboratorio Schalper.</span>
                </li>
               
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-danger">0</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                       
                    
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Salir
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>LABORATORIO SCHALPER</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <a>Ingreso Fichas</a>
                        </li>
                       
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            
            
            
               <div class="wrapper wrapper-content animated fadeInRight">
       


            <div class="row">
            
               
        </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Ingreso de Fichas</h5>                        
                        </div>
                        <div class="ibox-content">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];  ?>"class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">

                             <div class="row">
                                 <div class="col-sm-2"></div>

                                <div class="col-lg-4">
                                <div class="row">  
                                                   
                                    <div class="col-sm-10">
                                        <label class="control-label"> Buscar ficha: </label>
                                        <input type="text" name="ficha" class="form-control mb-3 pb-3" > 
                                        <button type="submit"  class="btn btn-primary" type="submit" style=" margin-top: 1em;">
                                        Buscar <i class="fa fa-search"></i>
                                        </button>

                                        </div>
                                </div>
                                </div>



                                <div class="col-lg-4">
                                <div class="row">  
                                                   
                                    <div class="col-sm-10">
                                    <label class="control-label">Buscar fichas por Rut:  </label>
                                        <input type="text" name="ficha" class="form-control mb-3 pb-3" > 
                                        <button type="submit"  class="btn btn-primary" type="submit" style=" margin-top: 1em;">
                                    Buscar <i class="fa fa-search"></i>
                                    </button>

                                        </div>
                                </div>
                                </div>

                                
                            
                                </div>


                            
                              
                               <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"> &nbsp;
                                  </label>

                                    <div class="col-sm-10">
                                    <a href="<? echo $_SERVER['PHP_SELF']; ?>"  class="btn btn-primary" type="submit" style=" margin-top: 1em;">
                                    <i class="fa fa-save"></i> Crear ficha N°: XXX
                                    </a>
                                      
                                    </div>
                                </div>

                           
                                <div class="hr-line-dashed"></div>
                              
                                                             
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
            
            
            
            
      
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="../assets/js/jquery-2.1.1.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../assets/js/inspinia.js"></script>
    <script src="../assets/js/plugins/pace/pace.min.js"></script>
    
    

    <!-- iCheck -->
    <script src="../assets/js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>


</body>

</html>
