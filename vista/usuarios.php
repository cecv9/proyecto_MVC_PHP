<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
    <a href="index.php?controlador=usuario&accion=mostrarUsuario">Nuevo Registro</a>
    <table>
    <tr>
        <?php require_once("core/constantes.php");
        foreach(usuarioColumns as $value):?>
        <td>
            <?php echo $value;?>
        </td>    
        <?php endforeach;?>
    </tr>
            <?php foreach($this->consultarTodo() as $usuario): ?>
    <tr>
        <td> <?php echo $usuario->nombre?>  </td>
        <td> <?php echo $usuario->apellido?></td>
        <td> <?php echo $usuario->telefono?></td>
        <td> <?php echo $usuario->edad?>     </td>
        <td><a href="index.php?controlador=usuario&accion=mostrarUsuario&id=<?php echo $usuario->id?>" >Editar</a></td>
        <td><a href="index.php?controlador=usuario&accion=eliminar&id=<?php echo $usuario->id ?>"  onclick="javascript:return confirm('Seguro que deseas Elimianar ? ')" >Eliminar</a></td>
    </tr>
    <?php endforeach;?>
    </table>
</body>
</html>