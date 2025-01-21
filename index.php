<?php

try {
    // Sanitizamos las entradas de usuario
    $controlador = isset($_REQUEST['controlador']) 
        ? ucfirst(strip_tags($_REQUEST['controlador'])) 
        : 'Usuario';
    $accion = isset($_REQUEST['accion']) 
        ? strip_tags($_REQUEST['accion']) 
        : 'indexUsuarios';

    // Construimos el nombre del controlador con validación
    $nombreControlador = "controlador/{$controlador}_controlador.php";

    if (!file_exists($nombreControlador)) {
        throw new Exception("El controlador '$controlador' no existe.");
    }

    // Cargamos el controlador
    require_once $nombreControlador;

    // Nombre de la clase del controlador
    $claseControlador = $controlador . "Controlador";

    if (!class_exists($claseControlador)) {
        throw new Exception("La clase controlador '$claseControlador' no existe.");
    }

    $instanciaControlador = new $claseControlador();

    // Verificamos si el método existe
    if (!method_exists($instanciaControlador, $accion)) {
        throw new Exception("La acción '$accion' no existe en el controlador '$controlador'.");
    }

    // Ejecutamos la acción
    call_user_func([$instanciaControlador, $accion]);

} catch (Exception $e) {
    // Manejo de errores
    http_response_code(404);
    echo "Error: " . $e->getMessage();
}

?>




