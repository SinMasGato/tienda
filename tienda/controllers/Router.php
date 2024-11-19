<?php
class Router {
    private $controller;
    private $action;

    public function __construct() {
        $this->controller = isset($_GET['controller']) ? $_GET['controller'] : 'Preguntas';
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'mostrarProductos';
    }

    public function route() {
        try {
            // Construir nombre del controlador
            $controllerName = ucfirst($this->controller) . 'Controller';
            
            // Verificar si existe el controlador
            if (!file_exists('controllers/' . $controllerName . '.php')) {
                throw new Exception("No se encuentra el controlador");
            }

            // Crear instancia del controlador
            $controller = new $controllerName();
            
            // Verificar si existe el método
            if (!method_exists($controller, $this->action)) {
                throw new Exception("No se encuentra la acción");
            }

            // Ejecutar acción
            $controller->{$this->action}();

        } catch (Exception $e) {
            // En caso de error, redirigir a la página principal
            $controller = new PreguntasController();
            $controller->mostrarProductos();
        }
    }
}