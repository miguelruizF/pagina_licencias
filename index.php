<?php
    include_once "bd_datos/conec_bd.php";
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT * FROM licencias";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $licencias = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

<body>
    <section class="bg-primary rounded">
        <div class="container p-3 mb-4">
            <h1 class="text-center text-white text-uppercase">Vencimiento de Dominios - OEK</h1>
        </div>
    </section>
    <section class="container">
        <table id="tb_licencias" class="table table-striped table-bordered table-dark" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Nombre de Dominio</th>
                    <th>Fecha de Registro</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Estado de Renovacion</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($licencias as $licencias) {
                    ?>
                <tr>
                    <td><?php echo $licencias["id_dominio"]?></td>
                    <td><?php echo $licencias["nombre_dominio"]?></td>
                    <td><?php echo $licencias["fecha_registro"]?></td>
                    <td><?php echo $licencias["fecha_vencimiento"]?></td>
                    <td><?php echo $licencias["estado_renovacion"]?></td>
                    <td><?php echo $licencias["status"]?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
            <!--
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
            -->
        </table>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    
    <script>
       $(document).ready(function () {
         $("#tb_licencias").DataTable({
             "language":{
                "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
             }
         });  
       });
    </script>
</body>
</html>