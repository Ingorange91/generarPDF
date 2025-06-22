<?php 
    require_once "./config/server.php";
    require "./models/conexion.php";
    
?>


<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php   

    require "./query/query.php";
    $objUsuarios=new usuario();
    $usuarios=$objUsuarios->consultarUsuarios();
    
    
  
?>

     <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Fecha Creado</th>
                <th>Fecha Actualizado</th>
            </tr>
        </thead>
        <tbody>
            <!-- Ejemplo de fila -->
             <?php 
             
             foreach($usuarios as $usuario){ ?>
            <tr>
                <td><?php echo $usuario['usuario_id']?></td>
                <td><?php echo $usuario['usuario_nombre']?></td>
                <td><?php echo $usuario['usuario_apellido']?></td>
                <td><?php echo $usuario['usuario_email']?></td>
                <td><?php echo $usuario['usuario_usuario']?></td>
                <td><?php echo $usuario['usuario_creado']?></td>
                <td><?php echo $usuario['usuario_actualizado']?></td>
            </tr>
            <?php }?>
            <!-- Puedes duplicar y modificar más filas aquí -->
        </tbody>
</body>
</html>
<?php $html=ob_get_clean();?>




<?php
    require "./dompdf/vendor/autoload.php";
    //SACAMOS EL PDF
 // reference the Dompdf namespace
    use Dompdf\Dompdf;

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();

  
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'Portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('ejemplo.pdf', ['Attachment'=>false]);
?>