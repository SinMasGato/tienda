<?php
class PreguntasController {
    private $modelo;

    public function __construct() {
        $this->modelo = new ModelBBDD();
    }

    public function mostrarProductos() {
        $fabricantes = $this->modelo->getFabricantes();
        $tipos = ['Portátil', 'Monitor', 'Impresora', 'Almacenamiento', 'Tarjeta Gráfica', 'Memoria RAM'];
        $productos = [];
        $mensaje = '';
        $tipoBusqueda = '';
        $criterio = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['fabricante'])) {
                $productos = $this->modelo->buscarPorFabricante($_POST['fabricante']);
                $tipoBusqueda = 'Fabricante';
                $criterio = $_POST['fabricante'];
            } elseif (!empty($_POST['tipo'])) {
                $productos = $this->modelo->buscarPorTipo($_POST['tipo']);
                $tipoBusqueda = 'Tipo';
                $criterio = $_POST['tipo'];
            } elseif (isset($_POST['precio']) && $_POST['precio'] !== '') {
                $productos = $this->modelo->buscarPorPrecio($_POST['precio']);
                $tipoBusqueda = 'Precio máximo';
                $criterio = number_format($_POST['precio'], 2) . '€';
            }

            $mensaje = empty($productos) ? 
                      "No se encontraron productos para $tipoBusqueda: $criterio" : 
                      "Resultados para $tipoBusqueda: $criterio";
        }

        require_once 'views/preguntas.php';
    }
}