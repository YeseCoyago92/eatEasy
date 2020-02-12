<?php
session_start();
include_once '../../modelAdmin/ModelAdmin.php';
require_once '../../modelAdmin/ModelAdmin.php';

$model = new ModelAdmin();

if (!isset($_SESSION['sesionDTO'])) {
    header('Location: ../../view/web/index.html');
    die();
}
$sesionDTO = unserialize($_SESSION['sesionDTO']);
if ($sesionDTO->getRol() != "2") {
    header('Location: ../../view/web/index.html');
    die();
}
$correo = $sesionDTO->getCorreo();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="../../estilos.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link href="../administrador/now-ui-dashboard-master/now-ui-dashboard-master/assets/css/switch.css" rel="stylesheet" />
        <link href="../administrador/now-ui-dashboard-master/now-ui-dashboard-master/assets/demo/demo.css" rel="stylesheet" />
        <title>PEDIR</title>  
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
        <!--<link rel=icon href='http://obedalvarado.pw/img/logo-icon.png' sizes="32x32" type="image/png">-->
    </head>
    <body>
        <header>
            <nav id="nav" class="nav1">
                <div class="contenedor-nav">
                    <div class="logo">

                    </div>
                    <div class="enlaces" id="enlaces">
                        <a href='../../controller/controllerAdmin.php?opcion=ver_aplimentop'> Pedir</a> 
                        <a href="../../cliente/alim_agregar.php"  class="btn-header">Vender</a> 
                        <a href='../../controller/controllerAdmin.php?opcion=ver_aplimentop_per&correo=<?php echo $sesionDTO->getCorreo() ?>'> Mis Ventas</a>                     
                        <a href="../../controller/controllerLogin.php?opcion=close" class="btn-header">Cerrar Sesión</a>
                    </div>
                    <div class="icono" id="open">
                        <span>&#9776;</span>
                    </div>
                </div>
            </nav>
        </header>

        <table style="margin: 0 auto;">
            <tr>
                <td bgcolor="white">


                    <div class="container">
                        <div class="row-fluid">

                            <div class="col-md-12">
                                <h2><span class="glyphicon glyphicon-edit"></span> Nuevo Pedido</h2>
                                <hr>
                                <form class="form-horizontal" role="form" id="datos_pedido">
                                    <?php
                                    // echo $correo;

                                    $pdo = Database::connect();
                                    $sql1 = "select curDate() as fecha";
                                    $sql = "SELECT P.ID_PERSONA AS C4,P.CEDULA_PERSONA AS C3,P.APELLIDOS_PERSONA as c1, P. NOMBRES_PERSONA as c2
                    FROM TAB_PERSONA P, TAB_PERSONA_ROL PR
                    WHERE P.ID_PERSONA = PR.ID_PERSONA
                    AND P.CORREO_PERSONA =  ?";
                                    $sql2 = "SELECT MAX(ID_ORDEN) as p1 FROM TAB_ORDEN";
                                    $consulta = $pdo->prepare($sql);
                                    $consulta1 = $pdo->prepare($sql1);
                                    $consulta2 = $pdo->prepare($sql2);

                                    $consulta->execute(array($correo));
                                    $consulta1->execute(array());
                                    $consulta2->execute(array());


                                    $dato = $consulta->fetch();
                                    $dato1 = $consulta1->fetch();
                                    $dato2 = $consulta2->fetch();
                                    echo "<table border=0 style='margin: 0 auto;'>"
                                    . "<tr>"
                                            . "<td><h2> <b>FECHA:</B> " . $dato1['fecha'];
                                    echo "</h2></td> <td hidden>";
                                    echo "<b>iD</B> " . $dato['C4'];
                                    echo "</td></tr><tr>";
                                    echo "<td><h4><b>CEDULA:</B> " . $dato['C3'] . " </h4></td><td>                 <h4><b>NOMBRES: </B> " . $dato ['c1'] . " " . $dato['c2'];
                                    echo "</h4></td>";

                                  
                                  echo "</tr>"
                                            . "</table>";
                                    echo $dato2['p1'];
                                    ?>					

                                    <hr>
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                                                <span class="glyphicon glyphicon-plus"></span> Agregar productos
                                            </button>
                                            <button type="submit" class="btn btn-default">
                                                <span class="glyphicon glyphicon-print"></span> Imprimir
                                            </button>
                                        </div>	
                                    </div>
                                </form>
                                <br><br>
                                <div id="resultados" class='col-md-12'></div><!-- Carga los datos ajax -->

                                <!-- Modal -->
                                <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
                                                        </div>
                                                        <button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>
                                                    </div>
                                                </form>
                                                <div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
                                                <div class="outer_div" ></div><!-- Datos ajax Final -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>	
                        </div>
                    </div>

                </td>
            </tr>
        </table>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/VentanaCentrada.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
       
        <script>
                                                            $(document).ready(function () {
                                                                load(1);
                                                            });

                                                            function load(page) {
                                                                var q = $("#q").val();
                                                                var parametros = {"action": "ajax", "page": page, "q": q};
                                                                $("#loader").fadeIn('slow');
                                                                $.ajax({
                                                                    url: './ajax/productos_pedido.php',
                                                                    data: parametros,
                                                                    beforeSend: function (objeto) {
                                                                        $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
                                                                    },
                                                                    success: function (data) {
                                                                        $(".outer_div").html(data).fadeIn('slow');
                                                                        $('#loader').html('');

                                                                    }
                                                                })
                                                            }
        </script>
       
        <script>
            function agregar(id)
            {
                var precio_venta = $('#precio_venta_' + id).val();
                var cantidad = $('#cantidad_' + id).val();
                //Inicia validacion
//                if (isNaN(cantidad))
//                {
//                    alert('Esto no es un numero');
//                    document.getElementById('cantidad_' + id).focus();
//                    return false;
//                }
//                if (isNaN(precio_venta))
//                {
//                    alert('Esto no es un numero');
//                    document.getElementById('precio_venta_' + id).focus();
//                    return false;
//                }
                //Fin validacion
                var parametros = {"id": id, "precio_venta": precio_venta, "cantidad": cantidad};
                $.ajax({
                    
                    type: "POST",
                    url: "./ajax/agregar_pedido.php",
                    data: parametros,
                    beforeSend: function (objeto) {
                        $("#resultados").html("Mensaje: Cargando...");
                    },
                    success: function (datos) {
                        $("#resultados").html(datos);
                    }
                });
            }

            function eliminar(id)
            {

                $.ajax({
                    type: "GET",
                    url: "./ajax/agregar_pedido.php",
                    data: "id=" + id,
                    beforeSend: function (objeto) {
                        $("#resultados").html("Mensaje: Cargando...");
                    },
                    success: function (datos) {
                        $("#resultados").html(datos);
                    }
                });

            }

         
        </script>


        <script type="text/javascript">
            $(document).ready(function () {
                $(".proveedor").select2({
                    ajax: {
                        url: "ajax/load_proveedores.php",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term // search term
                            };
                        },
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },
                        cache: true
                    },
                    minimumInputLength: 2
                });
            });
        </script>
    </body>
</html>