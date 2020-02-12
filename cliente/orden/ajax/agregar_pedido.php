<?php
/* -------------------------
  Autor: Obed Alvarado
  Web: obedalvarado.pw
  Mail: info@obedalvarado.pw
  --------------------------- */
include_once '../../../modelAdmin/ModelAdmin.php';
require_once '../../../modelAdmin/ModelAdmin.php';
include_once '../../../modelAdmin/Database.php';
require_once '../../../modelAdmin/Database.php';

/* Connect To Database */
require_once ("../config/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos

session_start();

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




$id_cliente = $dato['C4'];

if (isset($_POST['cantidad'])) {
    $cantidad = $_POST['cantidad'];
    echo $cantidad;
}
if (isset($_POST['precio_venta'])) {
    $precio_venta = $_POST['precio_venta'];
    echo $precio_venta;
}


if (!empty($id_cliente) and ! empty($cantidad) and ! empty($precio_venta)) {
    echo $id_cliente;
    
    $insert_tmp = mysqli_query($con, "INSERT INTO tmp (id_producto,cantidad_tmp,precio_tmp,session_id) VALUES ('$id_cliente','$cantidad','$precio_venta','$id_cliente')");
}
if (isset($_GET['id'])) {//codigo elimina un elemento del array
    $id_cliente = intval($_GET['id']);
    $delete = mysqli_query($con, "DELETE FROM tmp WHERE id_tmp='" . $id_cliente . "'");
}
?>
<table class="table">
    <tr>
        <th>CODIGO</th>
        <th>CANT.</th>
        <th>DESCRIPCION</th>
        <th><span class="pull-right">PRECIO UNIT.</span></th>
        <th><span class="pull-right">PRECIO TOTAL</span></th>
        <th></th>
    </tr>
    <?php
    $sumador_total = 0;
    $sql = mysqli_query($con, "select * from tab_alimentopreparado a, tmp t where a.id_alimentopreparado=t.id_producto and t.session_id='" . $id_cliente . "'");
    while ($row = mysqli_fetch_array($sql)) {
        /////////////////
        $id_producto = $row['ID_ALIMENTOPREPARADO'];
        $nombre_producto = $row['NOMBRE_ALIMENTOPREPARADO'];
        $descripcion_producto = $row['DESCRIPCION_ALIMENTOPREPARADO'];
        $id_categoria = $row['ID_CATEGORIA'];
        $sql_categoria = mysqli_query($con, "select DESCRIPCION_CATEGORIA from TAB_CATEGORIA where ID_CATEGORIA='$id_categoria'");
        $rw_categoria = mysqli_fetch_array($sql_categoria);
        $nombre_categoria = $rw_categoria['DESCRIPCION_CATEGORIA'];
        $precio_venta = $row["PRECIO_ALIMENTOPREPARADO"];
        $precio_venta = number_format($precio_venta, 2);
//////////////7
        $id_tmp = $row["id_tmp"];
        $codigo_producto = $row['ID_ALIMENTOPREPARADO'];
        $cantidad = $row['cantidad_tmp'];
        $nombre_producto = $row['NOMBRE_ALIMENTOPREPARADO'];
        $id_categoria = $row['ID_CATEGORIA'];
        if (!empty($id_categoria)) {
            $sql_categoria = mysqli_query($con, "select DESCRIPCION_CATEGORIA from TAB_CATEGORIA where ID_CATEGORIA='$id_categoria'");
            $rw_categoria = mysqli_fetch_array($sql_categoria);
            $nombre_categoria = $rw_categoria['DESCRIPCION_CATEGORIA'];
            $marca_producto = " " . strtoupper($nombre_categoria);
        } else {
            $marca_producto = '';
        }
        $precio_venta = $row['PRECIO_ALIMENTOPREPARADO'];
        $precio_venta_f = number_format($precio_venta, 2); //Formateo variables
        $precio_venta_r = str_replace(",", "", $precio_venta_f); //Reemplazo las comas
        $precio_total = $precio_venta_r * $cantidad;
        $precio_total_f = number_format($precio_total, 2); //Precio total formateado
        $precio_total_r = str_replace(",", "", $precio_total_f); //Reemplazo las comas
        $sumador_total += $precio_total_r; //Sumador
        ?>
        <tr>
            <td><?php echo $codigo_producto; ?></td>
            <td><?php echo $cantidad; ?></td>
            <td><?php echo $nombre_producto  ?></td>
            <td><span class="pull-right"><?php echo $precio_venta_f; ?></span></td>
            <td><span class="pull-right"><?php echo $precio_total_f; ?></span></td>
            <td ><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></span></td>
        </tr>		
        <?php
    }
    ?>
    <tr>
        <td colspan=4><span class="pull-right">TOTAL $</span></td>
        <td><span class="pull-right"><?php echo number_format($sumador_total, 2); ?></span></td>
        <td></td>
    </tr>
</table>
