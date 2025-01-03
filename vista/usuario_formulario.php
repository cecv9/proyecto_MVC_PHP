<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi pagina</title>
</head>
<body>

<form action="index.php?controlador=usuario&accion=guardar" method="post">
    <table>
    <input type="hidden" name="id" value="<?php echo $usuario->id?>">
        <tr>
            <td>Nombre :</td>
            <td><input type="text" name="nombre" value="<?php echo $usuario->nombre?>"></td>
        </tr>
        <tr>
            <td>Apellido :</td>
            <td><input type="text" name="apellido" value="<?php  echo $usuario->apellido?>"></td>
        </tr>
        <tr>
            <td>Telefono :</td>
            <td><input type="text" name="telefono" value="<?php  echo $usuario->telefono?>"></td>
        </tr>
        <tr>
            <td>Edad :</td>
            <td><input type="text" name="edad" value="<?php  echo $usuario->edad?>"></td>
        </tr>
        <tr>
          
            <td><input type="submit" name="guardar" value="Guardar"></td>
        </tr>
    </table>
</form>
    
</body>
</html>