<?php
class ModelBBDD {
    private $host = 'localhost';
    private $db = 'tienda';
    private $user = 'root';
    private $password = '';
    private $charset = 'utf8mb4';
    protected $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO(
                "mysql:host=$this->host;dbname=$this->db;charset=$this->charset",
                $this->user,
                $this->password
            );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // Obtener todos los fabricantes
    public function getFabricantes() {
        try {
            $query = "SELECT nombre FROM fabricante ORDER BY nombre";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        } catch(PDOException $e) {
            return [];
        }
    }

    // Buscar por fabricante
    public function buscarPorFabricante($fabricante) {
        try {
            $query = "SELECT p.id_producto, p.nombre, p.precio, f.nombre as fabricante 
                     FROM producto p 
                     JOIN fabricante f ON p.fk_codigo = f.pk_codigo 
                     WHERE f.nombre = :fabricante 
                     ORDER BY p.precio";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':fabricante', $fabricante);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return [];
        }
    }

    // Buscar por tipo
    public function buscarPorTipo($tipo) {
        try {
            $query = "SELECT p.id_producto, p.nombre, p.precio, f.nombre as fabricante 
                     FROM producto p 
                     JOIN fabricante f ON p.fk_codigo = f.pk_codigo 
                     WHERE ";
            
            switch($tipo) {
                case 'Portátil':
                    $busqueda = '%Portátil%';
                    break;
                case 'Monitor':
                    $busqueda = '%Monitor%';
                    break;
                case 'Impresora':
                    $busqueda = '%Impresora%';
                    break;
                case 'Almacenamiento':
                    $busqueda = '%Disco%';
                    break;
                case 'Tarjeta Gráfica':
                    $busqueda = '%GeForce%';
                    break;
                case 'Memoria RAM':
                    $busqueda = '%Memoria%';
                    break;
                default:
                    $busqueda = '';
            }
            
            $query .= "p.nombre LIKE :tipo ORDER BY p.precio";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':tipo', $busqueda);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return [];
        }
    }

    // Buscar por precio máximo
    public function buscarPorPrecio($precio) {
        try {
            $query = "SELECT p.id_producto, p.nombre, p.precio, f.nombre as fabricante 
                     FROM producto p 
                     JOIN fabricante f ON p.fk_codigo = f.pk_codigo 
                     WHERE p.precio <= :precio 
                     ORDER BY p.precio";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':precio', $precio);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return [];
        }
    }
}