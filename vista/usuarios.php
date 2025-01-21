<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
     <!-- <a href="index.php?controlador=usuario&accion=mostrarUsuario">Nuevo Registro</a>-->
      <form action="index.php" method="post">
        <input type="hidden" name="controlador" value="usuario">
        <input type="hidden" name="accion" value="mostrarUsuario">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($this->generateCSRFToken()); ?>">
        <button type="submit">Nuevo Registro</button>
      </form>

    <h1>Lista de Usuarios</h1>
    <p>Esta es la lista de usuarios registrados en la base de datos.</p>
    <table>
        <tr>
            <?php 
            require_once("core/constantes.php");
            foreach(usuarioColumns as $column):?>
                <th><?php echo htmlspecialchars($column); ?></th>
            <?php endforeach; ?>
            <th>Acciones</th>
        </tr>
        <?php 
        // Asumiendo que $this->consultarTodo() devuelve objetos PDO
        foreach($this->consultarTodo() as $usuario): ?>
            <tr>
                <td><?php echo htmlspecialchars($usuario->nombre); ?></td>
                <td><?php echo htmlspecialchars($usuario->apellido); ?></td>
                <td><?php echo htmlspecialchars($usuario->telefono); ?></td>
                <td><?php echo htmlspecialchars($usuario->edad); ?></td>
                <td>
                  <!--  <a href="index.php?controlador=usuario&accion=mostrarUsuario&id=<?php //echo htmlspecialchars($usuario->id); ?>">Editar</a>-->
                       <!-- Form para protección CSRF -->
                  <form action="index.php" method="post">
                        <input type="hidden" name="controlador" value="usuario">
                        <input type="hidden" name="accion" value="mostrarUsuario">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario->id); ?>">
                        <input type="hidden" name="csrf_token" value="<?php  htmlspecialchars($this->generateCSRFToken()); ?>"> 
                        <button type="submit">Editar</button>

                  </form>
                </td>
                
                <td>
                   <!--    <a href="index.php?controlador=usuario&accion=eliminar&id=<?php //echo $usuario->id ?>"  onclick="javascript:return confirm('Seguro que deseas Elimianar ? ')" >Eliminar</a></td>-->
                    <!-- Form para protección CSRF -->
                    <form method="post" action="index.php">
                        <input type="hidden" name="controlador" value="usuario">
                        <input type="hidden" name="accion" value="eliminar">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario->id); ?>">
                        <input type="hidden" name="csrf_token" value="<?php  htmlspecialchars($this->generateCSRFToken()); ?>">
                        <button type="submit" onclick="javascript:return confirm('¿Seguro que deseas eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>