<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi pagina</title>
</head>
<body>

<form action="index.php" method="post" onsubmit="return validateForm();">
    <table>
         <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario->id)?>">
         <input type="hidden" name="controlador" value="usuario">
        <input type="hidden" name="accion" value="guardar">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($this->generateCSRFToken()); ?>">
        <tr>
            <td>Nombre :</td>
            <td><input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario->nombre)?>"></td>
        </tr>
        <tr>
            <td>Apellido :</td>
            <td><input type="text" name="apellido" value="<?php  echo htmlspecialchars($usuario->apellido)?>"></td>
        </tr>
        <tr>
            <td>Telefono :</td>
            <td><input type="text" name="telefono" value="<?php  echo htmlspecialchars($usuario->telefono)?>"></td>
        </tr>
        <tr>
            <td>Edad :</td>
            <td><input type="text" name="edad" value="<?php  echo htmlspecialchars($usuario->edad)?>"></td>
        </tr>
        <tr>
          
            <td><input type="submit" name="guardar" value="Guardar"></td>
        </tr>
    </table>
</form>

<script src="js/validateForm.js"></script>


</body>
</html>